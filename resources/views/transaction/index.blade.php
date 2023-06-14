@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#modalOutTrans">
                                <i class="fa fa-fw fa-plus-circle"></i> Buat Laporan Barang Keluar
                            </button>
                            <!-- <a href="{{route('transaction.add',['type' => 1])}}" class="btn btn-sm btn-success">
                                <i class="fa fa-fw fa-plus-circle"></i> Buat Laporan Barang Masuk
                            </a> -->
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                data-target="#exampleModalLong">
                                <i class="fa fa-fw fa-plus-circle"></i> Buat Laporan Barang Masuk
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Jumlah Item</th>
                                    <th>Prepared By</th>
                                    <th>Checked By</th>
                                    <th>Approved By</th>
                                    <th>Dibuat Tgl</th>
                                    <th style="width:10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                <tr>

                                    <td><a
                                            href="{{route('transaction.show', ['id' => $transaction->id])}}">{{$transaction->unique_id}}</a>
                                    </td>
                                    <td>{{$transaction->type == 1 ? 'Masuk' : 'Keluar'}}</td>
                                    <td>{{count($transaction->materials)}}</td>
                                    <td>{{$transaction->prepared->name ?? ''}}</td>
                                    <td>{{$transaction->checker->name ?? ''}}</td>
                                    <td>{{$transaction->approver->name ?? ''}}</td>
                                    <td>{{date('d-M-Y', $transaction->created_at)}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-fw fa-cogs"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <form
                                                    action="{{ route('transaction.destroy', ['id' => $transaction->id]) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="dropdown-item text-danger">Delete</button>

                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="{{route('transaction.add')}}">
            <input type="hidden" name="type" value="1">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Pilih Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(count($materials) <= 0) <div class="row justify-content-center">
                        <div class="col-sm-12 text-center">
                            <p class="text-center">Material Kosong</p>
                            <a href="{{route('material.add')}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-fw fa-plus-circle"></i> Create Material
                            </a>
                        </div>
                </div> @else @csrf <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Kode Barang</th>
                            <th>Nama</th>
                            <th>Quantity</th>
                            <th style="width:10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($materials as $material)

                        <tr>
                            <td>
                                @if(count($material->images) > 0)
                                <img src="{{URL::to('/images/material/' . $material->images[0]->path)}}" class="rounded"
                                    width="50" id="preview_profile" alt="user-profile">
                                @else
                                -
                                @endif
                            </td>
                            <td>{{$material->kode_barang}}</td>
                            <td>{{$material->name}}</td>
                            <td>{{$material->stock}}</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" name="materials[]" type="checkbox"
                                        value="{{$material->id}}" id="check">
                                    <label class="form-check-label" for="check">
                                        Pilih
                                    </label>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <a href="{{route('material.add')}}" class="btn btn-success"><i class="fa fa-fw fa-plus-circle"></i>
                    Tambah Material</a>
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Lanjut</button>
                </div>
            </div>
    </div>
    </form>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalOutTrans" tabindex="-1" role="dialog" aria-labelledby="modalOutTransTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="{{route('transaction.add')}}">
            <input type="hidden" name="type" value="0">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalOutTransTitle">Pilih Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(empty($materials))
                    Material Kosong
                    @else
                    <form method="POST" action="{{route('transaction.add', [''])}}">
                        @csrf
                        <table class="table table-bordered" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Kode Barang</th>
                                    <th>Nama</th>
                                    <th>Quantity</th>
                                    <th style="width:10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($materials as $material)

                                <tr>
                                    <td>
                                        @if(count($material->images) > 0)
                                        <img src="{{URL::to('/images/material/' . $material->images[0]->path)}}"
                                            class="rounded" width="50" id="preview_profile" alt="user-profile">
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>{{$material->kode_barang}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->stock}}</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" name="materials[]" type="checkbox"
                                                value="{{$material->id}}" id="check">
                                            <label class="form-check-label" for="check">
                                                Pilih
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    @endif
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <a href="{{route('material.add')}}" class="btn btn-success"><i class="fa fa-fw fa-plus-circle"></i>
                        Tambah Material</a>
                    <div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Lanjut</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection