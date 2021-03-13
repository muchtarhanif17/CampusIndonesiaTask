<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\Institute_major;
use App\Models\Major;


class CampusController extends Controller
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
        $major = Major::all();
        $campus = Institute_major::all();
        return view('admin.campus.index', compact('institute', 'major', 'campus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institute = Institute::all();
        $major = Major::all();
        return view('admin.campus.create', compact('institute', 'major'));
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
            'institute' => 'required',
            'major' => 'required',
        ]);

        Institute_major::create([
            'institute_id' => $request->institute,
            'major_id' => $request->major
        ]);

        return redirect('/campus')->with('status', 'Data Sukses Ditambahkan');
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
    public function edit(Institute_major $institute_major)
    {

        $institute = Institute::all();
        $major = Major::all();


        foreach ($institute as $ins) {
            if ($ins->id == $institute_major->institute_id) {
                $current_institute_name = $ins->name;
                $current_institute_id = $ins->id;
            }
        }

        foreach ($major as $mjr) {
            if ($mjr->id == $institute_major->major_id) {
                $current_major_name = $mjr->name;
                $current_major_id = $mjr->id;
            }
        }


        return view('admin.campus.edit', compact('institute_major', 'institute', 'major', 'current_major_name', 'current_institute_name', 'current_institute_id', 'current_major_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institute_major $institute_major)
    {
        $request->validate([
            'institute' => 'required',
            'major' => 'required'
        ]);

        Institute_major::where('id', $institute_major->id)
            ->update([
                'institute_id' => $request->institute,
                'major_id' => $request->major
            ]);

        return redirect('/campus')->with('status', 'Data telah Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institute_major $institute_major)
    {
        Institute_major::destroy($institute_major->id);
        return redirect('/campus')->with('status', 'Data sukses dihapus');
    }
}
