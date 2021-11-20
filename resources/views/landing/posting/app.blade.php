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
        padding: 20px 40px;
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
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
</style>
@foreach ($data as $item)    
<div class="container"> 
    <div class="hierarki">
        <h3 style="color: #555">{{ $item->judul }}</h3>
        <small style="color: #999">Beranda / Detail berita</small>
    </div>
</div>
<div class="container mt-4">
    <div class="card content mt-3 py-4 mb-5 text-center" style="border: none">
        <div class="card-body" style="color: #555">
            {!! $item->konten !!}
            <hr>
            <a href="#" class="btn btn-success text-white"><i class="fa fa-list"></i>&emsp;Lihat agenda kegiatan</a>
        </div>
    </div>
</div>
@endforeach
@endsection