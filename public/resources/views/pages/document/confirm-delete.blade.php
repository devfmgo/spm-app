@extends('layouts.app')
@section('content')
<div class="m-auto shadow-md bg-white rounded-md p-8 w-1/2">
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-14 text-red-500 m-auto">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
        </svg>
    </div>
    <div class="text-center my-5">
        <h1 class="text-xl font-semibold ">Confirm Delete</h1>
        <p class="my-10"> Yakin data document akan dihapus ?</p>
    </div>

    <form action="{{route('delete',$id)}}" method="post" class="">
        @csrf
        @method('delete')
        <div class="text-center">
            <a href="{{route('data-document','all')}}"
                class="border text-gray-500 p-2 rounded-full font-medium w-32">Cancel</a>
            <button type="submit" class="bg-blue-700 text-white p-2 rounded-full font-medium w-32">Delete</button>

        </div>

    </form>

</div>
@endsection