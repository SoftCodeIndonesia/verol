@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="POST" action="{{route('material.update', ['id' => $material->id])}}">
            @csrf
            @method('PUT')
            <div class=" form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                    value="{{ $material->kode_barang }}" placeholder="Masukan kode satuan">
                @error('kode_barang')<div class="text-danger">{{$message}}</div>@enderror
            </div>
            <div class="form-group">
                <label for="role">Nama Material</label>
                <input type="text" class="form-control" id="role" name="name" value="{{ $material->name }}"
                    placeholder="Masukan nama material">
                @error('name')<div class="text-danger">{{$message}}</div>@enderror
            </div>
            <div class=" form-group">
                <label for="role">Stock</label>
                <input type="number" class="form-control" id="role" name="stock" value="{{ $material->stock }}"
                    placeholder="Masukan stock awal">
                @error('stock')<div class="text-danger">{{$message}}</div>@enderror
            </div>


            <button class=" btn btn-primary mt-5" type="submit">Simpan</button>
        </form>
    </div>
</div>
@endsection