<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Listing;
// use App\Models\Application;
// use Illuminate\Support\Facades\Auth;

// class ApplicationController extends Controller
// {
//         public function store(Request $request, Listing $listing)
//     {
//         $request->validate([
//             'cover_letter' => 'required|string|min:20',
//         ]);

//         $existing = Application::where('user_id', Auth::id())
//             ->where('listing_id', $listing->id)
//             ->first();

//         if ($existing) {
//             return back()->withErrors(['cover_letter' => 'You have already applied to this job.']);
//         }

//         Application::create([
//             'user_id' => Auth::id(),
//             'listing_id' => $listing->id,
//             'cover_letter' => $request->input('cover_letter'),
//         ]);

//         return redirect()->route('listing.show', $listing)->with('success', 'Application submitted successfully.');
//     }
// }
