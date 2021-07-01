@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Ruang</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('ruang/'.$model->id) }}">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group">
                            <label for="namaRuang">Nama Ruang</label>
                            <input type="text" name="nama" class="form-control" id="namaRuang" value="{{$model->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="kodeRuang">Kode Ruang</label>
                            <input type="text" name="kode_ruang" class="form-control" id="kodeRuang" value="{{$model->kode_ruang}}">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{$model->keterangan}}">
                        </div>
                        <a href="{{ url('ruang') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection