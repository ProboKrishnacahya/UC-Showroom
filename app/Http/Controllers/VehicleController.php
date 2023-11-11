<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\View\View;

// Return type redirectResponse
use Illuminate\Http\RedirectResponse;

// Import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    public function index(): View
    {
        // Get vehicles
        $vehicles = Vehicle::latest()->paginate(10);

        // Render view with vehicles
        return view('vehicles.index', compact('vehicles'));
    }

    public function create(): View
    {
        // Render view
        return view('vehicles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/vehicles', $image->hashName());

        // Create vehicle
        Vehicle::create([
            'model' => $request->model,
            'year' => $request->year,
            'passenger_count' => $request->passenger_count,
            'manufacturer' => $request->manufacturer,
            'price' => $request->price,
            'fuel_type' => $request->fuel_type,
            'trunk_space' => $request->trunk_space,
            'image' => $image->hashName()
        ]);

        // Redirect and show message
        return redirect()->route('vehicles.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function show(string $vehicle_id): View
    {
        // Get vehicle by ID
        $vehicle = Vehicle::findOrFail($vehicle_id);

        // Render view with vehicle
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(string $vehicle_id): View
    {
        // Get vehicle by ID
        $vehicle = Vehicle::findOrFail($vehicle_id);

        // Render view with vehicle
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $vehicle_id): RedirectResponse
    {
        // Get vehicle by ID
        $vehicle = Vehicle::findOrFail($vehicle_id);

        // Check if image is uploaded
        if ($request->hasFile('image')) {
            // Upload new image
            $image = $request->file('image');
            $image->storeAs('public/vehicles', $image->hashName());

            // Delete old image
            Storage::delete('public/vehicles/' . $vehicle->image);

            // Update vehicle with new image
            $vehicle->update([
                'model' => $request->model,
                'year' => $request->year,
                'passenger_count' => $request->passenger_count,
                'manufacturer' => $request->manufacturer,
                'price' => $request->price,
                'fuel_type' => $request->fuel_type,
                'trunk_space' => $request->trunk_space,
                'image' => $image->hashName()
            ]);
        } else {
            // Update vehicle without image
            $vehicle->update([
                'model' => $request->model,
                'year' => $request->year,
                'passenger_count' => $request->passenger_count,
                'manufacturer' => $request->manufacturer,
                'price' => $request->price,
                'fuel_type' => $request->fuel_type,
                'trunk_space' => $request->trunk_space,
            ]);
        }

        // Redirect to index
        return redirect()->route('vehicles.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($vehicle_id): RedirectResponse
    {
        // Get vehicle by ID
        $vehicle = Vehicle::findOrFail($vehicle_id);

        // Delete image
        Storage::delete('public/vehicles/' . $vehicle->image);

        // Delete vehicle
        $vehicle->delete();

        // Redirect to index
        return redirect()->route('vehicles.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
