@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="m-0 font-weight-bold text-primary">Jabatan</h6>
                        </div>
                        @if(Auth::user()->hasDirectPermission('create jabatan'))
                        <div class="col-sm-6 text-right">
                            <a href="{{route('role.add')}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-fw fa-plus-circle"></i> Buat Jabatan Baru
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
                                    <th>Nama Jabatan</th>
                                    <th>Dibuat pada</th>
                                    <th>Terakhir di update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->created_at}}</td>
                                    <td>{{$role->updated_at}}</td>
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