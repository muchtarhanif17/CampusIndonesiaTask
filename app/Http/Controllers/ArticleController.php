<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
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
        $article = Article::all();
        return view('admin.artikel.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artikel.create');
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
            'image' => 'required'
        ]);

        $img = $request->image;
        $namafile = time() . rand(100, 999) . "." . $img->getClientOriginalExtension();
        $img->move(public_path() . '/asset/image', $namafile);

        Article::create([
            'category' => $request->category,
            'title' => $request->title,
            'value_article' => $request->content,
            'image' => $namafile
        ]);

        return redirect('/artikel')->with('status', 'Artikel baru Sukses Ditambahkan');
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
    public function edit(Article $article)
    {
        return view('admin.artikel.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

        $request->validate([
            'image' => 'required'
        ]);

        $img = $request->image;
        $namafile = time() . rand(100, 999) . "." . $img->getClientOriginalExtension();
        $img->move(public_path() . '/asset/image', $namafile);

        Article::where('id', $article->id)
            ->update([
                'category' => $request->category,
                'title' => $request->title,
                'value_article' => $request->content,
                'image' => $namafile
            ]);
        return redirect('/artikel')->with('status', 'Artikel baru Sukses Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Article::destroy($article->id);
        return redirect('/artikel')->with('status', 'Artikel Sukses Dihapus');
    }
}
