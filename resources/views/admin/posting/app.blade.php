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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                <form action="{{ url('') }}/admin/posting/create" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="float-right btn btn-success btn-sm">
                                        <i class="fa fa-plus"></i> Tambah
                                    </button>
                                </form>
                            </div>
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
                                        <tr>
                                            <td>1</td>
                                            <td>Bogor Timur</td>
                                            <td>Bogor</td>
                                            <td>Bogor</td>
                                            <td>Bogor</td>
                                            <td>Bogor</td>
                                            <td>Bogor</td>
                                        </tr>
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