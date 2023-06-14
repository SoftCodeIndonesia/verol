@extends('layouts.master')

@section('content')
@if(count($materials) < 0) <div class="card">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-sm-12 text-center">
                <p>Belum Ada Material</p>
                <a href="{{route('material.add')}}" class="btn btn-sm btn-primary"><i
                        class="fa fa-fw fa-plus-circle"></i> Buat Material</a>
            </div>
        </div>
    </div>
    </div>
    @else
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Pilih Material
            </button>
            <form class="needs-validation" method="POST" action="{{route('transaction.store')}}">
                @csrf
                <input type="hidden" class="form-control" name="type" value="{{ $type }}"
                    placeholder="Masukan quantity">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Material</th>
                                <th>Type</th>
                                <th>User</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>nama barang</td>
                                <td>sdfsd</td>
                                <td>sdfsd</td>
                                <td>sdf</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- <div class="form-group">
                    <label for="role">Material</label>
                    <select id="role" class="form-control" name="material">
                        @foreach ($materials as $material)
                        <option value="{{$material->id}}">{{$material->name}}</option>
                        @endforeach

                    </select>
                    <input type="text" class="form-control" min="1" id="role" name="quantity"
                        value="{{ old('quantity') }}" placeholder="Masukan quantity">
                </div>
                <div class=" form-group">
                    <label for="role">quantity</label>
                    <input type="number" class="form-control" min="1" id="role" name="quantity"
                        value="{{ old('quantity') }}" placeholder="Masukan quantity">
                    @error('quantity')<div class="text-danger">{{$message}}</div>@enderror
                </div> -->

                <button class=" btn btn-primary mt-5" type="submit">Simpan</button>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endsection