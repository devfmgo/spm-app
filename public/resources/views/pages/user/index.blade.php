@extends('layouts.app')
@section('title','SPM | Users Account')
@section('content')
<div class="w-full xl:w-11/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
        <div class="rounded-t mb-0 px-4 py-3 border-0">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                    <h3 class="font-bold text-gray-700 text-3xl p-2">Data User Account</h3>
                    <div><a href="{{ route('users') }}"
                            class="text-sm font-semibold text-gray-500  {{ Request::path() =='users' ? 'text-indigo-500':'' }}">All</a>
                        |
                        <a href="{{ route('users.trash') }}" for="" class="text-sm font-semibold
                            text-gray-500 {{ Request::path() =='user/trash' ? 'text-indigo-500':'' }}">Delete ({{
                            $delete }})</a>
                    </div>

                </div>
                <div class=" relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                    <a href="/register"
                        class="bg-blue-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button">Add New Account</a>
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
                            Name
                        </th>
                        <th
                            class="px-6 bg-gray-100 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Email
                        </th>
                        <th
                            class="px-6 bg-gray-100 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Role
                        </th>

                        <th
                            class="px-6 bg-gray-100 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Action
                        </th>

                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)

                    <tr>

                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4 ">
                            {{$loop->iteration}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4 ">
                            {{$user->name}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4 ">
                            {{$user->email}}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4 ">

                            @if ($user->is_admin)
                            <div
                                class=" text-gray-600 bg-green-300 text-xs p-2 rounded-full font-semibold w-28 text-center">
                                Administrator</div>
                            @else
                            <div
                                class=" text-gray-600 bg-indigo-300 text-xs p-2 rounded-full font-semibold w-28 text-center">
                                User
                            </div>
                            @endif
                        </td>

                        <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                            <div class="flex space-x-1">
                                @if ($user->deleted_at === null)

                                <a href="{{ route('users.edit',$user->id) }}"
                                    class="flex text-gray-600 bg-yellow-300 p-2 rounded-full"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 font-semibold">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{route('users.destroy',$user->id)}}" method="post"
                                    onsubmit="return confirm('Are you sure for delete data ?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="flex text-gray-600 bg-red-400 p-2 rounded-full"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 font-semibold">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>Delete</button>
                                </form>


                                @else
                                <a href="{{ route('users.restore',$user->id) }}" alt="Restore Data"
                                    class="md:flex space-x-1 items-center text-gray-100 bg-green-500 p-2 rounded-full text-center text-xs sm:block hover:bg-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                    <span>Restore</span>

                                </a>
                                <a href="{{ route('users.empty',$user->id) }}"
                                    class="md:flex space-x-1 items-center text-gray-100 bg-red-500 p-2 rounded-full text-center text-xs sm:block hover:bg-red-600">Permanent
                                    Delete</a>
                                @endif


                            </div>

                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-2xl h-20  text-gray-400">
                            Data Not Found
                        </td>
                    </tr>

                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
    {{$users->links()}}
</div>
@endsection