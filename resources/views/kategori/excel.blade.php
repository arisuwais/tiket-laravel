@extends('layouts.app')

@section('content')
<style type="text/css">
    .card-header {
        background-color: #27c8f9;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><i class="fas fa-plus-circle">Kategori Upload Excel</i></div>
                <div class="card-body">
                    @include('validasi')
                    {!! Form::open(['route'=>'kategori.upload.excel', 'method'=>'POST', 'enctype'=>'multipart/data']) !!}

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-space-shuttle">Upload kategori</i></label>
                        <div class="col-md-6">
                            {!! Form::file('file', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-2">
                            <button type="submit" class="btn btn-danger btn-sm">Upload File</button>
                            <a href="{{route('kategori.index')}}" class="btn btn-primary btn-sm">Kembali</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection