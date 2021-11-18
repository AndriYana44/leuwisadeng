@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Posting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                    <li class="breadcrumb-item active">Posting</li>
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
                                <span>Pengelolaan data posting</span>
                                <a type="submit" href="{{ url('admin/posting/create') }}" class="float-right btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
                            </div>

                            @if ($message = Session::has('success'))
                                <div class="alert alert-info" role="alert">
                                    {{ $message }}
                                </div>
                            @endif

                            <div class="card-body">
                                <table id="table-posting" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Tanggal</th>
                                            <th>Gambar</th>
                                            <th>Di terbitkan</th>
                                            <th>Di update</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->judul }}</td>
                                                <td>{{ $item->kategori }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>
                                                    <img src='{{ asset("file_upload/$item->image") }}' style="width: 80px; height: 80px;">
                                                </td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>
                                                    <form action="{{ url('') }}/admin/posting/edit/{{ $item->id }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                                    </form>
                                                    <form action="{{ url('') }}/admin/posting/delete/{{ $item->id }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" onclick="return confirm('Lanjukan menghapus data?')" class="btn btn-danger btn-sm">Hapus</button>
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
        $(function() {
            $('#table-posting').DataTable()
        });
    </script>
@endsection