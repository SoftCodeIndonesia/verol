@extends('layouts.master')

@section('content')
<div class="card col-12">
    <div class="card-body">
        <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-12 text-center">
                    <!-- <div class="custom-file">
                       
                    </div> -->
                    <input type="file" accept="image/*" name="photo" class="custom-file-input" id="customFile">
                    <label for="customFile">
                        <div class="text-center">
                            <img src="https://w7.pngwing.com/pngs/753/432/png-transparent-user-profile-2018-in-sight-user-conference-expo-business-default-business-angle-service-people-thumbnail.png"
                                class="rounded-circle" width="200" id="preview_profile" alt="user-profile">
                        </div>
                    </label>

                </div>
            </div>
            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group col-md-12">
                        <label for="name">Nama</label>
                        <input type=text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        @error('name')<div class="text-danger">{{$message}}</div>@enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="name">Username</label>
                        <input type=text" class="form-control" id="username" name="username"
                            value="{{ old('username') }}">
                        @error('username')<div class="text-danger">{{$message}}</div>@enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="defpass">Default password</label>
                        <input type="password" class="form-control" id="defpass" name="password"
                            value="{{ old('password') }}">
                        @error('password')<div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="valpass">Password validation</label>
                        <input type="password" class="form-control" id="valpass" name="password_conf"
                            value="{{ old('password_conf') }}">
                        @error('password_conf')<div class="text-danger">{{$message}}</div>@enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="role">Jabatan</label>
                        <select id="role" class="form-control" name="role">
                            @foreach ($roles as $role)
                            <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary col-sm-12">Submit</button>
                    </div>
                </div>
                <div class="col-sm-6">
                    <p class="text-dark" style="font-weight: bold">Berikan hak akses kepada user baru</p>
                    @foreach ($permissions as $permission)
                    <div class="form-group col-sm-12">
                        <input class="form-check-input" type="checkbox" id="{{$permission->name}}" name="permissions[]"
                            value="{{$permission->name}}">
                        <label class="form-check-label" for="inlineCheckbox1">{{$permission->name}}</label>
                    </div>
                    @endforeach

                </div>
            </div>

        </form>
    </div>
</div>
@endsection