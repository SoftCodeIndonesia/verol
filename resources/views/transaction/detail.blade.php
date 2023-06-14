@extends('layouts.master')

@section('content')
<div class="container">

    {!!$data_alert!!}
    <div class="card shadow">
        <div class="card-body">

            <div class="row justify-content-center">
                <div class="col-sm-12 text-center">
                    @if($transaction->type == 0)
                    <h5 class="font-weight-bold">LAPORAN PENGELUARAN BARANG</h5>
                    @else
                    <h5 class="font-weight-bold">LAPORAN STOK BARANG</h5>
                    @endif
                    <p>PT CAHAYA ABADI PLASTIK</p>
                    <p>Jl. Kenari 1 Blok G1 No.27, Delta Silicon V, Lippo Cikarang</p>
                    <p>Bekasi, Jawa Barat, Indonesia</p>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama</th>
                                    <th>Satuan</th>
                                    @if($transaction->type == 0)
                                    <th>Quantity</th>
                                    @else
                                    <th>Stock</th>
                                    @endif
                                    @if($transaction->type == 1)
                                    <th>Actual</th>
                                    <th>Selisih</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaction->materials as $key => $value)

                                <td>
                                    {{$value->material->kode_barang}}
                                </td>
                                <td>{{$value->material->name}}</td>
                                <td>{{$value->satuan}}</td>
                                <td>{{$value->stock}}</td>
                                @if($transaction->type == 1)
                                <td>
                                    {{$value->actual}}
                                </td>
                                <td>
                                    {{$value->selisih}}
                                </td>
                                @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-12">
                    <span class="text-left fw-bold" style="font-weight: bold">Dibuat Oleh</span>
                    <span class="float-right">{{$transaction->prepared->name}}</span>
                </div>
                <div class="col-sm-12">
                    <span class="text-left fw-bold" style="font-weight: bold">DiPeriksa Oleh</span>
                    <span class="float-right">{{$transaction->checker->name ?? 'Menunggu di periksa'}}</span>
                </div>
                <div class="col-sm-12">
                    <span class="text-left fw-bold" style="font-weight: bold">Disetujui Oleh</span>
                    <span class="float-right">{{$transaction->approver->name ?? 'Menunggu di setujui'}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection