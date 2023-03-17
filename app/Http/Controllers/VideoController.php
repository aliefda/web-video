<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::all();

        return view('video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $video = new Video();
        $video->title = $request->title;
        $video->description = $request->description;
        $video->image = $request->image;

        if($request->file('video')) {
            $file = $request->file('video');
            $upload = $request->file('video')->store('uploads', ['disk' => 'public']);

            $video->video = $request->hasFile('video') ? 'storage/' . $upload : null;
        }

        if($request->file('image')) {
            $file = $request->file('image');
            $upload = $request->file('image')->store('uploads', ['disk' => 'public']);
    
            $imageName = $file->getClientOriginalName();
            $video->image = $request->hasFile('video') ? 'storage/' . $upload : null;
            
        }

        $video->save();

        return redirect('/user/videos')->with('success', 'Video berhasil diupload!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        return view('video.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $video->title = $request->title;
        $video->description = $request->description;
        $video->image = $request->image;

        if($request->file('video')) {
            $file = $request->file('video');
            $upload = $request->file('video')->store('uploads', ['disk' => 'public']);

            $video->video = $request->hasFile('video') ? 'storage/' . $upload : null;
        }

        if($request->file('image')) {
            $file = $request->file('image');
            $upload = $request->file('image')->store('uploads', ['disk' => 'public']);
    
            $video->image = $request->hasFile('video') ? 'storage/' . $upload : null;
            
        }
    
        $video->save();

        return redirect('/user/videos')->with('success', 'Video berhasil diupload!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        $video->delete();

        return redirect('/user/videos')->with('message', 'Data Berhasil Dihapus');
    }
}
