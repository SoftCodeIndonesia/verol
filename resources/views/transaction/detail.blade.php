@extends('layouts.master')

@section('content')
<div class="container">

    {!!$data_alert!!}
    <div class="card shadow">
        <div class="card-body">

            <div class="row justify-content-center">
                <div class="col-sm-12 text-center">
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
                                    <th>Stock</th>
                                    <th>Actual</th>
                                    <th>Selisih</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaction->materials as $key => $value)

                                <td>
                                    {{$value->material->kode_barang}}
                                </td>
                                <td>{{$value->material->name}}</td>
                                <td>{{$value->satuan}}</td>
                                <td>
                                    {{$value->stock}}
                                </td>
                                <td>
                                    {{$value->actual}}
                                </td>
                                <td>
                                    {{$value->selisih}}
                                </td>
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