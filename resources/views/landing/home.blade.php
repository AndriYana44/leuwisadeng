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
                <a href="{{ url('') }}/berita-terkini" class="btn btn-sm text-white mt-3 btn-selengkapnya" style="background-color: #146c43">Selengkapnya</a>
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

    <style>
        .categori-berita {
            box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;
            width: 100%;
        }
        .categori-berita .container {
            display: flex;
            justify-content: space-between;
        }
        .categori-wrapper {
            min-width: 40%;
            max-width: 40%;
            position: relative;
            min-height: 700px;
            transition: .3s;
            background-color: #FFF;
            padding: 20px 0;
        }
        .categori-wrapper .switch-categori {
            display: flex;
            border-bottom: 2px solid #198754;
            width: 100%;
            overflow-x: auto
        }
        .switch-categori span {
            list-style: none;
            margin: 0;
            padding: 10px 15px;
            cursor: pointer;
            border: 1px solid rgba(0, 0, 0, 0);
            font-size: 14px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            width: max-content;
            white-space: nowrap;
            transition: .3s;
        }
        .switch-categori span.active {
            background-color: #198754;
            color: #FFF;
        }
        .switch-categori span:hover {
            border: 1px solid rgba(0, 0, 0, .1);
        }
        .berita-kategori {
            display: flex;

        }
        .berita-kategori .detail {
            margin-left: 30px;
        }
        .berita-kategori .detail .date-posting {
            color: #ccc;
            font-size: 13px;
            font-weight: bold;
        }
        .berita-kategori .detail h4 {
            color: #198754;
            white-space: nowrap;
            text-overflow: ellipsis;
            width: 250px;
            overflow: hidden;
        }
        .berita-kategori .detail p {
            width: 250px;
            max-height: 70px;
            overflow: hidden;
            white-space: normal;
            text-overflow: ellipsis;
            color: #555;
        }
        .berita-kategori .detail .konten-wrapper {
            min-height: 80px;
            max-height: 80px;
            overflow: hidden;
        }
        .tweet-wrapper {
            max-height: 800px;
            overflow: auto;
        }
        .agenda-wrapper {
            min-width: 25%;
            max-width: 25%;
        }
        .agenda-wrapper .card-agenda-wrapper {
            max-height: 800px;
            overflow: auto;
        }
        .agenda-wrapper .card_agenda .card-body {
            max-height: 200px;
            overflow: hidden;
        }
    </style>

    <div class="categori-berita">
        <div class="container mt-5 py-4">
            <div class="categori-wrapper">
                <div class="switch-categori">
                    @foreach ($kategori as $item)
                        <span class="kategori {{ $loop->iteration == 1 ? 'active' : '' }}" data-target="{{ $item->kategori }}">{{ $item->kategori }}</span>
                    @endforeach
                </div>
                <div class="berita-kategori-wrapper">
                </div>
            </div>
            <div class="tweet-wrapper mt-3">
                <a class="twitter-timeline" data-width="300" data-dnt="true" href="https://twitter.com/bogorkab?ref_src=twsrc%5Etfw">Tweets by bogorkab</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div class="agenda-wrapper mt-3">
                <div class="card card-agenda-wrapper">
                    <div class="card-header text-center bg-success text-white">
                        Agenda
                    </div>
                    <div class="card-body">
                        @if(is_null($agenda->first()))
                            <span>Tidak ada agenda!</span>
                        @endif
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
                                    @csrf
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

@endsection
@section('scripts')
    <script>
        let kategori = `{{ !is_null($kategori->first()) ? $kategori->first()->kategori : null }}`

        kategori != null ? getBerita(kategori) : false;

        function getBerita(kategori) {
            $.get(`{{ url('') }}/getKategoriPosting/${kategori}`, function(res, idx) {
                let i = 1;
                const __null = `<div class="alert alert-warning" role="alert">
                                    Maaf tidak ada data untuk kategori "${kategori}" !
                                </div>`;
                if(res.length < 1) { $('.berita-kategori-wrapper').append(__null).hide().fadeIn(300); }
                res.forEach(res => {
                    if(i <= 3) {
                        let el = `<div class="berita-kategori mt-3">
                                    <img src="{{ asset('') }}file_upload/${res.image}" alt="" style="width: 200px;">
                                    <div class="detail">
                                        <span class="date-posting">Diposting pada ${res.tanggal}</span>
                                        <h4>${res.judul}</h4>
                                        <div class="konten-wrapper">
                                            ${res.konten}
                                        </div>
                                        <a href="{{ url('') }}/posting/${res.slug}" class="btn btn-outline-success btn-sm mt-3 px-3">lihat detail</a>
                                    </div>
                                </div>
                                <hr>`

                        $('.berita-kategori-wrapper').append(el).hide().fadeIn(300);
                        let figure = document.querySelectorAll('figure.image');
                        if(figure != null || figure != undefined) {
                            figure.forEach(res => res.remove())
                        }
                    }

                    if(i == 4) {
                        let btn = `<a href="{{ url('') }}/posting/kategori/${res.kategori.id}" class="btn btn-success" style="width: 100%">Selengkapnya</a>`;
                        $('.berita-kategori-wrapper').append(btn).hide().fadeIn(300);
                    }

                    i++;
                })
            });
        }

        (function addClassActive() {
            const li = document.querySelectorAll('.kategori');
            document.addEventListener('click', function(e) {
                if(e.target.classList.contains('kategori')) {
                    li.forEach(res => res.classList.remove('active'))
                    e.target.classList.add('active');

                    // clear berita kategori
                    document.querySelector('.berita-kategori-wrapper').innerHTML = "";
                    
                    let data_target = e.target.getAttribute('data-target');
                    getBerita(data_target);
                }
            });
        })();

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