@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Halaman Ruang</div>
                <div class="card-body">
                    <a href="{{ url('ruang/create') }}" class="btn btn-sm btn-primary mb-3">Tambah Data</a>
                    <table class="table table-hover">
                        <tr>
                            <th>Kode Ruang</th>
                            <th>Nama Ruang</th>
                            <th>Keterangan</th>
                            <th colspan="2">Action</th>
                        </tr>
                        @foreach($data as $row)
                        <tr>
                            <td>{{ $row->kode_ruang }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->keterangan }}</td>
                            <td>
                                <a href="{{ url('ruang/'.$row->id.'/edit') }}" class="btn btn-sm btn-info text-light">Edit</a>
                            </td>
                            <td>
                                <form method="POST" action="{{ url('ruang/'.$row->id) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection