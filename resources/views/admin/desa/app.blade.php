@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Desa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li class="breadcrumb-item active">Desa</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow rounded">
                        <div class="card-header">
                            <span>List Data Desa</span>
                            <a type="submit" href="{{ url('admin/desa/create') }}" class="float-right btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Tambah
                            </a>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-info" role="alert">
                                {{ $message }}
                            </div>
                        @endif

                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="table-desa">
                                <thead>
                                    <tr>
                                        <th>Nama Desa</th>
                                        <th>Tanggal dibuat</th>
                                        <th>Terakhir update</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->desa }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td>
                                                <form action="{{ url('') }}/admin/desa/delete/{{ $item->id }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Lanjukan menghapus data?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ url('') }}/admin/desa/edit/{{ $item->id }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button class="btn btn-warning btn-sm text-white" type="submit">
                                                        <i class="fa fa-pen"></i>
                                                    </button>
                                                </form>
                                            </td>
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
</div>
@endsection