@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengeloaan Halaman Statis</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                    <li class="breadcrumb-item active">Halaman</li>
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
                                <span>Pengelolaan Halaman Statis</span>
                                <button type="button" class="float-right btn btn-info btn-sm ml-2" data-toggle="modal" data-target="#addKategori">
                                    <i class="fa fa-list-ul"></i> Tambah Kategori
                                </button>
                            </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-info" role="alert">
                                    {{ $message }}
                                </div>
                            @endif

                            <div class="card-body">
                                <table class="table table-bordered table-hover table-striped display nowrap" id="table-kategori" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Tanggal dibuat</th>
                                            <th>Terakhir update</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kategori }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td>
                                                <form action="{{ url('') }}/admin/kategori/delete/{{ $item->id }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Lanjukan menghapus data?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#editKategori{{ $item->id }}">
                                                    <i class="fa fa-pen"></i>
                                                </button>
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

    <!-- Modal edit -->
    @foreach ($data as $item)    
    <div class="modal fade" id="editKategori{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="addKategori" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ url('') }}/admin/kategori/update/{{ $item->id }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Form Edit Kategori</h5>
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
                                <input type="text" name="kategori" value="{{ $item->kategori }}" class="form-control" autofocus autocomplete="off">
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
    @endforeach

    <!-- Modal add -->
    <div class="modal fade" id="addKategori" tabindex="-1" role="dialog" aria-labelledby="addKategori" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ url('') }}/admin/kategori/store" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Kategori</h5>
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
            $('#table-kategori').DataTable({
                'scrollX': true
            });
        });
    </script>
@endsection