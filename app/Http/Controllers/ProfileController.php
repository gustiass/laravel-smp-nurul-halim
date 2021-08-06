<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if (\Gate::denies('isProfileUser', $id)) {
            return abort(404);
        }

        $user = User::findOrFail($id);
        $profile = Profile::findOrFail(1);

        return view('profile.index', compact('user', 'profile'));
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
        if (\Gate::denies('isProfileUser', $id)) {
            return abort(404);
        }

        if ($request->profile == 'user') {
            $user = User::findOrFail($id);

            $this->validate($request, [
                'name' => 'required|string|max:100',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'password' => 'sometimes|nullable|confirmed|min:6',
            ]);

            $password = !empty($request->password) ? bcrypt($request->password) : $user->password;
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
            ]);
        } else {
            $profile = Profile::findOrFail(1);

            $this->validate($request, [
                'identitas_sekolah' => 'required|string|max:255',
                'visi_misi' => 'required|string',
                'sejarah_singkat' => 'required|string',
                'fasilitas' => 'required|string',
                // 'struktur_organisasi' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $profile->update([
                'identitas_sekolah' => $request->identitas_sekolah,
                'visi_misi' => $request->visi_misi,
                'sejarah_singkat' => $request->sejarah_singkat,
                'fasilitas' => $request->fasilitas

            ]);
        }


        session()->flash('success', "Berhasil Diupdate");

        return redirect()->back();
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
