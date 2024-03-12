<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function index () 
    {
        $images = [
            '/image/d03f1d36ca69348c51aa/c413eac329e1c0d03/test.jpg', 
            '/image/d03f1d36ca69348c51aa/c413eac329e1c0d03/test2.jpg', 
            '/image/d03f1d36ca69348c51aa/c413eac329e1c0d03/test3.jpg',
            '/image/d03f1d36ca69348c51aa/c413eac329e1c0d03/test4.jpg',
            '/image/d03f1d36ca69348c51aa/c413eac329e1c0d03/test5.jpg'
        ];

        return view('images', compact('images'));
    }
}
