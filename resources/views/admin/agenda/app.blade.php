@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Agenda</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                    <li class="breadcrumb-item active">Agenda</li>
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
                                <span>Data agenda</span>
                                <a type="submit" href="{{ url('admin/agenda/create') }}" class="float-right btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-info" role="alert">
                                    {{ $message }}
                                </div>
                            @endif
                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="table-agenda" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->judul }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>
                                                    <form action="{{ url('') }}/admin/agenda/delete/{{ $item->id }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" onclick="return confirm('Lanjutkan menghapus data?')" class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                    <form action="{{ url('') }}/admin/agenda/edit/{{ $item->id }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning btn-sm">Edit</button>
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
@section('scripts')
    <script>
        $('#table-agenda').DataTable();
    </script>
@endsection