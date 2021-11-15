@extends('layouts.app')
@section('content')
    <div class="maps-wrapper">
        <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63417.59056579607!2d106.56034514084342!3d-6.5721354008838215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69d91ff08cb2f7%3A0xfa01eb4292bcc8e0!2sLeuwisadeng%2C%20Bogor%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1636986640473!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <div class="search">
            <input type="text" name="keyword" placeholder="Cari desa .." autocomplete="off" autofocus>
        </div>
        <div class="desa-wrapper">
            <ul>
                <li class="bg-success"><a href="" class="desa"><i class="fa fa-caret-right"></i> Desa Wangun Jaya</a></li>
                <li class="bg-success"><a href="" class="desa"><i class="fa fa-caret-right"></i> Desa Leuwisadeng</a></li>
                <li class="bg-success"><a href="" class="desa"><i class="fa fa-caret-right"></i> Desa Sibanteng</a></li>
                <li class="bg-success"><a href="" class="desa"><i class="fa fa-caret-right"></i> Desa Kalong Satu</a></li>
                <li class="bg-success"><a href="" class="desa"><i class="fa fa-caret-right"></i> Desa Sadeng Kolot</a></li>
                <li class="bg-success"><a href="" class="desa"><i class="fa fa-caret-right"></i> Desa Babakan Sadeng</a></li>
                <li class="bg-success"><a href="" class="desa"><i class="fa fa-caret-right"></i> Desa Sadeng</a></li>
                <li class="bg-success"><a href="" class="desa"><i class="fa fa-caret-right"></i> Desa Kalong Dua</a></li>
            </ul>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="berita bg-success pt-5">
            <h4>Berita Terkini</h4> 
            <h5>Kecamatan Leuwisadeng</h5>
            <small>Dapatkan berita & informasi resmi terupdate dan terpercaya seputar Kecamatan Kecamatan Leuwisadeng</small><br>
            <a href="" class="btn btn-sm text-white mt-3" style="background-color: #146c43">Selengkapnya</a>
            <div class="pimpinan mt-5">
                <span class="mb-3">Pimpinan</span>
                <img src="{{ asset('img/pimpinan.jpeg') }}" alt="pimpinan" width="250">
                <small>Drs. Rudy Mulyana</small>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            // function live search desa
            (function searchDesa() {
                $('input[name=keyword]').keydown(function() {
                    var key = $(this).val();
                    $('.desa').each(function() {
                        if($(this).text().toLowerCase().includes(key.toLowerCase())) {
                            $(this).closest('li').show();
                        }else{
                            $(this).closest('li').hide();
                        }
                    });
                });
            })();


        });
    </script>
@endsection