@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Album</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item active">Album</li>
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
                                <span>Data Album</span>
                                <a type="submit" href="{{ url('admin/halaman/create') }}" class="float-right btn btn-success btn-sm" data-toggle="modal" data-target="#addAlbum">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
                            </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-info" role="alert">
                                    {{ $message }}
                                </div>
                            @endif

                            @error('album')
                            <div class="alert alert-danger" role="alert">
                                Nama album sudah ada!
                            </div>
                            @enderror

                            <div class="card-body">
                                <table class="table table-bordered table-striped table-hover" id="table-album">
                                    <thead>
                                        <tr>
                                            <th>Judul Album</th>
                                            <th>Tanggal dibuat</th>
                                            <th>Terakhir update</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->album }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editAlbum{{ $item->id }}">
                                                    <i class="fa fa-pen"></i>
                                                </button>
                                                <form action="{{ url('') }}/admin/album/delete/{{ $item->id }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Lanjukan menghapus data?')">
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

    <!-- Modal add -->
    <div class="modal fade" data-target="add" id="addAlbum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ url('admin/album/store') }}" method="POST" class="form-album">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="album">Nama Album</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-pen"></i>
                            </span>
                            <input type="text" class="form-control" name="album" autocomplete="off" placeholder="masukan nama album">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <!-- Modal edit -->
    @foreach ($data as $item)
        <div class="modal fade" data-target='edit' id="editAlbum{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{ url('') }}/admin/album/update/{{ $item->id }}" method="POST" class="form-album">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="album">Nama Album</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-pen"></i>
                                </span>
                                <input type="text" class="form-control" value="{{ $item->album }}" name="album" autocomplete="off" placeholder="masukan nama album">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    @endforeach
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#table-album').DataTable()
        });
    </script>
@endsection