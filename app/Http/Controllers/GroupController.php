<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Contact;
use App\Models\Tag;

class GroupController extends Controller
{
    public function index()
    {
        $contacts = Contact::where('user_id', Auth::id())->get();
        $groups = Group::where('user_id', Auth::id())->get();
        $tags = Tag::where('user_id', Auth::id())->get();
        return view('assign_group_tag', compact('contacts', 'groups', 'tags'));
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
{
    $user = Auth::user();
    $group = Group::where('name', $request->name)->where('user_id', $user->id)->first();
    
    if ($group) {
        // Group already exists for the user
        return redirect()->back()->with('error', 'You have already created a group with this name.');
    }
    
    $group = new Group();
    $group->name = $request->name;
    $group->user_id = $user->id;
    $group->save();
    
    return redirect()->back()->with('success', 'Group created successfully.');
}


    public function destroy(Group $group)
{
    $group->delete();
    return redirect()->back()->with('success', 'Group deleted successfully.');
}

}
