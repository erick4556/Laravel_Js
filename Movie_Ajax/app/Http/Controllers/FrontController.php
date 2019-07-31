<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class FrontController extends Controller
{   

    public function __construct(){
            $this->middleware('auth');
    }   
    public function index(){
    	return view('index');
    }

    public function contacto(){
    	return view('contacto');
    }

    public function reviews(){
        $movie = Movie::MoviesConsul();
    	return view('reviews',compact('movie'));
    }

    public function admin(){
    	return view('admin/index');
    }

}	
