<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all()->sortByDesc('created_at');
        return view('admin')->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $users = $request->get('users');
        foreach ($users as $id => $user) {
            $User = User::find($id);
            $User->admin = $user['admin'];
            $User->save();
        }
        return redirect('admin')->withMessage('Admin permissions have been updated');
    }
}
