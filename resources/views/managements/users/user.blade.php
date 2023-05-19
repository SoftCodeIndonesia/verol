@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Users</h6>
                        </div>
                        @if(Auth::user()->hasDirectPermission('create users'))
                        <div class="col-sm-6 text-right">
                            <a href="{{route('user.add')}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-fw fa-plus-circle"></i> Create Users
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Dibuat Tgl</th>
                                    @if(Auth::user()->hasAnyDirectPermission(['edit users', 'delete users']))
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="text-center">
                                            @if($user->foto !== "")
                                            <img src="{{URL::to('/images/profile/' . $user->foto)}}"
                                                class="rounded-circle" width="50" id="preview_profile"
                                                alt="user-profile">
                                            @else
                                            <img src="https://sman1binjai.sch.id/wp-content/plugins/buddyboss-platform/bp-core/images/profile-avatar-buddyboss.png"
                                                class="rounded-circle" width="50" id="preview_profile"
                                                alt="user-profile">
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->created_at}}</td>
                                    @if(Auth::user()->hasAnyDirectPermission(['edit users', 'delete users']))
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-fw fa-cogs"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @if(Auth::user()->hasDirectPermission('edit users'))
                                                <a class="dropdown-item"
                                                    href="{{ route('user.update', ['id' => $user->id]) }}">Edit</a>
                                                @endif
                                                <div class="dropdown-divider"></div>
                                                @if(Auth::user()->hasDirectPermission('delete users'))
                                                <form action="{{ route('user.destroy', ['id' => $user->id]) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="dropdown-item text-danger">Delete</button>

                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    @endif
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hak aksess</h5>
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

@endsection