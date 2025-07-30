<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingOrder;
use App\Models\BookingItem;
use App\Models\register;
use App\Models\Service;
use App\Models\Package;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
{
    $totalBookings = BookingOrder::count();
    $totalUsers = register::count();
    $totalServices = Service::count();
    $totalPackages = Package::count();
    $totalRevenue = BookingOrder::sum('total');

    // Optional: Count by service type (if using type column like 'catering', 'photography')
    $cateringCount = Service::where('type', 'catering')->count();
    $photographyCount = Service::where('type', 'photography')->count();

    $totalServiceBookings = BookingItem::whereNotNull('service_id')->count();
    $totalPackageBookings = BookingItem::whereNotNull('package_id')->count();

    $recentBookings = BookingOrder::latest()->take(5)->get();

    return view('adminpages.dashboard', compact(
        'totalBookings',
        'totalUsers',
        'totalServices',
        'totalPackages',
        'totalRevenue',
        'cateringCount',
        'photographyCount',
        'totalServiceBookings',
        'totalPackageBookings',
        'recentBookings'
    ));
}
     public function index()
    {
        $orders = BookingOrder::latest()->get();
        return view('adminpages.cart_show', compact('orders'));
    }

     public function show($id)
    {
        $order = BookingOrder::with('bookingItems')->findOrFail($id);
        return view('adminpages.cart_index', compact('order'));
    }

    public function updateStatus(Request $request, $id)
{
    $order = BookingOrder::findOrFail($id);
    $order->status = $request->status;
    $order->save();

    return redirect()->back()->with('success', 'Booking status updated!');
}

public function completedOrders()
{
    $orders = BookingOrder::where('status', 'done')->latest()->get();
    return view('adminpages.cart_done', compact('orders'));
}

public function cancelledOrders()
{
    $orders = BookingOrder::where('status', 'cancelled')->latest()->get();
    return view('adminpages.cart_cancel', compact('orders'));
}

}
