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
                <div class="card">
                    <div class="card-header">Recycle Bin Inventaris</div>
                    <div class="card-body">
                        <a href="{{ url('inventaris/restore') }}" class="btn btn-sm btn-info mb-3"><span
                                class="fa fa-undo"></span> Restore All</a>
                        <form method="POST" action="{{ url('inventaris/delete') }}" class="d-inline"
                            onsubmit="return confirm('Data akan dihapus permanen. Yakin?')">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger mb-3"><span class="fa fa-trash"></span>
                                Delete Permanently All</button>
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
                                            <a href="{{ url('inventaris/restore/' . $row->id) }}"
                                                class="btn btn-sm btn-info text-light">Restore</a>
                                            <form method="POST" action="{{ url('inventaris/delete/' . $row->id) }}"
                                                class="d-inline"
                                                onsubmit="return confirm('Data akan dihapus permanen. Yakin?')">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-danger">Delete
                                                    Permanently</button>
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
                        <a href="{{ url('inventaris') }}" class="btn btn-sm btn-secondary"><span
                                class="fa fa-arrow-left"></span> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
