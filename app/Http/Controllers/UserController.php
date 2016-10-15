<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\User;
use Intervention\Image\Facades\Image;
use \PDF;



class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
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
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'nickname' => 'min:5|max:10|unique:users,nickname,' . $user->id,
            'email' => 'required|unique:users,email,' . $user->id
        ]);

        $user->update($request->all());

        return redirect('profile')->withMessage("Your profile has been updated!");
    }

    public function update_avatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $user = Auth::user();
            $filename = $user->avatar;
            if ($filename != 'Default.png') {
                Storage::delete('/public/uploads/avatars/' . $filename);
            }
            $avatar = $request->file('avatar');

            $circle_mask = Image::canvas(500, 500, 'rgba(0, 0, 0, 0)');
            $circle_mask->circle(500, 250, 250, function ($draw) {
                $draw->background('#fff');
            });

            $filename = time() . '.' . 'png';
            Image::make($avatar)->fit(250)->encode('png')->mask($circle_mask)
                ->insert(public_path('/img/watermark_new.png'), 'center')->save(public_path('/uploads/avatars/' . $filename));

            $user->avatar = $filename;
            $user->save();

            return redirect('profile')->withMessage("Your picture has been updated!");
        }
        return redirect('profile')->withMessage("No image is selected.");
    }


    public function pdf_create()
    {
        $pdf = \PDF::loadView('about', []);
        return $pdf->download('pdf.about');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //User delete not implemented as it's not neccessary
        $user = User::find($id);
        $user->delete();
        return redirect()->route('profile.edit');
    }
}

?>
