<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = Auth::User()->id;

        $user = User::findOrFail($id);

        return view('profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'nickname' => 'required|min:5|max:15|unique:users,nickname,'.$user->id,
            'email' => 'unique:users,email,'.$user->id
        ]);

        $user->update($request->all());

        return redirect('profile')->withMessage("Your profile has been updated!");
    }
    public function update_avatar(Request $request)
    {
           if($request->hasFile('avatar')){
               $avatar = $request->file('avatar');
               $filename = time(). '.' . $avatar->getClientOriginalExtension();
               Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' . $filename));
               $user = Auth::user();
               $user->avatar = $filename;
               $user->save();
           }

            return redirect('profile')->withMessage("Your picture has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Didn't add the delete profile functionality yet
        $this->middleware('auth');
        $user = User::find($id);
        $user->delete();
        return redirect()->route('profile.edit');
    }
}
