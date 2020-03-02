@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>


                <table class="table table-bordered" id="users-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($kategori as $item)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$item->nama_kategori}}</td>
                            <td><a href="{{route('kategori.edit', $item->id)}}" class="btn btn-danger btn-sm">Edit</a></td>
                            <td><a href="{{route('kategori.destroy', $item->id)}}" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
</div>
@endsection


@push('scripts')
<script>
    $(function() {
        $('#users-table').DataTable();
    });
</script>
@endpush