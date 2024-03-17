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
                        </svg>
                        <circle cx="20" cy="4" r="2"
                            fill="{{ $hasNewAlerts ? '#6366F' : 'transparent' }}"
                            class="{{ $hasNewAlerts ? 'animate-ping' : 'hidden' }}"></circle>
                    </a>
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
                <a href="{{ route('redirect') }}"
                    class="text-white hover:text-gray-300 flex flex-col items-center justify-center group relative hover:cursor-pointer transition transform ease-in">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                        class="transition transform group-hover:-translate-y-2 group-hover:scale-90">
                        <path fill="currentColor"
                            d="M9.5 16q-2.725 0-4.612-1.888T3 9.5q0-2.725 1.888-4.612T9.5 3q2.725 0 4.613 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l5.6 5.6q.275.275.275.7t-.275.7q-.275.275-.7.275t-.7-.275l-5.6-5.6q-.75.6-1.725.95T9.5 16m0-2q1.875 0 3.188-1.312T14 9.5q0-1.875-1.312-3.187T9.5 5Q7.625 5 6.313 6.313T5 9.5q0 1.875 1.313 3.188T9.5 14" />
                    </svg>
                    <span
                        class="absolute -bottom-4 opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-1 transition-opacity group-ease-in-out">
                        Search
                    </span>
                </a>
                @if (Auth::check())
                    <a href="{{ route('profile', Auth::id()) }}"
                        class="text-white hover:text-gray-300 flex flex-col items-center justify-center group relative hover:cursor-pointer transition transform ease-in"><svg
                            xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                            class="transition transform group-hover:-translate-y-2 hover:scale-90">
                            <path fill="currentColor"
                                d="M12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12m-8 6v-.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2v.8q0 .825-.587 1.413T18 20H6q-.825 0-1.412-.587T4 18" />
                        </svg><span
                            class="absolute -bottom-4 opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-1 transition-opacity group-ease-in-out">
                            Profile
                        </span>
                    </a>
                    <a href="{{ url('/login.logout') }}"
                        class="text-white hover:text-gray-300 flex flex-col items-center justify-center group relative hover:cursor-pointer transition transform ease-in"><svg
                            xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                            class="transition transform group-hover:-translate-y-2 hover:scale-90">
                            <path fill="currentColor"
                                d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h6q.425 0 .713.288T12 4q0 .425-.288.713T11 5H5v14h6q.425 0 .713.288T12 20q0 .425-.288.713T11 21zm12.175-8H10q-.425 0-.712-.288T9 12q0-.425.288-.712T10 11h7.175L15.3 9.125q-.275-.275-.275-.675t.275-.7q.275-.3.7-.313t.725.288L20.3 11.3q.3.3.3.7t-.3.7l-3.575 3.575q-.3.3-.712.288t-.713-.313q-.275-.3-.262-.712t.287-.688z" />
                        </svg><span
                            class="absolute -bottom-4 opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-1 transition-opacity group-ease-in-out">
                            Logout
                        </span>
                    </a>
                    @if (isset($user))
                        <a href="{{ route('alerts', $user->id) }}"
                            class="text-white hover:text-gray-300 flex flex-col items-center justify-center group relative hover:cursor-pointer transition transform ease-in"><svg
                                xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                class="transition transform group-hover:-translate-y-2 hover:scale-90">
                                <path fill="currentColor"
                                    d="M12 22c1.1 0 2-.9 2-2h-4a2 2 0 0 0 2 2m6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1z" />
                                <circle cx="20" cy="4" r="2"
                                    fill="{{ $hasNewAlerts ? '#6366F' : 'transparent' }}"
                                    class="{{ $hasNewAlerts ? 'animate-ping' : 'hidden' }}"></circle>
                            </svg>
                            <span
                                class="absolute -bottom-4 opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-1 transition-opacity group-ease-in-out">
                                Alerts
                            </span>
                        </a>
                    @endif
                @else
                    <a href="{{ url('/signup') }}"
                        class="text-white hover:text-gray-300 flex flex-col items-center justify-center group relative hover:cursor-pointer transition transform ease-in"><svg
                            xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                            class="transition transform group-hover:-translate-y-2 hover:scale-90">
                            <path fill="currentColor"
                                d="M18 14v-3h-3V9h3V6h2v3h3v2h-3v3zm-9-2q-1.65 0-2.825-1.175T5 8q0-1.65 1.175-2.825T9 4q1.65 0 2.825 1.175T13 8q0 1.65-1.175 2.825T9 12m-8 8v-2.8q0-.85.438-1.562T2.6 14.55q1.55-.775 3.15-1.162T9 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T17 17.2V20z" />
                        </svg>
                        <span
                            class="absolute -bottom-4 opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-1 transition-opacity group-ease-in-out">
                            Signup
                        </span>
                    </a>
                    <a href="{{ url('/login') }}"
                        class="text-white hover:text-gray-300 flex flex-col items-center justify-center group relative hover:cursor-pointer transition transform ease-in"><svg
                            xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                            class="transition transform group-hover:-translate-y-2 hover:scale-90">
                            <path fill="currentColor"
                                d="M13 21q-.425 0-.712-.288T12 20q0-.425.288-.712T13 19h6V5h-6q-.425 0-.712-.288T12 4q0-.425.288-.712T13 3h6q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21zm-1.825-8H4q-.425 0-.712-.288T3 12q0-.425.288-.712T4 11h7.175L9.3 9.125q-.275-.275-.275-.675t.275-.7q.275-.3.7-.313t.725.288L14.3 11.3q.3.3.3.7t-.3.7l-3.575 3.575q-.3.3-.712.288T9.3 16.25q-.275-.3-.262-.712t.287-.688z" />
                        </svg>
                        <span
                            class="absolute -bottom-4 opacity-0 group-hover:opacity-100 transform group-hover:-translate-y-1 transition-opacity group-ease-in-out">
                            Login
                        </span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Menu items for mobile view -->
