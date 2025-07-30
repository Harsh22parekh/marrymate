<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Service;
use App\Models\Package;
use App\Models\BookingOrder;
use App\Models\BookingItem;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

 public function addServiceToCart($id)
{
    $item = Service::findOrFail($id);
    $cart = session()->get('cart', []);

    $key = 'service_' . $item->id;

    $cart[$key] = [
        'id' => $item->id,
        'name' => $item->name,
        'price' => $item->price,
        'image' => $item->image,
        'qty' => 1,
        'type' => 'service',
        'image_url' => asset('uploads/services/' . $item->image),
    ];

    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'Service added to cart!');
}

public function addPackageToCart($id)
{
    $item = Package::findOrFail($id);
    $cart = session()->get('cart', []);

    $key = 'package_' . $item->id;

    $cart[$key] = [
        'id' => $item->id,
        'name' => $item->name,
        'price' => $item->price,
        'image' => $item->image,
        'qty' => 1,
        'type' => 'package',
        'image_url' => asset('uploads/packages/' . $item->image),
    ];

    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'Package added to cart!');
}

    public function update(Request $request)
{
    $id = $request->id;
    $qty = max(1, (int) $request->qty);

    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        $cart[$id]['qty'] = $qty;
        session()->put('cart', $cart);
    }

    return back()->with('success', 'Quantity updated!');
}

    public function remove(Request $request)
    {
        $id = $request->id;
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Removed from cart');
    }

    public function checkout()
{
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect('/cart')->with('error', 'Cart is empty!');
    }

    
    foreach ($cart as $key => $item) {
      
        $imageName = $item['image'] ?? strtolower(str_replace(' ', '-', $item['name'])) . '.jpg';
        $cart[$key]['image_url'] = asset('uploads/services/' . $imageName);
    }

    $total = collect($cart)->sum(fn($item) => $item['price'] * $item['qty']);

    return view('checkout', compact('cart', 'total'));
}


public function createRazorpayOrder(Request $request)
{
    try {
        $amount = $request->amount;

        if (!$amount || $amount <= 0) {
            return response()->json(['error' => 'Invalid amount'], 400);
        }

        $api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $razorpayOrder = $api->order->create([
            'receipt' => 'order_rcptid_' . uniqid(),
            'amount' => $amount * 100, // in paisa
            'currency' => 'INR',
        ]);

        return response()->json([
            'id' => $razorpayOrder['id'],
            'amount' => $razorpayOrder['amount']
        ]);
    } catch (\Exception $e) {
        \Log::error('Razorpay error: ' . $e->getMessage());
        return response()->json(['error' => 'Order creation failed'], 500);
    }
}


  public function placeOrder(Request $request)
{
    // ✅ Check if user is logged in
    if (!auth()->check()) {
        return redirect('/login')->with('error', 'Please login to place order.');
    }

    // ✅ Validate form input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:20',
        'booking_date' => 'required|date',
        'address' => 'required|string',
        'razorpay_payment_id' => 'required|string',
        'razorpay_order_id' => 'required|string',
    ]);

    // ✅ Get cart from session
    $cart = session('cart', []);
    if (empty($cart)) {
        return redirect('/cart')->with('error', 'Your cart is empty.');
    }

    // ✅ Create booking order
    $bookingOrder = BookingOrder::create([
        'user_id' => auth()->id(),
        'payment_id' => $request->razorpay_payment_id,
        'total' => 0, // 👉 Replace later with actual total
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'booking_date' => $request->booking_date,
        'address' => $request->address,
    ]);

    $totalAmount = 0;

    // ✅ Loop through cart items to store booking items
    foreach ($cart as $item) {
        BookingItem::create([
            'booking_order_id' => $bookingOrder->id,
            'service_id' => $item['type'] === 'service' ? $item['id'] : null,
            'package_id' => $item['type'] === 'package' ? $item['id'] : null,
            'name' => $item['name'],
            'service_image' => asset('uploads/' . ($item['type'] === 'package' ? 'packages' : 'services') . '/' . $item['image']),
            'qty' => $item['qty'],
            'price' => $item['price'],
        ]);

        // 👉 Calculate total
        $totalAmount += $item['qty'] * $item['price'];
    }

    // ✅ Update order total now that we calculated it
    $bookingOrder->update(['total' => $totalAmount]);

    // ✅ Clear cart
    session()->forget('cart');

    // ✅ Optionally send email
    // Mail::to($request->email)->send(new BookingConfirmationMail($bookingOrder));

    return redirect('/')->with('success', 'Booking successful! Thank you.');
}

}
