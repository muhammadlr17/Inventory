@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Ruang</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('ruang') }}">
                        @csrf
                        @include('ruang._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection