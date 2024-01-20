@extends('layouts.app')
@section('title', 'SPM | Users Account')
@section('content')
    <form method="post" action="/importdata" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="m-auto shadow-md bg-white rounded-md p-8 w-1/2">
            <h1 class="text-xl font-bold my-4 text-center">Import Data User</h1>
            <label class="my-5 font-bold">Pilih file excel</label>
            <div class="flex items-center">
                <div class="form-group">
                    <input type="file" name="file" required="required">
                </div>
                <div>
                    <button type="submit"
                        class="bg-green-500 text-white active:bg-green-600 text-xs font-bold uppercase px-3 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Import</button>
                    <a href="{{ route('user.formatimport') }}"
                        class="bg-blue-500 text-white active:bg-blue-600 text-xs font-bold uppercase px-3 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Download
                        Format Import</a>
                </div>

            </div>
            <span class="text-xs text-gray-400 my-4">*Isi data pada line kedua</span>
        </div>

    </form>
@endsection
