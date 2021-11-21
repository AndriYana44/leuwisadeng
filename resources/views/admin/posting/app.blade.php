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
                                <a href="{{ url('admin/posting/create') }}" class="float-right btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
                            </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-info" role="alert">
                                    {{ $message }}
                                </div>
                            @endif

                            <div class="card-body">
                                <table id="table-posting" class="table table-striped table-bordered display nowrap" style="width:100%">
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
                                                <td>{{ $item->kategori->kategori }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>
                                                    <div class="img-wrapper" style="width: 120px; padding: 6px; border: 1px solid #ddd;">
                                                        <img src='{{ asset("file_upload/$item->image") }}' style="width: 100%; height: 80px;">
                                                    </div>
                                                </td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>
                                                    <form action="{{ url('') }}/admin/posting/edit/{{ $item->id }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning btn-sm">
                                                            <i class="fa fa-pen"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ url('') }}/admin/posting/delete/{{ $item->id }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" onclick="return confirm('Lanjukan menghapus data?')" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
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

    <!-- Modal -->
    <div class="modal fade" id="addKategori" tabindex="-1" role="dialog" aria-labelledby="addKategori" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ url('') }}/admin/kategori/store" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kategori">Nama Kategori</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-pen"></i>
                                </span>
                                <input type="text" name="kategori" class="form-control" autofocus autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $('#table-posting').DataTable({
                'scrollX': true
            });
        });
    </script>
@endsection