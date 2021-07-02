<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;
use App\Http\Requests\RuangRequest;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $data = Ruang::where('nama', 'LIKE', '%'.$keyword.'%')
            ->orWhere('kode_ruang', 'LIKE', '%'.$keyword.'%') 
            ->orWhere('keterangan', 'LIKE', '%'.$keyword.'%') 
            ->paginate(2);
        return view('ruang.index', compact(
            'data', 'keyword'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Ruang;
        return view('ruang.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuangRequest $request)
    {
        $model = new Ruang;
        $model->nama = $request->nama;
        $model->kode_ruang = $request->kode_ruang;
        $model->keterangan = $request->keterangan;
        $model->save();

        return redirect('ruang')->with('success', 'Data berhasil disimpan');
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
        $model = Ruang::find($id);
        return view('ruang.edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RuangRequest $request, $id)
    {
        $model = Ruang::find($id);
        $model->nama = $request->nama;
        $model->kode_ruang = $request->kode_ruang;
        $model->keterangan = $request->keterangan;
        $model->save();

        return redirect('ruang')->with('success','Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Ruang::find($id);
        $model->delete();
        
        return redirect('ruang');
    }
}
