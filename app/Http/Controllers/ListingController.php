<?php

// namespace App\Http\Controllers;

// use Illuminate\Routing\Controller;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;
// use App\Models\Listing;
// use App\Models\EmploymentType;
// use App\Models\JobCategory;

// class ListingController extends Controller
// {
//      public function __construct()
//     {
//         $this->middleware('auth')->except(['index', 'show']);
//     }
//     /**
//      * Display a listing of the resource.
//      */
//     public function index(Request $request)
//     {
//         if ($request->user()->cannot('viewAny', Listing::class)) {
//             abort(403, 'You are not authorized to view job listings.');
//         }

//         $listings = Listing::all();
//         return view('listings.index', compact('listings'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create(Request $request)
//     {
//         if ($request->user()->cannot('create', Listing::class)) {
//             abort(403, 'You are not authorized to create job listings.');
//         }

//         $categories = JobCategory::all();
//         $types = EmploymentType::all();
//         return view('listings.create', compact('categories', 'types'));
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         if ($request->user()->cannot('create', Listing::class)) {
//             abort(403, 'You are not authorized to create job listings.');
//         }

//         $validated = $request->validate([
//             'title' => 'required|min:2|max:255',
//             'description' => 'required|min:2|string',
//             'company_name' => 'required|min:2|max:255',
//             'salary' => 'nullable|numeric|min:0|max:1000000',
//             'job_category_id' => 'required|exists:job_categories,id',
//             'employment_type_id' => 'required|exists:employment_types,id',
//         ]);
//         $validated['user_id'] = auth::id();

//         Listing::create($validated);

//         return redirect()->route('listing.index');
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(Request $request, $id)
//     {
//         $listing = Listing::with(['jobCategory', 'employmentType'])->findOrFail($id);

//         if ($request->user()->cannot('view', $listing)) {
//             abort(403, 'You are not authorized to view this job listing.');
//         }

//         return view('listings.show', compact('listing'));
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Request $request, string $id)
//     {
//         $listing = Listing::findOrFail($id);

//         if ($request->user()->cannot('update', $listing)) {
//             abort(403, 'You are not authorized to edit this job listing.');
//         }

//         $categories = JobCategory::all();
//         $types = EmploymentType::all();

//         return view('listings.edit', compact('listing', 'categories', 'types'));
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         $listing = Listing::findOrFail($id);

//         if ($request->user()->cannot('update', $listing)) {
//             abort(403, 'You are not authorized to update this job listing.');
//         }

//         $validated = $request->validate([
//             'title' => 'required|min:2|max:255',
//             'description' => 'required|min:2|string',
//             'company_name' => 'required|min:2|max:255',
//             'salary' => 'nullable|numeric|min:0|max:1000000',
//             'job_category_id' => 'required|exists:job_categories,id',
//             'employment_type_id' => 'required|exists:employment_types,id',
//         ]);

//         $listing->update($validated);

//         return redirect()->route('listing.show', $listing->id);
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Request $request, Listing $listing)
//     {
//         if ($request->user()->cannot('delete', $listing)) {
//             abort(403, 'You are not authorized to delete this job listing.');
//         }

//         $listing->delete();
//         return redirect()->route('listing.index')->with('success', 'Job listing deleted successfully.');
//     }
// }
