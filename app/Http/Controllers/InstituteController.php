<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $institute = Institute::all();
        return view('admin.campus.institute.index', compact('institute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.campus.institute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
        ]);

        Institute::create([
            'name' => $request->nama,
            'address' => $request->alamat,
            'city' => $request->kota,
            'email' => $request->email,
            'telp' => $request->telp,
        ]);

        return redirect('/campus/institute')->with('status', 'Data Instansi Sukses Ditambahkan');
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
    public function edit(Institute $institute)
    {
        return view('admin.campus.institute.edit', compact('institute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institute $institute)
    {
        // Validasi Input
        $request->validate([
            'nama' => 'required',
            'email' => 'required'
        ]);

        Institute::where('id', $institute->id)
            ->update([
                'name' => $request->nama,
                'address' => $request->alamat,
                'city' => $request->kota,
                'email' => $request->email,
                'telp' => $request->telp
            ]);
        return redirect('/campus/institute')->with('status', 'Data institusi Sukses Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institute $institute)
    {
        Institute::destroy($institute->id);
        return redirect('/campus/institute')->with('status', 'Data Instansi Sukses Dihapus');
    }
}
