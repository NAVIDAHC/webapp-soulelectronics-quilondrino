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
}
