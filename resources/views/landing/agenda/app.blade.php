@extends('layouts.app')
@section('content')
<style>
    .agenda a{
        display: flex;
        flex-direction: column;
        width: 250px;
        justify-content: center;
        align-items: center;
        padding: 15px;
        border-radius: 8px;
        text-decoration: none;
        line-height: 30px;
    }
    .hierarki {
        box-shadow: rgba(0, 0, 0, 0.2) 0px 18px 50px -10px;
        padding: 20px 40px;
    }
    .content {
        box-shadow: rgba(0, 0, 0, 0.2) 0px 60px 40px -7px;
    }
    .content p {
        text-align: left;
        margin-top: 10px;
    }
    .lampiran {
        display: flex;
        flex-direction: column;
        width: 250px;
        justify-content: center;
        align-items: center;
        margin-top: 50px;
    }
    .lampiran a {
        text-decoration: none;
    }
    .right, .left {
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
    }
</style>
    <div class="container mt-4"> 
        <div class="hierarki">
            <h3 style="color: #555">{{ $agenda->judul }}</h3>
            <small style="color: #999">Beranda / {{ $agenda->judul }}</small>
        </div>
    </div>
    <div class="container mt-4">
        <div class="card content mt-3 py-4 mb-5" style="border: none">
            <div class="card-body" style="color: #555">
                <div class="row">
                    <div class="col-8 px-5 left">
                        {!! $agenda->konten !!}
                    </div>
                    <div class="col-4 right">
                        <div class="agenda">
                            <a href="" class="btn btn-success">
                                <span class="text-white" style="font-size: 19px">Agenda Kegiatan</span>
                                <span>Selengkapnya</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection