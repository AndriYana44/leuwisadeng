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
        .switch-menu {
            width: 100%;
            display: flex;
            justify-content: space-around;
            border-radius: 3px;
        }
        .switch-menu span {
            padding: 10px 0;
            cursor: pointer;
            width: 100%;
            text-align: center;
            transition: .3s;
        }
        .switch-menu span:hover {
            background-color: #0071eb;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
        }
        .switch-menu span:nth-child(1) {
            border-right: 1px solid rgba(255, 255, 255, 0.5);
        }
        .switch-menu span.active {
            background-color: #0071eb;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
        }
    </style>

    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow rounded">
                        <div class="card-header">
                            <span>Pengelolaan menu</span>
                            <a href="{{ url('admin/menu/create') }}" class="float-right btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Tambah
                            </a>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-info" role="alert">
                                {{ $message }}
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="switch-menu mb-3 bg-primary">
                                <span class="menu_switch active" data-target="menuParent">Parent Menu</span>
                                <span class="menu_switch" data-target="linkMenu">Child / Single Menu</span>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    {{-- parent --}}
                                    <div class="tab_switch" id="menuParent">
                                        <table class="table table-bordered table-striped table-hover" id="tableParent">
                                            <thead>
                                                <tr>
                                                    <th>Judul Menu</th>
                                                    <th>Urutan Menu</th>
                                                    <th>Tanggal dibuat</th>
                                                    <th>Terakhir update</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <body>
                                                @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->urutan }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->updated_at }}</td>
                                                    <td>
                                                        <form action="{{ url('') }}/admin/menu/delete/parent/{{ $item->id }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Lanjukan mengahpus menu?')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ url('') }}/admin/menu/edit/{{ $item->is_single > 0 ? 'single' : 'parent' }}/{{ $item->id }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning btn-sm">
                                                                <i class="fa fa-pen"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </body>
                                        </table>
                                    </div>
                                    {{-- link menu --}}
                                    <div class="tab_switch" id="linkMenu">
                                        <table class="table table-bordered table-striped table-hover" id="tableLink">
                                            <thead>
                                                <tr>
                                                    <th>Judul Menu</th>
                                                    <th>Jenis Menu</th>
                                                    <th>Parent Menu</th>
                                                    <th>Tanggal dibuat</th>
                                                    <th>Terakhir update</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <body>
                                                @foreach ($menu_link as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->is_child == 1 ? 'Child Menu' : 'Single Menu' }}</td>
                                                    <td>{{ isset($item->parent->name) ? $item->parent->name : '-' }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->updated_at }}</td>
                                                    <td>
                                                        <form action="{{ url('') }}/admin/menu/delete/{{ $item->is_child > 0 ? 'child' : 'single' }}/{{ $item->id }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Lanjukan mengahpus menu?')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ url('') }}/admin/menu/edit/{{ $item->is_child > 0 ? 'child' : 'single' }}/{{ $item->id }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning btn-sm">
                                                                <i class="fa fa-pen"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </body>
                                        </table>
                                    </div>
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
        $(function() {
            $('#tableParent').DataTable();
            $('#tableLink').DataTable();

            $('#linkMenu').hide();
            $('.menu_switch').click(function(e) {
                let target = $(this).data('target');
                let tab = document.querySelectorAll('.tab_switch');
                
                $.each($('.menu_switch'), function(i, span) {
                    if(target == $(span).data('target')) {
                        $(span).addClass('active');
                    }else{
                        $(span).removeClass('active');
                    }
                });

                tab.forEach(function(res, idx) {
                    $(res).hide();
                    if(target == res.id) {
                        $(`#${target}`).show();
                    }
                });
            });
        });
    </script>
@endsection