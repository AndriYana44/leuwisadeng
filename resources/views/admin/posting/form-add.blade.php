@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah data posting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Posting</li>
                    <li class="breadcrumb-item active">Create</li>
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
                        <form action="" method="POST">
                            <div class="card shadow rounded pb-4">
                                <div class="card-header">
                                    <span>Tambah data posting</span>
                                </div>
                                <div class="card-body">
                                    <table style="width: 80%">
                                        <tr>
                                            <td class="lable">
                                                <div class="form-group mb-3">
                                                    <label for="judul">Judul Posting &emsp; </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="judul" placeholder="masukan judul posting">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="lable">
                                                <div class="form-group mb-3">
                                                    <label for="kategori">Kategori &emsp; </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="kategori" placeholder="masukan kategori">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="lable">
                                                <div class="form-group mb-3">
                                                    <label for="tanggal">Tanggal &emsp; </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3 col-4">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-calendar-check"></i>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="tanggal" id="tanggal">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="lable">
                                                <div class="form-group mb-3">
                                                    <label for="gambar">Gambar Utama &emsp; </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="lable">
                                                <div class="form-group mb-3">
                                                    <label for="konten">Konten &emsp; </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <textarea name="konten" id="konten" style="width: 100%"></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="lable">
                                                <div class="form-group mb-3">
                                                    <label for="kata_kunci">Kata Kunci &emsp; </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input name="kata_kunci" id="kata_kunci" class="form-control" placeholder="masukan kata kunci">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="lable">
                                                <div class="form-group">
                                                    <label for="deskripsi">Deskripsi &emsp; </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input name="deskripsi" id="deskripsi" class="form-control" placeholder="masukan deskripsi">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="form-group mt-4">
                                                    <button type="submit" class="btn btn-primary float-right">
                                                        <i class="fa fa-check"></i> Sumbit
                                                    </button>
                                                    <button type="reset" class="btn btn-warning float-right mr-2">
                                                        <i class="fa fa-spinner"></i> Reset
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            (function setDateValue() {
                const date = new Date();
                console.log(date.getDate())
                $('#tanggal').val(`${date.getFullYear()}-${date.getMonth() + 1}-${date.getDate()}`)
            })();
            
            $('#tanggal').datepicker();
            CKEDITOR.replace('konten');

        });
    </script>
@endsection