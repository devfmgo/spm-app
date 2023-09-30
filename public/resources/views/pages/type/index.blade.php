@extends('layouts.app')
@section('content')
<div class="w-full xl:w-11/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
        <div class="rounded-t mb-0 px-4 py-3 border-0">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                    <h3 class="font-bold text-blue-700 text-xl">Data Tipe Document</h3>
                </div>
                {{-- <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                    <a href="{{route('create-unit')}}"
                        class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button">Add New Unit</a>
                </div> --}}
            </div>
        </div>

        <div class="block w-full overflow-x-auto">
            <table class="items-center bg-transparent w-full border-collapse ">
                <thead>
                    <tr>
                        <th
                            class="px-6 bg-gray-100 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left w-20">
                            #
                        </th>
                        <th
                            class="px-6 bg-gray-100 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Type Document
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($types as $type)
                    <tr>
                        <th
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                            {{$loop->iteration}}
                        </th>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                            {{$type->name}}
                        </td>

                    </tr>
                    @endforeach


                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection