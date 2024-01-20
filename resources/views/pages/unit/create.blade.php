@extends('layouts.app')
@section('title', 'SPM App | Create Unit')
@section('content')
    <div class="container">
        <h3 class="text-center font-semibold text-gray-700 md:text-3xl sm:text-xl my-5">Add New Unit</h3>
        <div class="md:w-96 shadow-xl p-5 m-auto ">
            <form action="{{ route('save-unit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="my-1">
                    <label for="" class="font-semibold text-gray-700 text-sm">Nama Unit/Biro</label>
                    <input
                        class="appearance-none  w-full  bg-gray-100 text-gray-700 rounded py-3 px-4 mb-3 border border-gray-200 leading-tight focus:outline-none focus:bg-white focus:border-teal-300 sm:text-sm"
                        id="grid-first-name" type="text" name="name">
                </div>
                <div class="my-1">
                    <label for="" class="font-semibold text-gray-700 text-sm">Input Warna</label>
                    <div class="flex items-center space-x-1">
                        <input type="text" name="color" id="warna"
                            class="appearance-none  w-full  bg-gray-100 text-gray-700 rounded py-3 px-4 mb-3 border border-gray-200 leading-tight focus:outline-none focus:bg-white focus:border-teal-300 sm:text-sm">
                        <i id="panelWarna" class="p-2 h-5 mb-3 w-5 rounded"></i>
                    </div>
                    <span class="text-sm mb-1 flex items-center">Klik icon referensi warna <a
                            href="https://flatuicolors.com/" class="text-blue-500 p-2" target="_blank"><svg fill="none"
                                stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                class="w-6 bg-indigo-500 text-white rounded shadow-sm">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z">
                                </path>
                            </svg></a> </span>
                </div>

                <div class="my-1">
                    <button type="submit"
                        class="w-full text-sm bg-blue-600 p-3 rounded-md block font-semibold text-white m-auto">Save
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
