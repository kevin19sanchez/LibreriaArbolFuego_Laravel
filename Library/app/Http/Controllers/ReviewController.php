<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reviewsIndex(){
        return view('reviews.reviews_home');
    }
}
