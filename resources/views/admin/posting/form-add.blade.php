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
                        <form action="{{ url('') }}/admin/posting/store" method="POST" class="form-posting" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow rounded pb-4">
                                <div class="card-header">
                                    <span>Tambah data posting</span>
                                </div>
                                <div class="card-body text-center" style="display: flex; justify-content:center; align-items: center;">
                                    <table style="width: 80%;">
                                        <tr>
                                            <td class="lable">
                                                <div class="form-group mb-3">
                                                    <label for="judul">Judul Posting &emsp; </label>
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
                                                    <label for="kategori">Kategori &emsp; </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" placeholder="masukan kategori">
                                                    </div>
                                                    @error('kategori')
                                                        <small class="text-danger float-left mb-3">{{ $message }}</small>
                                                    @enderror
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
                                                <div class="form-group">
                                                    <div class="input-group col-4">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fa fa-calendar-check"></i>
                                                        </span>
                                                        <input type="text" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="tanggal" id="tanggal">
                                                    </div>
                                                    @error('tanggal')
                                                        <small class="text-danger float-left mb-3">{{ $message }}</small>
                                                    @enderror
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
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                                    </div>
                                                    <small class="text-danger float-left mb-3 validate_size" hidden>Ukuran file terlalu besar. (max: 1.5MB)</small>
                                                    @error('image')
                                                        <small class="text-danger float-left mb-3">{{ $message }}</small>
                                                    @enderror
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
                                                    <label for="kata_kunci">Kata Kunci &emsp; </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="kata_kunci" id="kata_kunci" class="form-control @error('kata_kunci') is-invalid @enderror" placeholder="masukan kata kunci">
                                                    </div>
                                                    @error('kata_kunci')
                                                        <small class="text-danger float-left mb-3">{{ $message }}</small>
                                                    @enderror
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
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="masukan deskripsi">
                                                    </div>
                                                    @error('deskripsi')
                                                        <small class="text-danger float-left mb-3">{{ $message }}</small>
                                                    @enderror
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

        $(function() {
            $('#tanggal').datepicker();
            (function setDateValue() {
                const date = new Date();
                $('#tanggal').val(`${date.getFullYear()}-${date.getMonth() + 1}-${date.getDate()}`)
            })();
            
            (function submitForm() {
                $('.form-posting').submit(function(e) {
                    var image_size = $('input[type=file]')[0].files[0].size;
                    var image_name = $('input[type=file]')[0].files[0].name;
                    var ext_allowed = ['jpg', 'jpeg', 'png'];
                    var ext = image_name.split('.');
                    var len = ext.length;

                    if(image_size > 1500000) {
                        e.preventDefault();
                        $('.validate_size').removeAttr('hidden');
                        $('input[type=file]').addClass('is-invalid');
                    }

                    if(!ext_allowed.includes(ext[len-1])) {
                        e.preventDefault();
                        $('.validate_size').html('yang anda upload bukan gambar!');
                        $('.validate_size').removeAttr('hidden');
                    }
                });
            })();
        });
    </script>
@endsection