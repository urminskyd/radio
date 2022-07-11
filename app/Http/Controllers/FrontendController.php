<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Radio;
use App\Models\Song;

class FrontendController extends Controller
{
    public function index()
    {
        $radios = Radio::get(['id', 'radio_url']);
        return view('index', compact('radios'));
    }

    public function show(Radio $radio)
    {
        $songs = Song::where('radio_id', $radio->id)->paginate(100);
        return view('show', compact('songs'));
    }
}
