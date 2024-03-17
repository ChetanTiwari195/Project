@extends('layouts.structure')

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 lg:pt-6 lg:pb-2 lg:px-8 sm:py-12">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company">
            <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create your account</h2>
        </div>

        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="mt-4 space-y-6" action="{{ url('/signup.create') }}" method="POST">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">UserName</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" required
                            class="block w-full rounded-md border-0 px-3 py-1.5 mb-4 mt-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="Enter Your Name">
                    </div>
                    @error('name')
                        <div class="text-red-700 px-4 py-3 relative 1 font-normal">
                            <span class="block">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="email-adderess" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                            class="block w-full rounded-md border-0 px-3 py-1.5 mb-4 mt-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="Email address">
                    </div>
                    @error('email')
                        <div class="text-red-700 px-4 py-3 relative 1 font-normal">
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
                        <div class="text-red-700 px-4 py-3 relative 1 font-normal">
                            <span class="block">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="password-confirm" class="block text-sm font-medium leading-6 text-gray-900">Confirm
                        Password</label>
                    <div class="mt-2">
                        <input id="password-confirm" name="password_confirmation" type="password" required
                            class="block w-full rounded-md border-0 px-3 py-1.5 mb-4 mt-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="Confirm Password">
                    </div>
                    @error('password_confirmation')
                        <div class="text-red-700 px-4 py-3 relative 1 font-normal">
                            <span class="block">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div>
                    <p class="text-sm text-gray-600">Already have an account? <a href="{{ url('/login') }}"
                            class="text-indigo-600 hover:text-indigo-500">Log in</a></p>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                        in</button>
                </div>
            </form>
        </div>
    </div>
@endsection
