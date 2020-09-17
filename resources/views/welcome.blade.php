@extends('layouts.app')
@section('content')
    <div class="flex h-full bg-gray-500">
        <div class="m-auto mt-24 p-12 border rounded shadow-md bg-white block">
            <form action={{ route('login') }} method="post">
                <div class="p-4 flex">
                    <label for="email" class="px-2">Email</label>
                    <input type="email" name="email" class="w-64 focus:outline-none border-b border-black ml-auto">
                </div>
                <div class="p-4 flex">
                    <label for="password" class="px-2">Password</label>
                    <div class="border-b border-black ml-auto flex">
                        <input type="password" name="password" class="w-56 focus:outline-none">
                        <p class="cursor-pointer eye">show</p>
                    </div>
                </div>
                <div class="flex">
                    <button type="submit" class="button ml-auto">Submit</button>
                </div>
                <div class="flex">
                    <a href={{route('signup')}} class="hover:text-black text-blue-600 trans-color m-auto">Register</a>
                </div>
            </form>
        </div>
    </div>
@endsection
