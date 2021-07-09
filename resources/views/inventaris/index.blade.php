@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show">{{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('failed'))
                    <div class="alert alert-danger alert-dismissible fade show">{{ Session::get('failed') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Halaman Inventaris</div>
                    <div class="card-body">
                        <a href="{{ url('inventaris/create') }}" class="btn btn-sm btn-primary mb-3"><span
                                class="fa fa-plus"></span> Tambah Data</a>
                        <a href="{{ url('inventaris/trash') }}" class="btn btn-sm btn-warning text-white mb-3"><span
                                class="fa fa-trash-alt"></span> Recycle Bin</a>

                        <form class="form-inline" method="GET" action="{{ url('inventaris') }}">
                            <div class="form-group mb-2">
                                <input name="keyword" class="form-control form-control-sm" type="text"
                                    value="{{ $keyword }}" placeholder="Cari...">
                            </div>
                            <button type="submit" class="btn btn-sm btn-secondary ml-2 mb-2">Cari</button>
                        </form>

                        <table class="table table-bordered">
                            <tr class="text-center">
                                <th>Kode Inventaris</th>
                                <th>Nama Inventaris</th>
                                <th>Kondisi</th>
                                <th>Keterangan</th>
                                <th>Jumlah</th>
                                <th>Gambar</th>
                                <th>ID Ruang</th>
                                <th>Action</th>
                            </tr>
                            @if ($data->count() > 0)
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $row->kode }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>
                                            @if ($row->kondisi == '1')
                                                Baik
                                            @elseif ($row->kondisi == '2')
                                                Rusak Ringan
                                            @elseif ($row->kondisi == '3')
                                                Rusak Berat
                                            @else
                                                Not Define
                                            @endif
                                        </td>
                                        <td>{{ $row->keterangan }}</td>
                                        <td>{{ $row->jumlah }}</td>
                                        <td class="text-center">
                                            @if (strlen($row->gambar) > 0)
                                                <img src="{{ asset('image/' . $row->gambar) }}" width="80px">
                                            @endif
                                        </td>
                                        <td>{{ $row->id_ruang }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('inventaris/' . $row->id . '/edit') }}"
                                                class="btn btn-sm btn-info text-light"><span
                                                    class="fa fa-pencil-alt"></span></a>
                                            <form method="POST" action="{{ url('inventaris/' . $row->id) }}"
                                                class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-danger"><span
                                                        class="fa fa-trash-alt"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center">Data Kosong</td>
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
