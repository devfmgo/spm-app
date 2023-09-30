@extends('layouts.app')
@section('title','Beranda | SPM')
@section('content')
<div class="w-full">
    {{-- profile tim --}}
    <div class="md:flex mt-10 p-10 my-40">
        <div class="w-full">
            <div class="mb-4"> <span class="text-green-600 font-semibold text-sm">Profile Tim</span>
                <h1 class="font-bold text-2xl sm:text3xl md:text-5xl text-gray-800">Penjaminan Mutu <br /><span
                        class="text-blue-600">SIT Nurul Fikri</span>
                </h1>
            </div>
            <p class="text-justify md:mr-8">
                Merupakan salah satu tim yang mengemban tugas memastikan proses pelaksanaan
                pendidikan di lingkungan internal sekolah berjalan sebagaimana mestinya berdasarkan standar yang telah
                ditetapkan.
                Monitoring dan evaluasi dilakukan dalam bentuk Audit Mutu Internal (AMI) sesuai prosedur, yang
                pelaksanaannya rutin setian tahun 6 bulan sekali. Tujuannya memastikan apakah terdapat kesesuaian antara
                realisasi yang dicapai dengan target yang telah ditetapkan pada awal tahun.
                Dalam pelaksanaan tugasnya,Tim Penjamin Mutu SIT NF mengacu pada SIKLUS
                “Plan-Organizing-Actuating-Controlling (POAC)”. Selain itu, kegiatan perencanaan, penerapan,
                pengendalian
                dan pengembangan standar mutu pendidikan secara konsisten dan berkelanjutan bertujuan memberikan
                kepuasan
                layanan pada stakeholders baik internal maupun eksternal.
            </p>
        </div>
        <div class="w-full mb-16 lg:mb-0 lg:max-w-lg lg:pr-5 ">
            <img src="{{asset('images/profile.svg')}}" alt="" class="w-full h-auto mt-6">
        </div>
    </div>
    <hr>
    {{-- sistem penjamin mutu internal --}}
    <div class="md:flex mt-10 p-10 my-12">
        <div class="w-full md:mt-32">
            <div class="mb-4"> <span class="text-green-600 font-semibold text-sm">Penjaminan Mutu</span>
                <h1 class="font-bold text-xl sm:text2xl md:text-3xl text-gray-800">Sistem Penjaminan Mutu Internal
                </h1>
            </div>
            <p class="text-justify text-sm md:mr-8">
                Merupakan suatu kesatuan unsur yang terdiri atas kebijakan dan proses yang terkait untuk melakukan
                penjaminan mutu pendidikan yang dilaksanakan oleh setiap bagian (biro dan unit sekolah).
            </p>
        </div>
        <div class="w-full mb-16 lg:mb-0 lg:max-w-lg lg:pr-5 ">
            <img src="{{asset('images/mutu-internal.svg')}}" alt="" class="w-full h-auto mt-6">
        </div>
    </div>
    <hr>
    {{-- audit penjamin mutu --}}
    <div class="md:flex mt-10 p-10 my-12">
        <div class="w-full mb-16 lg:mb-0 lg:max-w-lg lg:pr-5 ">
            <img src="{{asset('images/audit.svg')}}" alt="" class="w-full h-auto mt-6">
        </div>
        <div class="full md:mt-32">
            <div class="mb-4 ">
                <span class="text-green-600 font-semibold text-sm">Penjaminan Mutu</span>
                <h1 class="font-bold text-xl sm:text2xl md:text-3xl text-gray-800">Audit Penjaminan Mutu
                </h1>
            </div>
            <p class="text-justify text-sm md:mr-8">
                Audit Mutu Internal merupakan proses pemeriksaan yang sistematis, terencana, independen, dan
                terdokumentasi untuk memastikan pelaksanaan kegiatan di SIT NF sesuai prosedur dan hasilnya telah sesuai
                dengan standar untuk mencapai tujuan yang ditetapkan
            </p>
        </div>

    </div>
    <hr>
    {{-- struktur penjamin mutu --}}
    <div class="w-full mt-10 p-10 my-12 mx-auto">
        <div class="mb-4 text-center mt-32">
            <span class="text-green-600 font-semibold text-sm">Struktur</span>
            <h1 class="font-bold text-xl sm:text2xl md:text-3xl text-gray-800">Struktur Penjamin Mutu
            </h1>
        </div>
        <div class="mt-20">
            <img src="{{asset('images/struktur.png')}}" alt="" class="mx-auto h-96 w-auto">
        </div>
    </div>
    {{-- Skilus Penjamin mutu --}}
    <div class="w-full mt-10 p-10 my-12 mx-auto">
        <div class="mb-4 text-center">
            <span class="text-green-600 font-semibold text-sm">Struktur</span>
            <h1 class="font-bold text-xl sm:text2xl md:text-3xl text-gray-800">Siklus Penjamin Mutu
            </h1>
        </div>
        <div class="mt-20">
            <img src="{{asset('images/siklus-penjamin-mutu.png')}}" alt="" class="mx-auto h-96 w-auto">
        </div>
    </div>

    <div class="w-full mt-32 p-10 my-12">
        <div>
            <h1 class="font-bold text-xl sm:text3xl md:text-5xl text-gray-800">
                Tugas, Indikator Kinerja Dan <br><span class="text-blue-600">
                    Kewenangan Penjamin Mutu
                </span>
            </h1>
        </div>
        {{-- tugas spm --}}
        <div class="md:flex md:flex-row-reverse justify-between align-center">

            <div class="sm:my10">
                <img src="{{asset('images/tugas.svg')}}" style="width:550px;" class="" alt="">
            </div>
            <div class="md:mt-32">
                <h2 class="text-xl sm:text2xl md:text-3xl font-semibold  my-5 text-gray-700">
                    Tugas</h2>
                <ul class="mb-5 list-disc marker:text-green-400">
                    <li>Membuat sistem penjaminan mutu bidang sesuai arah kebijakan yayasan</li>
                    <li>Melakukan sosialisasi sistem mutu bidang sesuai prosedur yang berlaku</li>
                    <li>Melaksanakan manajemen (POAC) proses Penjaminan Mutu di bidang lainya, sesuai prosedur yang
                        berlaku
                    </li>
                    <li>Membuat sistem penjaminan mutu bidang SDMO sesuai arah kebijakan yayasan</li>
                    <li>Menyusun rencana kegiatan penjaminan mutu Bidang/Direktorat SDMO sesuai dengan arahan dari
                        atasan
                    </li>
                    <li>Melaksanakan dan mengkoordinasikan kegiatan proses penjaminan mutu bidang sesuai dengan prosedur
                        yang berlaku.</li>

                    <li>Membuat laporan proses kegiatan sistem penjaminan mutu kepada atasan sesuai dengan prosedur yang
                        berlaku.</li>
                    <li>Melakukan evaluasi pelaksanaan berbagai kegiatan penjaminan mutu sesuai dengan prosedur yang
                        berlaku
                    </li>
                    <li>Menyusun rekomendasi perbaikan berdasarkan hasil evaluasi proses kegiatan sistem penjaminan mutu
                        sesuai dengan ketentuan yang berlaku</li>
                    <li>Memastikan ketersediaan dokumen mutu bidang sesuai dengan ketentuan yang berlaku</li>
                    <li>Melaksanakan audit dan pengendalian sistem mutu SDMO sesuai dengan prosedur yang berlaku.</li>
                </ul>
            </div>
        </div>
        {{-- indikator kerja --}}
        <div class="w-full mt-30 py-10 my-12">
            <div class="md:flex justify-between align-center">
                <div>
                    <img src="{{asset('images/indikator.svg')}}" style="width:500px;" class="" alt="">
                </div>
                <div class="mt-32">
                    <h2 class="text-xl sm:text2xl md:text-3xl font-semibold  my-5 text-gray-700">
                        Inidikator
                        Kerja</h2>
                    <ul class="list-disc marker:text-green-400">
                        <li>Tersusunnya berbagai standar mutu</li>
                        <li>Tersusunnya instrumen monitoring dan evaluasi</li>
                        <li>Terlaksananya monitoring dan evaluasi pelaksanaan penjaminan mutu disetiap unit sekolah</li>
                        <li>Terkoordinasi persiapan dan pelaksanaan akreditasi, sertifikasi dan legalitas disetiap unit
                            sekolah</li>
                        <li>Terlaksananya siklus mutu dan peningkatan standar mutu pendidikan di tingkat unit sekolah
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        {{-- Kewenangan --}}
        <div class="w-full mt-30 py-10 my-12">
            <div class="md:flex md:flex-row-reverse justify-between align-center">
                <div>
                    <img src="{{asset('images/kewenangan.svg')}}" style="width:500px;" class="" alt="">
                </div>
                <div class="mt-32">
                    <h2 class="text-xl sm:text2xl md:text-3xl font-semibold  my-5 text-gray-700 ">
                        Kewenangan
                    </h2>
                    <ul class="list-disc marker:text-green-400">
                        <li>Mengorganisasikan kegiatan penjaminan mutu baik internal bidang/direktorat maupun lintas
                            bagian
                        </li>
                        <li>Memberikan penilaian hasil evaluasi dan audit sistem penjaminan mutu, serta merekomendasikan
                            kepada atasan</li>
                        <li>Menandatangani dokumen sistem penjaminan mutu</li>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection