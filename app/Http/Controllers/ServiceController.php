<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
     public function showServices($type)
    {
        $services = Service::where('type', $type)->get();
        return view('services', [
        'services' => $services,
        'type' => ucfirst($type) 
    ]);
}

   public function index(Request $request)
{
    $query = Service::query();

    if ($request->has('type') && $request->type != '') {
        $query->where('type', $request->type);
    }

    $services = $query->get();

    return view('adminpages.service_index', compact('services'));
}

    public function create()
    {
        return view('adminpages.service_create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'price' => 'required|numeric',
            'type' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/services'), $filename);
            $data['image'] = $filename;
        }

        Service::create($data);
        return redirect()->route('services.index')->with('success', 'Service added successfully!');
    }

    public function edit(Service $service)
    {
        return view('adminpages.service_edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'price' => 'required|numeric',
            'type' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/services'), $filename);
            $data['image'] = $filename;
        }

        $service->update($data);
        return redirect()->route('services.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }
}