<div id="menuItems"
    class="absolute z-10 bg-gray-800 p-4 hidden md:hidden transition-transform duration-300 ease-in-out transform -translate-y-full w-full">
    <div>
        <a href="{{ route('redirect') }}"
            class="flex justify-center items-center text-center my-3 text-white hover:text-gray-300"><svg
                xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M9.5 16q-2.725 0-4.612-1.888T3 9.5q0-2.725 1.888-4.612T9.5 3q2.725 0 4.613 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l5.6 5.6q.275.275.275.7t-.275.7q-.275.275-.7.275t-.7-.275l-5.6-5.6q-.75.6-1.725.95T9.5 16m0-2q1.875 0 3.188-1.312T14 9.5q0-1.875-1.312-3.187T9.5 5Q7.625 5 6.313 6.313T5 9.5q0 1.875 1.313 3.188T9.5 14" />
            </svg>
            <span class=" mx-3">
                Search
            </span>
        </a>
        @if (Auth::check())
            <a href="{{ route('profile', Auth::id()) }}"
                class="flex justify-center items-center text-center my-3 text-white hover:text-gray-300"><svg
                    xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12m-8 6v-.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2v.8q0 .825-.587 1.413T18 20H6q-.825 0-1.412-.587T4 18" />
                </svg><span class=" mx-3">
                    Profile
                </span>
            </a>
            <a href="{{ url('/login.logout') }}"
                class="flex justify-center items-center text-center my-3 text-white hover:text-gray-300"><svg
                    xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h6q.425 0 .713.288T12 4q0 .425-.288.713T11 5H5v14h6q.425 0 .713.288T12 20q0 .425-.288.713T11 21zm12.175-8H10q-.425 0-.712-.288T9 12q0-.425.288-.712T10 11h7.175L15.3 9.125q-.275-.275-.275-.675t.275-.7q.275-.3.7-.313t.725.288L20.3 11.3q.3.3.3.7t-.3.7l-3.575 3.575q-.3.3-.712.288t-.713-.313q-.275-.3-.262-.712t.287-.688z" />
                </svg><span class=" mx-3">
                    Logout
                </span>
            </a>
        @else
            <a href="{{ url('/signup') }}"
                class="flex justify-center items-center text-center my-3 text-white hover:text-gray-300"><svg
                    xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M18 14v-3h-3V9h3V6h2v3h3v2h-3v3zm-9-2q-1.65 0-2.825-1.175T5 8q0-1.65 1.175-2.825T9 4q1.65 0 2.825 1.175T13 8q0 1.65-1.175 2.825T9 12m-8 8v-2.8q0-.85.438-1.562T2.6 14.55q1.55-.775 3.15-1.162T9 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T17 17.2V20z" />
                </svg><span class=" mx-3">
                    Signup
                </span>
            </a>
            <a href="{{ url('/login') }}"
                class="flex justify-center items-center text-center my-3 text-white hover:text-gray-300"><svg
                    xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M13 21q-.425 0-.712-.288T12 20q0-.425.288-.712T13 19h6V5h-6q-.425 0-.712-.288T12 4q0-.425.288-.712T13 3h6q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21zm-1.825-8H4q-.425 0-.712-.288T3 12q0-.425.288-.712T4 11h7.175L9.3 9.125q-.275-.275-.275-.675t.275-.7q.275-.3.7-.313t.725.288L14.3 11.3q.3.3.3.7t-.3.7l-3.575 3.575q-.3.3-.712.288T9.3 16.25q-.275-.3-.262-.712t.287-.688z" />
                </svg><span class=" mx-3">
                    Login
                </span>
            </a>
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
