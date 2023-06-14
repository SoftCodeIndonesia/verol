@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="POST" enctype="multipart/form-data" action="{{route('material.store')}}">
            @csrf
            <div class="form-group">
                <input type="file" accept="image/*" name="images[]" id="images_1" class="custom-file-input"
                    style="display: none">
                <input type="file" accept="image/*" name="images[]" id="images_2" class="custom-file-input"
                    style="display: none">
                <input type="file" accept="image/*" name="images[]" id="images_3" class="custom-file-input"
                    style="display: none">
                <input type="file" accept="image/*" name="images[]" id="images_4" class="custom-file-input"
                    style="display: none">
                <div class="row align-items-center">
                    <label class="col-sm-3" for="images_1">
                        <div class="card images_1">
                            <div class="card-body text-center d-flex align-items-center justify-content-center"
                                style="height: 200px">
                                <i class="fa fa-fw fa-plus-circle"></i> upload image
                            </div>
                        </div>
                    </label>
                    <label class="col-sm-3" for="images_2">
                        <div class="card images_2">
                            <div class="card-body text-center text-center d-flex align-items-center justify-content-center"
                                style="height: 200px">
                                <i class="fa fa-fw fa-plus-circle"></i> upload image
                            </div>
                        </div>
                    </label>
                    <label class="col-sm-3" for="images_3">
                        <div class="card images_3">
                            <div class="card-body text-center text-center d-flex align-items-center justify-content-center"
                                style="height: 200px">
                                <i class="fa fa-fw fa-plus-circle"></i> upload image
                            </div>
                        </div>
                    </label>
                    <label class="col-sm-3" for="images_4">
                        <div class="card images_4">
                            <div class="card-body text-center text-center d-flex align-items-center justify-content-center"
                                style="height: 200px">
                                <i class="fa fa-fw fa-plus-circle"></i> upload image
                            </div>
                        </div>
                    </label>
                </div>
            </div>
            <div class=" form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                    value="{{ old('kode_barang') }}" placeholder="Masukan Kode Barang">
                @error('kode_barang')<div class="text-danger">{{$message}}</div>@enderror
            </div>
            <div class="form-group">
                <label for="name">Nama Material</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    placeholder="Masukan nama material">
                @error('name')<div class="text-danger">{{$message}}</div>@enderror
            </div>
            <div class=" form-group">
                <label for="role">Stock</label>
                <input type="number" class="form-control" id="role" name="stock" value="{{ old('stock') }}"
                    placeholder="Masukan stock awal">
                @error('stock')<div class="text-danger">{{$message}}</div>@enderror
            </div>


            <button class=" btn btn-primary mt-5" type="submit">Simpan</button>
        </form>
    </div>
</div>
@endsection