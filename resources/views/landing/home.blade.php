@extends('layouts.app')
@section('content')
    <div class="maps-wrapper">
        <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63417.30488545914!2d106.54798278643163!3d-6.574375282733329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69d91ff08cb2f7%3A0x80be652481c1ef63!2sLeuwisadeng%2C%20Bogor%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1568799470042!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <div class="search">
            <input type="text" name="keyword" placeholder="Cari desa .." autocomplete="off">
        </div>
        <div class="desa-wrapper">
            <ul>
                @foreach ($desa as $item)
                <li class="bg-success">
                    <a href="{{ url('') }}/desa/{{ $item->slug }}" class="desa">
                        <i class="fa fa-caret-right"></i> &nbsp; {{ $item->desa }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        <style>
            .search-wrapper {
                z-index: 2;
                position: absolute;
                padding: 15px;
                max-height: 290px;
                bottom: 0;
                left: 0;
                right: 0;
                overflow: auto;
                display: flex;
                justify-content: center;
            }
            .search-wrapper .container {
                width: 30%;
                background-color: rgba(255, 255, 255, .8);
                box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
                display: flex;
                justify-content: center;
                align-items: center;
                position: relative;
                border-radius: 3px;
                border: 1px solid rgba(25, 135, 84, 0.2);
            }
            .search-wrapper input {
                width: 90%;
                height: 50px;
                border: 0;
                outline: none;
                background-color: rgba(255, 255, 255, 0);
            }
            .search-wrapper span {
                border: 0;
                width: 10%;
                height: 100%;
                width: 50px;
                position: absolute;
                right: 0;
                top: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                border-left: 1px solid rgba(25, 135, 84, 0.5);
                cursor: pointer;
                transition: .3s;
                color: rgba(25, 135, 84);
            }
            .search-wrapper span:hover {
                background-color: rgba(25, 135, 84, 0.8);
                color: #FFF;
            }
        </style>
        <form action="{{ url('/') }}" method="POST" id="form-search" class="d-flex">
            @csrf
            <div class="search-wrapper">
                <div class="container">
                    <input type="text" name="keyword" placeholder="Cari kategori berita .." autocomplete="off" autofocus="on">
                    <span class="btn-search">
                        <i class="fa fa-search fa-fw"></i>
                    </span>
                </div>
            </div>
        </form>
    </div>
    <div class="content-wrapper">
        <style>
            .btn-selengkapnya:hover {
                box-shadow: 0 1px 5px rgba(0, 0, 0, .3);
            }
        </style>
        <div class="berita bg-success pt-5">
            <div class="berita-wrapper">
                <h4>Berita Terkini</h4> 
                <h5>Kecamatan Leuwisadeng</h5>
                <small>Dapatkan berita & informasi resmi terupdate dan terpercaya seputar Kecamatan Kecamatan Leuwisadeng</small><br>
                <a href="" class="btn btn-sm text-white mt-3 btn-selengkapnya" style="background-color: #146c43">Selengkapnya</a>
            </div>
            <div class="pimpinan mt-5">
                <span class="mb-3">Pimpinan</span>
                <img src="{{ asset('img/pimpinan.jpeg') }}" alt="pimpinan" width="250">
                <small>Drs. Rudy Mulyana</small>
            </div>
        </div>
        @if(!is_null($data->first()))
            <div class="part-berita">
                @foreach ($data as $item)
                    @php
                        $date = $item->tanggal;
                        $pecah = explode('-', $date);
                        $monthNum  = $pecah[1];
                        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                        $monthName = $dateObj->format('F');
    
                        $fullDate = $pecah[0] . ' ' . $monthName . ' ' . $pecah[2];
                    @endphp
                    <div class="card card-berita">
                        <a href="{{ url('') }}/posting/{{ $item->slug }}">
                        <div class="card-body" style="position: relative; display: flex; justify-content: center; align-items: center;">
                            <img src="{{ asset("file_upload/$item->image") }}" alt="gambar berita" style="width: 100%; height: 250px;">
                            <div class="judul">
                                <span>{{ $item->judul }}</span>
                                <small class="text-success mt-3">
                                    <i class="fas fa-calendar-check"></i> &nbsp; 
                                    {{ $fullDate }}
                                </small>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
                <div class="paginate-wrapper">
                    {!! $data->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        @else
        <div class="warning py-3 px-3" role="alert">
            <h5>Tidak ada data untuk kategori "{{ $key }}" !</h5>
        </div>
        @endif
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            // form searching
            $('.btn-search').on('click', function() {
                $('#form-search').submit();
            });

            // function live search desa
            (function searchDesa() {
                $('input[name=keyword]').keyup(function() {
                    var key = $(this).val().toLowerCase();
                    $('.desa').each(function() {
                        var text = $(this).text().toLowerCase();
                        text.includes(key) ? $(this).closest('li').show() : $(this).closest('li').hide();
                    });
                });
            })();
        });
    </script>
@endsection