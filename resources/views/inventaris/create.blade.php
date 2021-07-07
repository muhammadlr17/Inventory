@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Data Inventaris</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('inventaris') }}" enctype="multipart/form-data">
                            @csrf
                            @include('inventaris._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
