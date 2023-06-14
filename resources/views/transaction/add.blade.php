@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="POST" action="{{route('transaction.store')}}">
            @csrf
            <input type="hidden" class="form-control" name="type" value="{{ $type }}" placeholder="Masukan quantity">
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
                        @foreach($materials as $key => $value)
                        <input class="form-control" type="hidden" placeholder="Masukan Satuan" name="material_id[]"
                            value="{{$value->id}}" <tr>
                        <td>
                            {{$value->kode_barang}}
                        </td>
                        <td>{{$value->name}}</td>
                        <td><input class="form-control" type="text" placeholder="Masukan Satuan" name="satuan[]">
                        </td>
                        <td><input class="form-control tf_stock stock_{{$key}}" data-id="{{$key}}" type="number" min="1"
                                placeholder="Masukan Stock" name="stock[]"></td>
                        </td>
                        <td><input class="form-control actual_{{$key}}" readonly data-id="{{$key}}" type="number"
                                min="1" name="actual[]" value="{{$value->stock}}"></td>
                        <td><input class="form-control selisih_{{$key}}" type="number" data-id="{{$key}}" min="1"
                                name="selisih[]">
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <!-- <label for="role">Material</label> -->
                <!-- <select id="role" class="form-control" name="material">
                    @foreach ($materials as $material)
                    <option value="{{$material->id}}">{{$material->name}}</option>
                                @endforeach

                                </select> -->
                <!-- <input type="text" class="form-control" min="1" id="role" name="quantity" value="{{ old('quantity') }}"
                    placeholder="Masukan quantity"> -->
                <!-- </div> -->
                <!-- <div class=" form-group">
                <label for="role">quantity</label>
                <input type="number" class="form-control" min="1" id="role" name="quantity"
                    value="{{ old('quantity') }}" placeholder="Masukan quantity">
                @error('quantity')<div class="text-danger">{{$message}}</div>@enderror
            </div> -->

                <button class=" btn btn-primary mt-5" type="submit">Simpan</button>
        </form>
    </div>
</div>

@endsection