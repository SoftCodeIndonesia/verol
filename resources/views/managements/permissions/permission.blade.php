@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="m-0 font-weight-bold text-primary">Permission</h6>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{route('permission.create')}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-fw fa-plus-circle"></i> Create Permission
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Dibuat pada</th>
                                    <th>Terakhir di update</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->created_at}}</td>
                                    <td>{{$permission->updated_at}}</td>
                                    <!-- <td>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{route('permission.destroy', $permission->id)}}"><i
                                                class="fa fa-fw fa-trash"></i> Hapus</a>

                                    </td> -->
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
@endsection