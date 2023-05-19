@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="POST" action="{{route('material.store')}}">
            @csrf
            <div class="form-group">
                <label for="role">Nama Material</label>
                <input type="text" class="form-control" id="role" name="name" value="{{ old('name') }}"
                    placeholder="Masukan nama material">
                @error('name')<div class="text-danger">{{$message}}</div>@enderror
            </div>
            <div class=" form-group">
                <label for="role">Stock</label>
                <input type="number" class="form-control" id="role" name="stock" value="{{ old('stock') }}"
                    placeholder="Masukan stock awal">
                @error('stock')<div class="text-danger">{{$message}}</div>@enderror
            </div>
            <div class=" form-group">
                <label for="role">Satuan</label>
                <input type="text" class="form-control" id="role" name="satuan" value="{{ old('satuan') }}"
                    placeholder="Masukan nama satuan">
                @error('satuan')<div class="text-danger">{{$message}}</div>@enderror
            </div>

            <button class=" btn btn-primary mt-5" type="submit">Simpan</button>
        </form>
    </div>
</div>
@endsection