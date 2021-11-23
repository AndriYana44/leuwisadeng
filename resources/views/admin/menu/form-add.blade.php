@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pengelolaan menu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                <li class="breadcrumb-item active">Menu manager</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <style>
        .select2-container--default .select2-selection--single {
            height: 40px;
        }
    </style>

    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow rounded">
                        <div class="card-header">
                            <span>Create menu</span>
                        </div>

                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <form id="form-menu" method="POST">
                                        @csrf
                                        <div class="form-group mb-5">
                                            <label for="menu">Jenis menu</label>
                                            <select name="jenis" id="jenis" class="form-control">
                                                <option value=""></option>
                                                <option value="1">Single Menu</option>
                                                <option value="2">Parent Menu</option>
                                                <option value="3">Child Menu</option>
                                            </select>
                                        </div>
                                        <hr>
                                        
                                        <div class="form-group parent-menu">
                                            <div class="col-12">
                                                <label for="parent">Parent Menu</label>
                                                <select name="parent" id="parent">
                                                    <option value=""></option>
                                                    @foreach ($parent as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group nama-menu">
                                            <div class="col-12">
                                                <label for="menu">Nama menu</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-pen"></i>
                                                    </span>
                                                    <input type="text" class="form-control" name="menu" placeholder="nama menu">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group url-menu">
                                            <div class="col-12">
                                                <label for="link">Url</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-pen"></i>
                                                    </span>
                                                    <input type="text" class="form-control" name="url" placeholder="http:// ..">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group urutan-menu">
                                            <div class="col-3">
                                                <label for="link">Urutan Menu</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-number">#</i>
                                                    </span>
                                                    <input type="number" class="form-control" name="urutan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group halaman-menu">
                                            <div class="col-12">
                                                <label for="halaman">Halaman</label>
                                                <select name="halaman" id="halaman">
                                                    <option value=""></option>
                                                    @foreach ($halaman as $item)
                                                    <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group submit-wrapper">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                                                <button class="btn btn-danger cancel float-right mr-2" type="button">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
        cancel('.cancel');

        (function submitForm() {
            $('#form-menu').on('submit', function(e) {
                if($('#jenis').val() == 2) {
                    $(this).attr('action', `{{ url('') }}/admin/menu/create/parent`);
                }else if($('#jenis').val() == 3) {
                    $(this).attr('action', `{{ url('') }}/admin/menu/create/child`);
                }else{
                    $(this).attr('action', `{{ url('') }}/admin/menu/create/single`);
                }
            });
        })();

        $('.parent-menu').hide();
        $('.nama-menu').hide();
        $('.url-menu').hide();
        $('.halaman-menu').hide();
        $('.urutan-menu').hide();
        $('.submit-wrapper').hide();

        select2conf('#jenis', 'Pilih jenis menu');
        select2conf('#parent', 'Pilih parent menu');
        select2conf('#halaman', 'Pilih halaman');

        (function selectJenisMenu() {
            $('#jenis').change(function(e) {
                let val = $(this).val();
                if(val == 3) {
                    $('.urutan-menu').hide();
                    $('.urutan-menu select').attr('disabled', 'on');
                    $('.submit-wrapper').show();
                    $('.parent-menu').show();
                    $('.parent-menu select').removeAttr('disabled');
                    $('.nama-menu').show();
                    $('.nama-menu select').removeAttr('disabled');
                    $('.url-menu').show();
                    $('.url-menu select').removeAttr('disabled');
                    $('.halaman-menu').show();
                    $('.halaman-menu select').removeAttr('disabled');
                }else if(val == 2) {
                    $('.urutan-menu').show();
                    $('.urutan-menu select').removeAttr('disabled');
                    $('.submit-wrapper').show();
                    $('.parent-menu').hide();
                    $('.parent-menu select').attr('disabled', 'on');
                    $('.nama-menu').show();
                    $('.nama-menu select').removeAttr('disabled');
                    $('.url-menu').hide();
                    $('.url-menu select').removeAttr('disabled');
                    $('.halaman-menu').hide();
                    $('.halaman-menu select').attr('disabled', 'on');
                }else if(val == 1) {
                    $('.urutan-menu').show();
                    $('.urutan-menu select').removeAttr('disabled');
                    $('.submit-wrapper').show();
                    $('.parent-menu').hide();
                    $('.parent-menu select').attr('disabled', 'on');
                    $('.nama-menu').show();
                    $('.nama-menu select').removeAttr('disabled');
                    $('.url-menu').show();
                    $('.url-menu select').removeAttr('disabled');
                    $('.halaman-menu').show();
                    $('.halaman-menu select').removeAttr('disabled');
                }
            });
        })();

        function select2conf(selector, placeholder) {
            $(selector).select2({
                'width': '100%',
                'placeholder': placeholder
            });
        }
    </script>
@endsection