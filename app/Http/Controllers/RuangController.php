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
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $data = Ruang::where('nama', 'LIKE', '%'.$keyword.'%')
            ->orWhere('kode_ruang', 'LIKE', '%'.$keyword.'%') 
            ->orWhere('keterangan', 'LIKE', '%'.$keyword.'%') 
            ->paginate(5);
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
        
        Ruang::create([
            'nama'       => $request->nama,
            'kode_ruang' => $request->kode_ruang,
            'keterangan' => $request->keterangan,
        ]);

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
        /* $model = Ruang::findOrFail($id);
        $model->update($request->all()); */
        $model = Ruang::where('id',$id);
        $model->update([
                'nama'       => $request->nama,
                'kode_ruang' => $request->kode_ruang,
                'keterangan' => $request->keterangan
            ]);
            
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
        Ruang::find($id)->delete();
        
        return redirect('ruang')->with('success','Data berhasil dimasukkan ke trash');
    }

    public function trash()
    {
        $data = Ruang::onlyTrashed()
            ->paginate(5);
        return view('ruang.trash', compact(
            'data'
        ));
    }

    public function restore($id = null)
    {
        $model = Ruang::onlyTrashed();
        if ($id != null) {
            $model->where('id', $id)->restore();
        } else {
            $model->restore();
        }

        return redirect('ruang/trash')->with('success','Data berhasil direstore');
    }
    
    public function delete($id = null)
    {
        $model = Ruang::onlyTrashed();
        if ($id != null) {
            $model->where('id', $id)->forceDelete();
        } else {
            $model->forceDelete();
        }

        return redirect('ruang/trash')->with('success','Data berhasil dihapus permanen');
    }
}
