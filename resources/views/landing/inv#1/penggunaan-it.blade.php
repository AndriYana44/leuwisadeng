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
        padding: 20px 0;
    }
    .content {
        box-shadow: rgba(0, 0, 0, 0.2) 0px 60px 40px -7px;
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
<div class="hierarki">
    <div class="container">
        <h3 style="color: #555">Penggunaan IT Madurasa</h3>
        <small style="color: #555">Beranda / Penggunaan IT Madurasa</small>
    </div>
</div>
<div class="container mt-4">
    <div class="card content mt-3 py-4 mb-5" style="border: none">
        <div class="card-body" style="color: #555">
            <div class="row">
                <div class="col-8 px-5 left">
                    <h5 class="mb-4">INOVASI MADURASA LEUWISADENG</h5>
                    <img class="py-4" src="{{ asset('img/inv1/penggunaan-it.png') }}" alt="">
                    <p style="text-align: justify">MADURASA ( Makan Durian sepuasnya ) di tempat wisata merupakan Inovasi Pemerintah Kecamatan Leuwisadeng Tahun 2020 yang bertujuan untuk meningkatkan daya saing Sektor Pariwisata dan meningkatkan perekonomian masyarakat yang ada di wilayah Kecamatan Leuwisadeng khususnya dan wilayah Bogor Barat pada umumnya. Untuk kegiatan Publikasi atau Promosi Program Inovasi Madurasa ini dilakukan melalui Media Cetak dan Media Sosial ( WhatsAp, Facebook, Instagram dan You Tube )</p>
                </div>
                <div class="col-4 right">
                    <div class="agenda">
                        <a href="" class="btn btn-success">
                            <span class="text-white" style="font-size: 19px">Agenda Kegiatan</span>
                            <span>Selengkapnya</span>
                        </a>
                    </div>
                    <div class="lampiran">
                        <span><b>Download File Lampiran</b></span>
                        <a href="{{ url('inv1/penggunaan-it/download') }}"><i class="fa fa-download"></i> Penggunaan IT.docx</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection