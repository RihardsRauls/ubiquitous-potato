<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Photo;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request, Vehicle $vehicle)
    {
        if ($request->user()->cannot('update', $vehicle)) {
            abort(403);
        }

        $validated = $request->validate([
            'photo' => 'required|image|max:2048',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $path = $request->file('photo')->store('photos', 'public');

        $vehicle->photos()->create([
            'path' => $path,
            'description' => $validated['description'],
            'date' => $validated['date'],
        ]);

        return back()->with('success', 'Photo uploaded.');
    }

    public function destroy(Request $request, Photo $photo)
    {
        $vehicle = $photo->vehicle;

        if ($request->user()->cannot('update', $vehicle)) {
            abort(403);
        }

        Storage::disk('public')->delete($photo->path);
        $photo->delete();

        return back()->with('success', 'Photo deleted.');
    }
}
