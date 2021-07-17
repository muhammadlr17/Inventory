<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use App\Models\Ruang;
use App\Http\Requests\InventarisRequest;
use Illuminate\Support\Facades\File;
use PDF;

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
        $data = Inventaris::select('inventaris.*', 'ruang.nama as ruang')
            ->join('ruang','ruang.id','=','inventaris.id_ruang')
            ->where('inventaris.nama', 'LIKE', '%'.$keyword.'%')
            ->orWhere('kode', 'LIKE', '%'.$keyword.'%') 
            ->orWhere('inventaris.keterangan', 'LIKE', '%'.$keyword.'%') 
            ->orWhere('ruang.nama', 'LIKE', '%'.$keyword.'%')
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
            File::delete('image/'.$model->gambar);
            $file = $request->file('gambar');
            $nama_file = time().str_replace(" ","", $file->getClientOriginalName());
            $file->move('image', $nama_file); 
            

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
        Inventaris::find($id)->delete();
        
        return redirect('inventaris')->with('success','Data berhasil dimasukkan ke trash');
    }

    public function trash()
    {
        $data = Inventaris::onlyTrashed()
            ->paginate(5);
        return view('inventaris.trash', compact(
            'data'
        ));
    }

    public function restore($id = null)
    {
        $model = Inventaris::onlyTrashed();
        if ($id != null) {
            $model->where('id', $id)->restore();
        } else {
            $model->restore();
        }
        
        return redirect('inventaris/trash')->with('success','Data berhasil direstore');
    }
    
    public function delete($id = null)
    {
        $model = Inventaris::onlyTrashed();
        if ($id != null) {
            $model->where('id', $id)->forceDelete();
        } else {
            $model->forceDelete();
        }

        return redirect('inventaris/trash')->with('success','Data berhasil dihapus permanen');
    }

    public function printInventaris()
    {
        $data = Inventaris::select('inventaris.*', 'ruang.nama as ruang')
            ->join('ruang','ruang.id','=','inventaris.id_ruang')
            ->get();
        $pdf = PDF::loadView('print', compact('data'))->setPaper('a4','landscape')->setWarnings(false);
        return $pdf->download('Inventaris.pdf');

     /*    return view ('inventaris.print', compact('data')); */
    }
}
