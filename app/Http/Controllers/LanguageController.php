<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'language' => 'required|string|max:3|in:en,lv',
        ]);

        $user = Auth::user();
        $user->language = $request->language;
        $user->save();

        return redirect()->back()->with('success', __('messages.language_updated'));
    }
}
