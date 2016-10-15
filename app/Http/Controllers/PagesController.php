<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate;
use App\Post;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAbout()
    {
        $this->middleware('auth');
        return view('about');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|min:7|email',
            'subject' => 'required|min:5',
            'message' => 'required|min:20',
        ]);

        $data = $request->all();
        //Send email using Laravel send function
        Mail::send('other.mail', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to('laravel.web3@gmail.com', 'Recipes N Things')->cc('373174@student.fontys.nl')->subject($data['subject']);
        });
        return view('contact')->withMessage('E-mail has been sent');
    }
}
