@extends('layouts.app')
@section('title','SPM | Database Document')
@section('content')
<div class="w-full xl:w-full mb-12 xl:mb-0 px-4 mx-auto mt-24">
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
        <div class="rounded-t mb-0 px-4 py-3 border-0">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                    <h3 class="font-bold text-gray-700 text-3xl p-2">Document Sistem Penjamin Mutu</h3>

                    <div class=" flex p-3 items-center w-full">
                        <button id="dropdownBgHoverButton" data-dropdown-toggle="dropdownBgHover"
                            class="p-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">Filter by Unit/Biro <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownBgHover" class="hidden z-10 w-48 bg-white rounded shadow dark:bg-gray-700 ">
                            <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownBgHoverButton">
                                @foreach($unit as $item)
                                <li>
                                    <div
                                        class=" w-full filter flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="{{$item->id}}" type="checkbox" value="{{$item->id}}" name="filter"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="{{$item->id}}"
                                            class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{$item->name}}</label>
                                    </div>
                                </li>
                                @endforeach
                                <li class="w-full my-3 p-2 bg-blue-500 text-gray-100 d-block rounded-lg text-center">
                                    <button href="" class="" onclick="getValue()">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                                            </svg>
                                            Filter
                                        </div>

                                    </button>
                                </li>
                            </ul>
                        </div>

                        <a href="{{route('data-document','all')}}"
                            class="ml-2 text-sm mx-1 {{$request === 'all' ? 'text-indigo-500' :''}}">All</a>
                        | <a href="{{route('data-document','delete')}}"
                            class="text-sm mx-1 {{$request === 'delete'? 'text-indigo-500' :''}}">File Delete <span
                                class="text-gray-700 font-semibold">({{$softDelete}})</span>

                    </div>
                </div>
                <div class=" relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                    <a href="{{route('add-document')}}"
                        class="bg-blue-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button">Add New Document</a>

                    <form action="{{route('search-document')}}" method="get" class="mt-8">
                        <div class="flex justify-end my-1">
                            <input type="search" id="search-dropdown" name="find"
                                class="mr-1 rounded-lg w-1/2 text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                placeholder="Search Judul Documents...." autocomplete="off">
                            <button type="submit" class="text-sm space-x-1 font-semibold text-indigo-100"><svg
                                    class="w-6 h-6 text-indigo-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg></button>

                        </div>
                    </form>

                    <div class="text-xs text-gray-400 mr-10">Hasil Pencarian : {{$result ? $result :'0'}} data</div>
                </div>
            </div>
        </div>

        <div class="block w-full overflow-x-auto">
            <table class="items-center bg-transparent w-full border-collapse ">
                <thead>
                    <tr>
                        <th
                            class="px-6 bg-gray-100 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            #
                        </th>
                        <th
                            class="px-6 bg-gray-100 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Unit/Biro
                        </th>
                        <th
                            class="px-6 bg-gray-100 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Jenis Document
                        </th>
                        <th
                            class="px-6 bg-gray-100 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Judul Dokumen
                        </th>

                        <th
                            class="px-6 bg-gray-100 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Action
                        </th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($documents as $document)

                    <tr class="bg-white border-b ">

                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-2 ">
                            {{$loop->iteration}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-gray-50 font-semibold whitespace-nowrap p-2 text-center opacity-5"
                            style="background-color:{!!$document->unit->color!!};">
                            {{$document->unit->name}}
                        </td>
                        <td class=" border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-2 ">
                            {{$document->type->name}}
                        </td>
                        <td class=" border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-2 ">
                            {{$document->title}}
                        </td>

                        <td class=" border-t-0 px-6 align-center border-l-0 border-r-0 text-sm whitespace-nowrap p-2">
                            @if ($document->deleted_at == null)
                            <div class="md:flex space-x-2">
                                <a href="{{route('edit-document',$document->id)}}"
                                    class="flex text-gray-600 bg-yellow-300 p-2 rounded-full"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 font-semibold">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    Edit
                                </a>
                                <a href="{{route('confirm-delete',$document->id)}}"
                                    class="flex text-gray-600 bg-red-400 p-2 rounded-full"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 font-semibold">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg> Delete
                                </a>
                                <a href=" {{Storage::url($document->type->name.'/'.$document->file_doc)}}"
                                    class="items-center flex text-gray-600 bg-indigo-300 p-2 rounded-full"
                                    target="_blank"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-4 h-4 font-semibold">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                    Read</a>

                            </div>
                            @else
                            <div class="flex space-x-1">

                                <a href="{{route('resdel',['restore',$document->id])}}" alt="Restore Data"
                                    class="md:flex space-x-1 items-center text-gray-100 bg-green-500 p-2 rounded-full text-center text-xs sm:block hover:bg-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                    <span>Restore</span>
                                </a>
                                <a href="{{route('permanent-delete',$document->id)}}"
                                    class="md:flex items-center bg-red-500 text-gray-100 p-2 rounded-full text-center  sm:block hover:bg-red-600 text-xs"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg> Delete Permanent</a>
                            </div>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
    {{$documents->links()}}
</div>
@endsection

<script>
    function getValue() {
        var checkboxes =
            document.getElementsByName('filter');

        var result = [];

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                result.push(checkboxes[i].value);
            }
        }
        let id = result;
        window.location.replace(`http://spm-app.test/data-document/filter/${result}`);
    }
</script>