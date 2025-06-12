<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request)
    {
        if ($request->user()->cannot('viewAny', Vehicle::class)) {
            abort(403);
        }

        if ($request->user()->isAdmin()) {
            $vehicles = Vehicle::with('photos')->get();
        } else {
            $vehicles = Vehicle::where('user_id', $request->user()->id)->with('photos')->get();
        }

        return view('vehicles.index', compact('vehicles'));
    }

    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Vehicle::class)) {
            abort(403);
        }

        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        if ($request->user()->cannot('create', Vehicle::class)) {
            abort(403);
        }

        $validated = $request->validate([
            'make' => 'required|string|min:2|max:255',
            'model' => 'required|string|min:1|max:255',
            'year' => 'required|integer|between:1900,' . date('Y'),
            'mileage' => 'required|integer|min:0|max:10000000',
            'vin' => 'nullable|string|size:17',
            'registration_number' => 'nullable|string|min:4|max:20',
            'maintenance_history' => 'nullable|string|max:1000',
            'inspection_records' => 'nullable|string|max:1000',
        ]);

        $validated['user_id'] = $request->user()->id;

        Vehicle::create($validated);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle added.');
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        if ($request->user()->cannot('update', $vehicle)) {
            abort(403);
        }

        $validated = $request->validate([
            'make' => 'required|string|min:2|max:255',
            'model' => 'required|string|min:1|max:255',
            'year' => 'required|integer|between:1900,' . date('Y'),
            'mileage' => 'required|integer|min:0|max:10000000',
            'vin' => 'nullable|string|size:17',
            'registration_number' => 'nullable|string|min:4|max:20',
            'maintenance_history' => 'nullable|string|max:1000',
            'inspection_records' => 'nullable|string|max:1000',
        ]);

        $vehicle->update($validated);

        return redirect()->route('vehicles.show', $vehicle)->with('success', 'Vehicle updated.');
    }


    public function show(Request $request, Vehicle $vehicle)
    {
        if ($request->user()->cannot('view', $vehicle)) {
            abort(403);
        }

        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Request $request, Vehicle $vehicle)
    {
        if ($request->user()->cannot('update', $vehicle)) {
            abort(403);
        }

        return view('vehicles.edit', compact('vehicle'));
    }

    public function destroy(Request $request, Vehicle $vehicle)
    {
        if ($request->user()->cannot('delete', $vehicle)) {
            abort(403);
        }

        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted.');
    }
}
