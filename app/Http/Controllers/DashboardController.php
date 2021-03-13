<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = auth()->user();

        return view('admin.dashboard.index', compact('data'));
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
    public function edit(Request $request)
    {
        $data = auth()->user();
        return view('admin.dashboard.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if ($request->img) {
            $img = $request->img;
            $namafile = time() . rand(100, 999) . "." . $img->getClientOriginalExtension();
            $img->move(public_path() . '/asset/image/profile/', $namafile);
        } else {
            $img = 'default.png';
        }

        // Validasi Input
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);




        User::where('id', $request->data_id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'image' => $namafile
            ]);

        return redirect('/dashboard')->with('status', 'Data berhasil Diubah');
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

    public function editpassword()
    {
        $data = auth()->user();
        return view('admin.dashboard.changepassword', compact('data'));
    }

    public function changepassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'new_password1' => 'required'
        ]);

        $current_password = auth()->user()->password;
        $old_password = $request->old_password;

        if (Hash::check($old_password, $current_password)) {
            User::where('id', $request->id)
                ->update([
                    'password' => Hash::make($current_password)
                ]);

            return redirect('/dashboard')->with('status', 'Password Berhasil Diubah');
        } else {
            return back()->withErrors(['old_password' => 'Masukkan Password lama']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
