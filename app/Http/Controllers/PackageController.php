<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function packages($type)
{
    if ($type === 'wedding-dress') {
        $menPackages = Package::where('type', 'wedding-dress')->where('gender', 'men')->get();
        $womenPackages = Package::where('type', 'wedding-dress')->where('gender', 'women')->get();

        return view('wedding_dress_packages', [
            'type' => ucfirst($type),
            'menPackages' => $menPackages,
            'womenPackages' => $womenPackages,
        ]);
    }

    // For other types
    $packages = Package::where('type', $type)->get();

    return view('packages', [
        'type' => ucfirst($type),
        'packages' => $packages,
    ]);
}


     public function index(Request $request)
{
    $query = Package::query();

    if ($request->has('type') && $request->type != '') {
        $query->where('type', $request->type);
    }

    $packages = $query->get();

    return view('adminpages.packages_index', compact('packages'));
}

    public function create()
    {
        return view('adminpages.packages_create');
    }

   public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'description' => 'nullable',
        'image' => 'nullable|image',
        'price' => 'required|numeric',
        'type' => 'required',
        'gender' => 'nullable|in:men,women'  
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/packages'), $filename);
        $data['image'] = $filename;
    }

    Package::create($data);
    return redirect()->route('packages.index')->with('success', 'Package added successfully!');
}

    public function edit(Package $package)
    {
        return view('adminpages.packages_edit', compact('package'));
    }

    public function update(Request $request, Package $package)
{
    $data = $request->validate([
        'name' => 'required',
        'description' => 'nullable',
        'image' => 'nullable|image',
        'price' => 'required|numeric',
        'type' => 'required',
        'gender' => 'nullable|in:men,women' 
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/packages'), $filename);
        $data['image'] = $filename;
    }

    $package->update($data);
    return redirect()->route('packages.index')->with('success', 'Package updated successfully!');
}


    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.index')->with('success', 'Package deleted successfully!');
    }
}
