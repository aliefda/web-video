<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $video = Video::all();

        return view('home.index', compact(
            'video'
        ));
    }

    public function player($id)
    {
        $video = Video::findOrFail($id);

        return view('home.play', compact('video'));
    }

}
