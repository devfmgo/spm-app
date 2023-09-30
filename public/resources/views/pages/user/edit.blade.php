@extends('layouts.app')
@section('title','SPM| Update User')
@section('content')


<div class="m-auto w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
    <h1 class="text-center text-2xl font-semibold mb-4">Edit User</h1>
    <!-- Validation Errors -->


    <form method="POST" action="{{ route('users.update',$data->id) }}">
        @csrf
        @method('PUT')
        <!-- Name -->
        <div>
            <label for="">Name</label>

            <input id="name" class="block mt-1 w-full rounded-md border-gray-400" type="text" name="name"
                value="{{ $data->name}} {{ old('name') }} " required autofocus />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="">Email Address</label>

            <input id="email" class="block mt-1 w-full rounded-md border-gray-400" type="email" name="email"
                value="{{ $data->email}} {{ old('email') }}" required />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="">Password</label>

            <input id="password" class="block mt-1 w-full rounded-md border-gray-400" type="password" name="password"
                value="{{ $data->password }}" required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="">Confirm Password</label>

            <input id="password_confirmation" class="block mt-1 w-full rounded-md border-gray-400" type="password"
                value="{{ $data->password }}" name="password_confirmation" required />
        </div>
        <div class="mt-4">
            <label for="">Role User</label>
            <select name="is_admin" id=""
                class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">Choose Role</option>
                <option value="1" {{ $data->is_admin===1 ? 'selected':'' }}>Administrator</option>
                <option value="0" {{ $data->is_admin===0 ? 'selected':'' }}>User</option>
            </select>
        </div>
        <div class=" mt-4">

            <button type="submit"
                class="bg-blue-500 text-white rounded-md p-2 m-auto text-md font-semibold float-right text-sm">Udate
                Data
            </button>
        </div>
    </form>
</div>
@endsection