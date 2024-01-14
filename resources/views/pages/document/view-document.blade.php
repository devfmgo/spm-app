@extends('layouts.app')
@section('title')
@section('content')
    <div class="container">
        <div class="mb-4">
            <div class="mx-auto text-center">
                <label class="bg-indigo-400 text-green-600 font-semibold text-sm text-center shadow-md p-2 rounded-md">
                    {{ $documents->type->name }}
                </label>
                <h3 class="text-center md:text-2xl  text-3xl my-5 font-semibold">

                    {{ $documents->title }}

                </h3>
            </div>


            {{-- Cek dokumen sudah ada apa belum --}}
            {{-- jika ada akan membaca document yang tersedia --}}

            <div id="successView">
                <embed
                    src="{{ Storage::url($documents->type->name . '/' . $documents->file_doc) }}
                #toolbar=0&navpanes=0&scrollbar=0"
                    width="700" height="900" class="m-auto shadow-sm">
            </div>
            {{-- <div id="defaultView">
            <embed src="{{ Storage::url('Default.pdf') }}#toolbar=0&navpanes=0&scrollbar=0" width="800" height="1040"
                class="m-auto shadow-sm">
        </div> --}}
        </div>
    @endsection
    <script type="text/javascript">
        // async function makeRequest() {
        //     try {
        //         const response = await fetch('{{ Storage::url($documents->type->name . '/' . $documents->file_doc) }}');
        //         const show = document.getElementById("successView");
        //         const defaultPage = document.getElementById("defaultView");
        //         console.log(response.status);
        //         show.style.display = "block";
        //         defaultPage.style.display = "none";
        //     } catch (err) {
        //         const show = document.getElementById("successView");
        //         const defaultPage = document.getElementById("defaultView");
        //         show.style.display = "none";
        //         defaultPage.style.display = "block";
        //         console.log(err);
        //     }
        // }

        // makeRequest();
    </script>
