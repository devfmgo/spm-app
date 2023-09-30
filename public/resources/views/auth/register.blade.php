@extends('layouts.app')
@section('title','SPM| Register New User')
@section('content')


<div class="m-auto w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
    <h1 class="text-center text-2xl font-semibold mb-4">Register New User</h1>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-label for="name" :value="__('Name')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                required />
        </div>
        <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Role User')" />
            <select name="is_admin" id=""
                class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">Choose Role</option>
                <option value="1">Administrator</option>
                <option value="0">User</option>
            </select>
        </div>
        <div class=" mt-4">
            {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a> --}}

            <button type="submit"
                class="bg-blue-500 text-white rounded-md p-2 m-auto text-md font-semibold float-right text-sm">Register
                User</button>
        </div>
    </form>
</div>
@endsection