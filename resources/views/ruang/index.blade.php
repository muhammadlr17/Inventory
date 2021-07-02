@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show">{{ Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif
            <div class="card">
                <div class="card-header">Halaman Ruang</div>
                <div class="card-body">
                    <a href="{{ url('ruang/create') }}" class="btn btn-sm btn-primary mb-3">Tambah Data</a>
                    
                    <form class="form-inline" method="GET" action="{{ url('ruang') }}">
                        <div class="form-group mb-2">
                            <input name="keyword" class="form-control form-control-sm" type="text" value="{{$keyword}}" placeholder="Cari...">
                        </div>
                        <button type="submit" class="btn btn-sm btn-secondary ml-2 mb-2">Cari</button>
                    </form>

                    <table class="table table-bordered">
                        <tr class="text-center">
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
                            <td class="text-center">
                                <a href="{{ url('ruang/'.$row->id.'/edit') }}" class="btn btn-sm btn-info text-light">Edit</a>
                            </td>
                            <td class="text-center">
                                <form method="POST" action="{{ url('ruang/'.$row->id) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection