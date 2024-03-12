@extends('layouts.structure')

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 pt-20">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            @if (session()->has('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    {{ session('status') }}
                </div>
            @endif
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company">
            <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Log in to your account</h2>
        </div>

        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="mt-4 space-y-6" action="{{ url('/login')}}" method="POST">
                @csrf
                <div>
                    <label for="email-adderess" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                            class="block w-full rounded-md border-0 px-3 py-1.5 mb-4 mt-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="Email address">
                    </div>
                    @error('email')
                            <div class="text-red-700 px-4 py-3 relative">
                                <span class="block">{{ $message }}</span>
                            </div>
                        @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot
                                password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full rounded-md border-0 px-3 py-1.5 mb-4 mt-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="Password">
                    </div>
                    @error('password')
                        <div class="text-red-700 px-4 py-3 relative antialiased font-normal">
                            <span class="block">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log in</button>
                </div>
            </form>
        </div>
    </div>
@endsection
