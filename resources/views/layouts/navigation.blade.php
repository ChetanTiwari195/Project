<div class="relative z-20 bg-gray-800 p-4">
    <div class="container mx-auto">
        <div class="flex items-center justify-between">
            <div class="text-white">
                @if (Auth::check())
                    <a href="{{ url('/home_profile') }}">
                        <h1 class="text-xl font-bold">{{ config('app.name') }}</h1>
                    </a>
                @else
                    <a href="{{ url('/') }}">
                        <h1 class="text-xl font-bold">{{ config('app.name') }}</h1>
                    </a>
                @endif
            </div>
            <div class="md:hidden flex ">
                <!-- Hamburger menu button -->
                @if (isset($user))
                    <a href="{{ route('alerts', $user->id) }}"
                        class=" px-3 block text-center text-white hover:text-gray-300"><svg
                            xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 22c1.1 0 2-.9 2-2h-4a2 2 0 0 0 2 2m6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1z" />
                        </svg></a>
                @endif

                <button id="menuButton" class="text-white hover:text-gray-300 focus:outline-none">
                    <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

            </div>
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('redirect') }}" class="text-white hover:text-gray-300">Search</a>
                @if (Auth::check())
                    <a href="{{ route('profile', Auth::id()) }}" class="text-white hover:text-gray-300">Profile</a>
                    <a href="{{ url('/login.logout') }}" class="text-white hover:text-gray-300">Logout</a>
                    @if (isset($user))
                        <a href="{{ route('alerts', $user->id) }}"
                            class="block text-center text-white hover:text-gray-300">Notifications</a>
                    @endif
                @else
                    <a href="{{ url('/signup') }}" class="text-white hover:text-gray-300">Signup</a>
                    <a href="{{ url('/login') }}" class="text-white hover:text-gray-300">Login</a>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Menu items for mobile view -->
<div id="menuItems"
    class="absolute z-10 bg-gray-800 p-4 hidden md:hidden transition-transform duration-300 ease-in-out transform -translate-y-full w-full">
    <div>
        <a href="{{ route('redirect') }}" class="block text-center text-white hover:text-gray-300">Search</a>
        @if (Auth::check())
            <a href="{{ route('profile', Auth::id()) }}"
                class="block text-center text-white hover:text-gray-300">Profile</a>
            <a href="{{ url('/login.logout') }}" class="block text-center text-white hover:text-gray-300">Logout</a>
        @else
            <a href="{{ url('/signup') }}" class="block text-center text-white hover:text-gray-300">Signup</a>
            <a href="{{ url('/login') }}" class="block text-center text-white hover:text-gray-300">Login</a>
        @endif
    </div>
</div>


<script>
    document.getElementById('menuButton').addEventListener('click', function() {
        var menuItems = document.getElementById('menuItems');
        var menuButton = document.getElementById('menuButton');
        if (menuItems.classList.contains('hidden')) {
            menuItems.classList.remove('hidden');
            menuItems.classList.remove(
                '-translate-y-full'); // Remove the translation effect when showing the menu
            menuButton.innerHTML =
                '<svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
        } else {
            menuItems.classList.add('-translate-y-full'); // Add the translation effect when hiding the menu
            setTimeout(function() {
                menuItems.classList.add('hidden');
            }, 300); // Wait for the transition to complete before hiding the menu
            menuButton.innerHTML =
                '<svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>';
        }
    });
</script>
