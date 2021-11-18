@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah data halaman</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Halaman</li>
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
                        <form action="{{ url('') }}/admin/halaman/store" class="form-halaman" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow rounded pb-4">
                                <div class="card-header">
                                    <span>Tambah data halaman</span>
                                </div>
                                <div class="card-body text-center" style="display: flex; justify-content:center; align-items: center;">
                                    <table style="width: 80%;">
                                        <tr>
                                            <td class="lable">
                                                <div class="form-group mb-3">
                                                    <label for="judul">Judul Halaman &emsp; </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="masukan judul posting">
                                                    </div>
                                                    @error('judul')
                                                        <small class="text-danger float-left mb-3">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="lable">
                                                <div class="form-group mb-3">
                                                    <label for="kategori">Konten &emsp; </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <textarea name="konten" id="konten" cols="30" rows="10"></textarea>                                                    
                                                    </div>
                                                    @error('konten')
                                                        <small class="text-danger float-left mb-3">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="lable">
                                                <div class="form-group mb-3">
                                                    <label for="gambar">File Lampiran &emsp; </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="file" class="form-control @error('file') is-invalid @enderror" name="file">
                                                    </div>
                                                    <small class="float-left mt-2 validate-file" style="color: #999">
                                                        <i class="fa fa-info-circle"></i> 
                                                        Silahkan masukan file lampiran berupa file pdf, images, dll
                                                    </small>
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
                                                    <button type="button" class="btn btn-danger float-right mr-2 cancel">
                                                        <i class="fa fa-times"></i> Cancel
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
        CKEDITOR.replace('konten');

        (function submitForm() {
            $('.form-halaman').submit(function(e) {
                if($('input[type=file]')[0].files[0] != undefined) {
                    var image_size = $('input[type=file]')[0].files[0].size;
                    var image_name = $('input[type=file]')[0].files[0].name;
                    var ext_allowed = ['jpg', 'jpeg', 'png', 'pdf', 'docx', 'doc'];
                    var ext = image_name.split('.');
                    var len = ext.length;
                    if(image_size > 1500000) {
                        e.preventDefault();
                        $('input[type=file]').addClass('is-invalid');
                        $('.validate-file').addClass('text-danger');
                        $('.validate-file').html('Ukuran file terlalu besar. (max: 1.5mb)');
                    }

                    if(!ext_allowed.includes(ext[len-1])) {
                        e.preventDefault();
                        $('input[type=file]').addClass('is-invalid');
                        $('.validate-file').addClass('text-danger');
                        $('.validate-file').html('Extensi file tidak valid!');
                    }
                }else{
                    e.preventDefault();
                    $('input[type=file]').addClass('is-invalid');
                    $('.validate-file').addClass('text-danger');
                    $('.validate-file').html('File harus diisi!');
                }
            });
        })();
    </script>
@endsection