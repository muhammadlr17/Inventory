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
                    <a href="{{ url('ruang/create') }}" class="btn btn-sm btn-primary mb-3"><span class="fa fa-plus"></span> Tambah Data</a>
                    <a href="{{ route('ruang.trash') }}" class="btn btn-sm btn-warning text-white mb-3"><span class="fa fa-trash-alt"></span> Recycle Bin</a>
                    
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
                            <th>Action</th>
                        </tr>
                        @if ($data->count() > 0)                            
                        @foreach($data as $row)
                        <tr>
                            <td>{{ $row->kode_ruang }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->keterangan }}</td>
                            <td class="text-center">
                                <a href="{{ url('ruang/'.$row->id.'/edit') }}" class="btn btn-sm btn-info text-light"><span class="fa fa-pencil-alt"></span></a>
                                <form method="POST" action="{{ url('ruang/'.$row->id) }}" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger"><span class="fa fa-trash-alt"></span></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4" class="text-center">Data Kosong</td>
                        </tr>
                        @endif
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection