<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use App\Models\Ruang;
use App\Http\Requests\InventarisRequest;
use Illuminate\Support\Facades\File;

class InventarisController extends Controller
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
        $data = Inventaris::where('nama', 'LIKE', '%'.$keyword.'%')
            ->orWhere('kode', 'LIKE', '%'.$keyword.'%') 
            ->orWhere('keterangan', 'LIKE', '%'.$keyword.'%') 
            ->paginate(5);
        return view('inventaris.index', compact(
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
        $model = new Inventaris;
        $ruang = Ruang::all();
        return view('inventaris.create', compact(
            'model', 'ruang'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventarisRequest $request)
    {
        if($request->file('gambar')){
            $file = $request->file('gambar');
            $nama_file = time().str_replace(" ","", $file->getClientOriginalName());
            $file->move('image', $nama_file); 

        Inventaris::create([
            'nama'              => $request->nama,
            'kode'              => $request->kode_inventaris,
            'kondisi'           => $request->kondisi,
            'keterangan'        => $request->keterangan,
            'jumlah'            => $request->jumlah,
            'gambar'            => $nama_file,
            'id_ruang'          => $request->id_ruang,
        ]);
        
            return redirect('inventaris')->with('success', 'Data berhasil disimpan');
        
        }else{
            return redirect('inventaris')->with('failed', 'Data gagal disimpan');
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
        $model = Inventaris::find($id);
        $ruang = Ruang::all();
        return view('inventaris.edit', compact(
            'model', 'ruang'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InventarisRequest $request, $id)
    {
        $model = Inventaris::find($id);
        if($request->file('gambar')){
            $file = $request->file('gambar');
            $nama_file = time().str_replace(" ","", $file->getClientOriginalName());
            $file->move('image', $nama_file); 
            
            File::delete('image', $model->gambar);

        $model->update([
                'nama'              => $request->nama,
                'kode'              => $request->kode_inventaris,
                'kondisi'           => $request->kondisi,
                'keterangan'        => $request->keterangan,
                'jumlah'            => $request->jumlah,
                'gambar'            => $nama_file,
                'id_ruang'          => $request->id_ruang,
        ]);
        
            return redirect('inventaris')->with('success', 'Data berhasil diperbaharui');
        
        }else{
            return redirect('inventaris')->with('failed', 'Data gagal diperbaharui');
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
        $model = Inventaris::find($id);
        $model->delete();
        
        return redirect('inventaris')->with('success','Data berhasil dimasukkan ke trash');
    }
}
