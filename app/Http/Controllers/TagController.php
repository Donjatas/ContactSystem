<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
{
    $user = Auth::user();
    $tag = Tag::where('name', $request->name)->where('user_id', $user->id)->first();
    
    if ($tag) {
        // Tag already exists for the user
        return redirect()->back()->with('error', 'You have already created a tag with this name.');
    }
    
    $tag = new Tag();
    $tag->name = $request->name;
    $tag->user_id = $user->id;
    $tag->save();
    
    return redirect()->back()->with('success', 'Tag created successfully.');
}


    public function destroy(Tag $tag)
{
    $tag->delete();
    return redirect()->back()->with('success', 'Group deleted successfully.');
}

}

