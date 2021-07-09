@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Data Inventaris</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('inventaris/' . $model->id) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">

                            @include('inventaris._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
