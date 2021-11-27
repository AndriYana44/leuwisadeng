@extends('layouts.app')
@section('content')

<style>
    .card-berita-terkini {
        min-height: 600px;
        max-height: 600px;
        overflow: hidden;
    }
    .konten {
        max-height: 170px;
        max-height: 170px;
        overflow: hidden;
    }
    .judul {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }
    .agenda .agenda-wrapper {
        overflow: auto;
        max-height: 1200px;
    }
    .card_agenda a {
        text-decoration: none;
        color: #555;
        min-height: 250px;
        max-height: 250px;
        overflow: hidden;
    }
    .konten-agenda {
        min-height: 110px;
        max-height: 110px;
        overflow: auto;
    }
</style>

<div class="container mt-4"> 
    <div class="hierarki">
        <h3 style="color: #555">Berita Terkini</h3>
        <small style="color: #999">Beranda / Berita Terkini</small>
    </div>
    <div class="card content mt-3 py-4 mb-5" style="border: 0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="row">
                        @foreach ($data as $item)
                        @php
                            $date = $item->tanggal;
                            $pecah = explode('-', $date);
                            $monthNum  = $pecah[1];
                            $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                            $monthName = $dateObj->format('F');
        
                            $fullDate = $pecah[0] . ' ' . $monthName . ' ' . $pecah[2];
                        @endphp
                        <div class="col-4">
                            <div class="card {{ $loop->iteration > 3 ? 'mt-4' : '' }} card-berita-terkini">
                                <div class="card-body">
                                    <img src="{{ asset("file_upload/$item->image") }}" alt="gambar berita" style="width: 100%; height: 250px; margin-bottom: 15px;">
                                    <small class="mt-3" style="font-size: 12px; color: #999;">
                                        <i class="fas fa-calendar-check"></i> &nbsp; 
                                        {{ $fullDate }}
                                    </small>
                                    <h5 class="text-success judul">{{ strtoupper($item->judul) }}</h5>
                                    <div class="konten">
                                        {!! $item->konten !!}
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ url('') }}/posting/{{ $item->slug }}" class="btn btn-outline-success btn-sm">Detail Berita</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-5 d-flex justify-content-center" style="width: 100%">
                        {!! $data->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="agenda">
                            <div class="card agenda-wrapper">
                                <div class="card-header text-center bg-success text-white">
                                    Agenda
                                </div>
                                <div class="card-body">
                                    @foreach ($agenda as $val)
                                    @php
                                        $date = $val->tanggal;
                                        $pecah = explode('-', $date);
                                        $monthNum  = $pecah[1];
                                        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                                        $monthName = $dateObj->format('F');
                    
                                        $fullDate = $pecah[0] . ' ' . $monthName . ' ' . $pecah[2];
                                    @endphp
                                    <div class="card card_agenda mt-3">
                                        <div class="card-body">
                                            <small style="font-size: 13px;">
                                                <i class="fa fa-calendar-check"></i> &nbsp;
                                                {{ $fullDate }}
                                            </small>
                                            <h4 class="judul text-success">{{ strtoupper($val->judul) }}</h4>
                                            <div class="konten-agenda">
                                                {!! $val->konten !!}
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <form action="{{ url('') }}/posting/agenda/{{ $val->id }}" method="POST">
                                                <button type="submit" class="btn btn-outline-success btn-sm">Detail Agenda</button>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
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
        const card_berita = document.querySelectorAll('.card-berita-terkini');
        const card_agenda = document.querySelectorAll('.card_agenda');
        card_berita.forEach(function(res) {
            const img = res.querySelectorAll('figure.image');
            img.forEach(el => el.remove());
        });
        card_agenda.forEach(function(res) {
            const img = res.querySelectorAll('figure.image');
            img.forEach(el => el.remove());
        });
    </script>
@endsection