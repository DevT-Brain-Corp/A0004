<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class EditPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userData = User::where('id', Auth::user()->id)->firstOrFail();

        return view('editPicture', compact('userData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $file = $request->file('pic');
      if ($file != null) {
        $filename = $file->getClientOriginalName();
        $path = 'img/';
        $file->move($path, $filename);


        $folder = url("/img\/");
        $location = $folder.$filename;

        $user_id = Auth::user()->id;
        User::where('id', $user_id)->update(['pic' =>  $location]);

        return redirect()->route('profile.show', Auth::user()->slug);
      } else {
        if (Auth::user()->gender == "male") {
          $defaultPic = url('/img/male.png');
        } else {
          $defaultPic = url('/img/female.png');
        }
        User::where('id',Auth::user()->id)->update(['pic' =>  $defaultPic]);
        return redirect()->route('profile.show', Auth::user()->slug);
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
