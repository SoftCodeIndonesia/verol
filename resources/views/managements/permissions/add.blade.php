@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <form class="needs-validation" method="POST" action="{{route('permission.store')}}">
            @csrf
            <div class="form-group">
                <label for="permission">Permission</label>
                <input type="text" class="form-control" id="permission" name="permission"
                    value="{{ old('permission') }}" placeholder="create transaction example">
                @error('permission')<div class="text-danger"">{{$message}}</div>@enderror
            </div>
            <button class=" btn btn-primary" type="submit">Simpan</button>
        </form>
    </div>
</div>
@endsection