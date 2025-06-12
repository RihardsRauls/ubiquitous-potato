<?php
namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;
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

        AuditLog::create([
            'user_id' => Auth::id(),
            'action' => 'Created photo',
            'description' => 'Photo uploaded: ' . $path,
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Photo uploaded.');
    }

    public function create(Request $request, Vehicle $vehicle)
    {
        if ($request->user()->cannot('update', $vehicle)) {
            abort(403);
        }

        return view('photos.add', compact('vehicle'));
    }

    public function destroy(Request $request, Photo $photo)
    {
        $vehicle = $photo->vehicle;

        if ($request->user()->cannot('update', $vehicle)) {
            abort(403);
        }

        $path = $photo->path;

        Storage::disk('public')->delete($photo->path);
        $photo->delete();

        AuditLog::create([
            'user_id' => Auth::id(),
            'action' => 'Deleted photo.',
            'description' => 'Photo: ' . $path,
            'ip_address' => request()->ip(),
        ]);

        return back()->with('success', 'Photo deleted.');
    }
}
