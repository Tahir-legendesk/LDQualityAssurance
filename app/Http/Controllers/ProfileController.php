<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Auth::user();
        return view('profile.index', get_defined_vars());
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
        //
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
    public function edit()
    {
        $profile = Auth::user();
        // dd($profile);
        return view('profile.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'phone' => 'required|numeric',
            'address' => 'required',
            'avatar' => 'mimes:jpg,png',
        ]);

        $path = '';
        $profile = User::find(Auth::user()->id);
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->password = Hash::make($request->password);
        $profile->phone = $request->phone;
        $profile->gender = $request->gender;
        $profile->dob = $request->dob;
        $profile->address = $request->address;
        if ($request->hasfile('avatar')) {
            $file = $request->file('avatar');
            $name = rand(0000, 9999) . rand(0000, 9999) . time() . '.' . $file->extension();
            $fullpath = $name;
            $file->move(public_path('/assets/images/admin'), $name);
            $profile->avatar = $fullpath;
        }
        $profile->updated_at = now();

        if ($profile->save()) {
            Alert::info('Congrats', "You've Successfully update profile");
            return redirect('profile');
        }
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
