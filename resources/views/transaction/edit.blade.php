@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="POST" action="{{route('material.store')}}">
            @csrf
            <div class="form-group col-md-12">
                <label for="role">Type Transaksi</label>
                <select id="role" class="form-control" name="type">
                    <option value="1">Masuk</option>
                    <option value="0">Keluar</option>
                </select>
            </div>
            <div class="form-group col-md-12">
                <label for="role">Material</label>
                <select id="role" class="form-control" name="material">
                    @foreach ($materals as $material)
                    <option value="{{$material->id}}">{{$material->name}}</option>
                    @endforeach

                </select>
            </div>
            <div class=" form-group">
                <label for="role">quantity</label>
                <input type="number" class="form-control" id="role" name="quantity" value="{{ old('quantity') }}"
                    placeholder="Masukan quantity">
                @error('quantity')<div class="text-danger">{{$message}}</div>@enderror
            </div>

            <button class=" btn btn-primary mt-5" type="submit">Simpan</button>
        </form>
    </div>
</div>
@endsection