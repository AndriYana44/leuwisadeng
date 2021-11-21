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
        /* box-shadow: rgba(0, 0, 0, 0.2) 0px 18px 50px -10px; */
        padding: 20px 40px;
        /* background: rgb(243, 243, 243); */
        border: 1px solid #eee;
        border-radius: 3px;
    }
    .content {
        box-shadow: rgba(0, 0, 0, 0.2) 0px 60px 40px -7px;
        padding: 20px 40px;
    }
    .content .card-body figure.image {
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
</style>
@foreach ($desa as $item)    
<div class="container mt-4"> 
    <div class="hierarki">
        <h3 style="color: #555">{{ $item->desa }}</h3>
        <small style="color: #999">Beranda / Detail {{ $item->desa }}</small>
    </div>
    <div class="card content mt-3 py-4 mb-5" style="border: 0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center">
                            @if (isset($item->foto_pimpinan))
                                <img src="{{ asset('') }}img/desa/{{ $item->foto_pimpinan }}" alt="avatar">                           
                            @else
                                <img src="{{ asset('img/avatar.jpeg') }}" alt="avatar" width="220">
                            @endif
                        </div>
                        <div class="card-footer">
                            <small>Pimpinan Desa : {{ isset($item->nama_pimpinan) ? $item->nama_pimpinan : '-' }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body" style="overflow: auto">
                            <table>
                                <tr>
                                    <td>{{ isset($item->desa) ? 'Nama Desa' : '' }}</td>
                                    <td>{!! isset($item->desa) ? '&nbsp;:&emsp;' : '' !!}</td>
                                    <td>{{  isset($item->desa) ? $item->desa : '' }}</td>
                                </tr>
                                <tr>
                                    <td>{!! isset($item->nama_pimpinan) ? 'Nama Pimpinan Desa' : '' !!}</td>
                                    <td>{!! isset($item->nama_pimpinansa) ? '&nbsp;:&emsp;' : '' !!}</td>
                                    <td>{{  isset($item->nama_pimpinan) ? $item->nama_pimpinan : '' }}</td>
                                </tr>
                                <tr>
                                    <td>{!! isset($item->alamat) ? 'alamat Desa' : '' !!}</td>
                                    <td>{!! isset($item->alamat) ? '&nbsp;:&emsp;' : '' !!}</td>
                                    <td>{{  isset($item->alamat) ? $item->alamat : '' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ isset($item->email) ? 'E-mail Desa' : '' }}</td>
                                    <td>{!! isset($item->email) ? '&nbsp;:&emsp;' : '' !!}</td>
                                    <td>{{  isset($item->email) ? $item->email : '' }}</td>
                                </tr>
                            </table>
                            @if (isset($item->profil))
                                <h4 class="pt-3">Profil Desa</h4>
                                {!! $item->profil !!}
                            @endif
                            @if (isset($item->profil))
                                <h4 class="pt-3">Struktur Desa</h4>
                                {!! $item->struktur !!}
                            @endif
                            @if (isset($item->profil))
                                <h4 class="pt-3">Rencana Strategis Desa</h4>
                                {!! $item->rencana !!}
                            @endif
                            @if (isset($item->profil))
                                <h4 class="pt-3">Demografi Desa</h4>
                                {!! $item->demografi !!}
                            @endif
                            @if (isset($item->kegiatan))
                                <h4 class="pt-3">Profil Desa</h4>
                                {!! $item->kegiatan !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection