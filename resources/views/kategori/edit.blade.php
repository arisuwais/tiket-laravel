@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Katgori</div>
                <div class="card-body">
                    @include('validasi')
                    {!! Form::model($kategori, ['route'=>['kategori.update', $kategori->id], 'method'=>'PUT']) !!}

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">Nama kategori</label>
                        <div class="col-md-6">
                            {!! Form::text('nama_kategori', null,['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-2">
                            <button type="submit" class="btn btn-danger btn-sm">Update</button>
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