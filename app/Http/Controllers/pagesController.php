<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function About(){
        return view('pages.about');
    }
    public function homegallery(){
        return view('pages.homegallery');
    }
}