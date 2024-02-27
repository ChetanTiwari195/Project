<div class="bg-gray-800 p-4">
    <div class="container mx-auto">
        <div class="flex items-center justify-between">
            <div class="text-white">
                <a href="{{url('/')}}">
                    <h1 class="text-xl font-bold">{{ config('app.name') }}</h1>
                </a>
            </div>
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{url('/signup')}}" class="text-white hover:text-gray-300">Signup</a>
                <a href="{{ url('/login') }}" class="text-white hover:text-gray-300">Login</a>
            </div>
        </div>
    </div>
</div>
