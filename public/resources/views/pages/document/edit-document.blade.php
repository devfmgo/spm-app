@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="text-center font-semibold text-gray-700 md:text-3xl sm:text-xl my-5">Edit Document</h3>
    <div class="md:w-96 shadow-xl p-5 m-auto ">
        <form action="{{route('update-document',$document->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="my-1">
                <label for="" class="font-semibold text-gray-700 text-sm">Judul Dokumen</label>
                <input
                    class="appearance-none  w-full  bg-gray-100 text-gray-700 rounded py-3 px-4 mb-3 border border-gray-200 leading-tight focus:outline-none focus:bg-white focus:border-teal-300 sm:text-sm"
                    id="grid-first-name" type="text" name="title" value="{{$document->title}}">
            </div>

            <div class="my-1">
                <label for="" class="font-semibold text-gray-700 text-sm">Choose Unit/Biro</label>
                <select
                    class=" appearance-none  w-full text-sm  bg-gray-100 border mb-3 border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-300"
                    id="grid-state" name="unit_id">
                    @foreach ($units as $unit)
                    <option value="{{$unit->id}}" {{$document->unit_id == $unit->id ?'selected':''}}>{{$unit->name}}
                    </option>
                    @endforeach

                </select>
            </div>

            <div class="my-1">
                <label for="" class="font-semibold text-gray-700 text-sm">Choose Type Document</label>
                <select
                    class="block appearance-none  w-full  bg-gray-100 border border-gray-200 mb-3 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-teal-300 text-sm"
                    id="grid-state" name="type_id">
                    <option value="">Choose Type</option>
                    @foreach ($types as $type)
                    <option value="{{$type->id}}" {{$document->type_id == $type->id ?'selected':''}}>{{$type->name}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="my-1">
                <label for="" class="font-semibold text-gray-700 text-sm">Upload Document</label>
                <input type="file" name="file" id=""
                    class="block appearance-none  w-full  bg-gray-100 border border-gray-200 mb-3 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-teal-300 text-sm">
            </div>
            <div class="my-1">
                <button type="submit"
                    class="w-full text-sm bg-blue-600 p-3 rounded-md block font-semibold text-white m-auto">Update
                    Document</button>
            </div>
        </form>
    </div>
</div>
@endsection