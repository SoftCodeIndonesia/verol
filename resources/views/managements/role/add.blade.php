@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="POST" action="{{route('role.store')}}">
            @csrf
            <div class="form-group">
                <label for="role">Nama Jabatan</label>
                <input type="text" class="form-control" id="role" name="role" value="{{ old('role') }}"
                    placeholder="Masukan nama jabatan baru">
                @error('role')<div class="text-danger"">{{$message}}</div>@enderror
            </div>
            <p class=" text-dark">Beri Hak Akses</p>
                    @foreach($permissions as $permission)
                    <div class="form-check">
                        <input class="form-check-input" name="permissions[]" type="checkbox"
                            value="{{$permission->name}}" id="{{$permission->name}}">
                        <label class="form-check-label" for="{{$permission->name}}">
                            {{$permission->name}}
                        </label>
                    </div>
                    @endforeach
                    <button class=" btn btn-primary mt-5" type="submit">Simpan</button>
        </form>
    </div>
</div>
@endsection