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
                <div class="card-header"><i class="fas fa-database"> TRANSAKSI TIKET </i></div>
                <div class="card-body">
                    @include('validasi')
                    <h3><i class="fas fa"> Form Transaksi </i></h3>
                    <table class="table table-bordered">
                        {!! Form::open(['route' => 'transaksi.store','method'=>'POST']) !!}
                        <tr>
                            <td>
                                <div class="col-md-12">
                                    <!-- <input list="tiket" name="nama_tiket" placeholder="masukan nama tiket" class="form-control"> -->
                                    {!! Form::select('id_tiket',\App\tiket::pluck('name_tiket','id'),null,['class'=>'form-control']) !!}
                                </div>

                </div>
                </td>
                </tr>
                <tr>
                    <td>
                        <div class="col-md-12">
                            <!-- <input type="text" name="qty" placeholder="QTY" class="form-control"> -->
                            {!! Form::number('qty',null,['class'=>'form-control']) !!}
                        </div>

                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        <a href="{{route('transaksi.update')}}" class="btn btn-danger">Selesai</a>
                    </td>
                </tr>
                </table>
                {!! Form::close() !!}

                <table class="table table-bordered">
                    <tr class="success">
                        <th colspan="6">Detail Transaksi</th>
                    </tr>
                    <tr>
                        <th><i class="far fa-sticky-note"> No </i></th>
                        <th><i class="fas fa-file-signature"> Nama Tiket </i></th>
                        <th><i class="fas fa-star-of-david"> Qty </i></th>
                        <th><i class="fas fa-puzzle-piece"> Harga Tiket </i></th>
                        <th><i class="fab fa-cuttlefish"> Subtotal </i></th>
                        <th><i class="fas fa-trash-alt"> Cancel </i></th>
                    </tr>
                    <?php $no = 1;
                    $total = 0; ?>
                    @foreach ($transaksi as $item)
                    <tr>
                        <td>{{$no }}</td>
                        <td>{{ $item->tiket->name_tiket }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->tiket->harga_tiket }}</td>
                        @php($harga = str_replace('.','',$item->tiket->harga_tiket ))
                        <td>{{"Rp.".number_format($harga*$item->qty).",-" }}</td>
                        {!! Form::open(['route' => ['transaksi.destroy', $item->id],'method'=>'DELETE']) !!}
                        <td><button type="submit" class="btn btn-danger">Cancel</button></td>
                        {!! Form::close() !!}

                    </tr>
                    <?php $no++ ?>
                    <?php $total = $total + ($harga * $item->qty) ?>
                    @endforeach
                    <tr>
                        <td colspan="4">
                            <p><i class="fas fa"> Total </i></p>
                        </td>
                        <td>{{"Rp.".number_format($total).",-" }}</td>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection