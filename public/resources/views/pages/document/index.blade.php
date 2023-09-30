@extends('layouts.app')
@section('title','Dokumen Sistem Penjamin Mutu')
@section('content')
<div class="container">
    <h1 class="md:text-3xl text-2xl sm:text-xl text-center font-bold ">Document Penjamin Mutu SIT Nurul
        Fikri</h1>
    <form action="{{route('index-document')}}" method="get">
        <div
            class="w-full md:flex md:justify-between justify-items-center py-4 px-10 bg-white  shadow-xl rounded-md 0 mt-10">
            <div class="my-4 md:flex-row md:w-72">
                <label for="" class="font-semibold text-gray-700">Choose Unit/Biro</label>
                <select
                    class="block appearance-none  w-full text-sm  bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-300"
                    id="grid-state" name="uid">
                    @foreach ($units as $unit)
                    <option value="{{$unit->id }}" {{$unit->id == request('uid') ? 'selected':''}}>{{$unit->name}}
                    </option>
                    @endforeach

                </select>
            </div>
            <div class="my-4 md:flex-row md:w-72">
                <label for="" class="font-semibold text-gray-700">Choose Type Document</label>
                <select
                    class="block appearance-none  w-full text-sm  bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-teal-300"
                    id="grid-state" name="type">
                    <option value="0" selected>ALL</option>
                    @foreach ($types as $type)
                    <option value="{{$type->id}}" {{$type->id == request('type') ? 'selected':''}}>{{$type->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="my-4 md:flex-row md:w-96">
                <label for="" class="font-semibold text-gray-700">Search</label>
                <input
                    class="appearance-none block w-full text-sm  bg-gray-100 text-gray-700 rounded py-3 px-4 mb-3 border border-gray-200 leading-tight focus:outline-none focus:bg-white focus:border-teal-300 sm:text-sm"
                    id="grid-first-name" type="text" placeholder="Search Name" name="search">
            </div>
            <div class="my-4">
                <button class=" w-full bg-blue-700 p-3  text-white rounded-full md:font-semibold mt-6 text-sm "
                    type="submit">
                    Search Document
                </button>
            </div>

        </div>
    </form>
    {{-- docuemnt section --}}
    <div class="grid grid-cols-1 sm:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-8 w-full mt-14">

        @foreach ($documents as $document)
        <div class="flex flex-col w-full bg-white shadow-lg text-center p-4 hover:translate-y-2 duration-200">
            <div class="flex justify-items-center space-x-1 my-1">
                <span class="bg-gray-200 text-gray-50 p-1 shadow-sm rounded-lg text-xs font-semibold"
                    style="background-color: {{$document->unit->color}}">{{$document->unit->name}}</span>
                <span
                    class="bg-gray-200 text-gray-600 p-1 shadow-sm rounded-lg text-xs font-semibold">{{$document->type->name}}</span>
            </div>
            <div>
                <img src="{{asset('images/pdf.png')}}" class="w-20 h-20 m-auto my-6" alt="">
            </div>
            <h3 class="font-semibold my-4 flex-1">{{$document->title}}</h3>

            <div class=" relative space-x-1 my-10 m-auto mt-2">
                @auth
                <div class="flex justify-center  space-x-2">
                    <a href="{{route('view',$document->slug)}}" class="bg-yellow-300
                    hover:text-gray-500 p-2 rounded-full w-32 shadow-sm font-semibold text-sm ">
                        View
                    </a>

                    <a href="{{route('download',$document->slug)}}"
                        class="bg-blue-200 p-2 rounded-full w-32 font-semibold">
                        Download</a>
                </div>

                @endauth

            </div>

        </div>
        @endforeach

    </div>
    <div class="mt-10 paginate-custom">
        {{$documents->links('pagination::tailwind')}}
    </div>

    @if (count($documents)==0)
    <div class="m-auto text-center w-full mt-20 ">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-16 h-16 text-gray-200 m-auto">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
        </svg>
        <h3 class="text-3xl font-medium text-gray-200"> Data Not Found</h3>
    </div>
    @endif
</div>
</div>

@endsection