<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Announcement;
class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();
        return view('announcement.index', compact('announcements'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image'
        ]);
    
        $announcement = new Announcement;
        $announcement->title = $validatedData['title'];
        $announcement->body = $validatedData['body'];
        $announcement->image = $request->file('image')->store('announcements');
        $announcement->save();
    
        return redirect()->route('announcements.index')->with('success', 'Announcement added successfully!');
    }
    public function add()
    {
    
        return view('announcement.index');
    }

    public function edit(User $announcement)
    {
        return view('announcement.edit', compact('announcements'));
    }

    public function update(Request $request, User $announcement)
    {
        $user->update($request->all());

        return redirect()->route('announcement');
    }

    public function destroy(User $announcement)
    {
        $announcement->delete();

        return redirect()->route('announcement')->with('success', 'Announcement deleted successfully');
    }
}

