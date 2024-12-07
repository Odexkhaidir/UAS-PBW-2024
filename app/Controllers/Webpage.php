<?php

namespace App\Controllers;

class Webpage extends BaseController
{
    public function home()
    {
        $data = [
            'title' => 'Home'
        ];
        return view('webpage/home', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About'
        ];
        return view('webpage/about', $data);
    }
    public function song()
    {
        $data = [
            'title' => 'Song'
        ];
        return view('lagu/index', $data);
    }
    public function membership()
    {
        $data = [
            'title' => 'Artist'
        ];
        return view('webpage/membership', $data);
    }
}
