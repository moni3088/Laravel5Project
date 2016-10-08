<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Middleware\Authenticate;
use App\Post;

class PagesController extends Controller
{

  // public function getIndex() {
  //   return view('welcome');
  // }
  //
  // public function getAbout() {
  //   return view('about');
  // }
  //
  // public function getContact() {
  //   return view('contact');
  //
  // }

  public function getAbout() {
    $this->middleware('auth');
    return view('about');
  }

  public function getContact() {
    return view('contact');
  }


}
