<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="relative min-h-screen flex" x-data="{ open: true }">
           <!-- Sidebar -->
<aside :class="open ? 'w-64' : 'w-0 md:w-0'" class="bg-blue-800 text-blue-100 transform transition-all duration-300 ease-in-out shadow-lg relative overflow-hidden">
<!-- Sidebar Content -->
<div x-show="open" x-transition.opacity.delay.200ms class="absolute top-0 left-0 w-64 px-2 py-4">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <a href="#">
                <x-application-logo class="block h-9 w-auto fill-current text-blue-100"/>
            </a>  
            <span class="text-2xl font-extrabold">Admin</span>
        </div>
        <!-- Close Button -->
        <button @click="open = false" class="p-2 rounded-md text-blue-100 hover:bg-blue-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Nav Links -->
    <nav class="mt-4">
        <x-side-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            dashboard
        </x-side-nav-link>
        <x-side-nav-link href="{{ route('module1') }}" :active="request()->routeIs('module1')">
            Research Projects Management 
        </x-side-nav-link>
        <x-side-nav-link href="{{ route('pub') }}" :active="request()->routeIs('pub')">
    Publication Repository
</x-side-nav-link>
        @php
    $isSubmenuOpen = request()->routeIs('schedule');
@endphp

<div class="text-white h-screen ml-0 space-y-0">
    <!-- Parent Menu Item --> 
    <button onclick="toggleSubmenu()" class="w-full flex justify-between items-center px-2 py-2 hover:bg-blue-700">
        <span class="ml-2">Appointment</span>
        <svg id="arrow" class="w-4 h-4 transform transition-transform duration-300 {{ $isSubmenuOpen ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Submenu -->
    <div id="submenu" class="pl-0 space-y-1 transition-all duration-300 {{ $isSubmenuOpen ? '' : 'hidden' }} ml-2">
        <x-side-nav-link href="{{ route('schedule') }}" :active="request()->routeIs('schedule')">
            Schedule
        </x-side-nav-link>
        <x-side-nav-link href="{{ route('create') }}" :active="request()->routeIs('create')">
            Create of Appointment
        </x-side-nav-link>
    </div>
    <!-- Regular Navigation Link (outside of submenu) -->
<x-side-nav-link href="{{ route('module4') }}" :active="request()->routeIs('module4')" class="mr-10">
        Module 4
    </x-side-nav-link>
</div>


<script>
    function toggleSubmenu() {
        const submenu = document.getElementById('submenu');
        const arrow = document.getElementById('arrow');
        submenu.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    }
</script>

<x-side-nav-link href="{{ route('module4') }}" :active="request()->routeIs('module4')">
            Module 4
        </x-side-nav-link>


    </nav>
</div>

</aside>
            <!-- Main Content -->
            <div class="flex-1 transition-all duration-300">
                <nav class="bg-blue-900 shadow-lg">

                    <div class="mx-auto px-2 sm:px-6 lg:px-8">
                        <div class="relative flex items-center justify-between h-16">
                            <div class="absolute inset-y-0 left-0 flex items-center">

                                <!-- Sidebar Toggle Button -->
                                <button @click="open = !open" class="p-2 rounded-md text-blue-100 hover:bg-blue-700 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>
                                </button>
                                <div class="absolute inset-y-0 left-20 flex items-center">
                                    <a href="#" class="text-white hover:bg-blue-500 px-3 py-2 rounded">Home</a>
                                 <a href="#" class="text-white hover:bg-blue-500 px-3 py-2 rounded">About</a>
                                  <a href="#" class="text-white hover:bg-blue-500 px-3 py-2 rounded">Services</a>
                                 <a href="#" class="text-white hover:bg-blue-500 px-3 py-2 rounded">Contact</a>
                              </div> 
                            </div>
                           
                            <div class="absolute inset-y-0 right-0 flex items-center">
                            <span class="text-sm text-white">
                            {{ \Carbon\Carbon::now()->format('F j, Y - H:i A') }}
                        </span>
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium text-blue-100 hover:bg-blue-700 focus:outline-none transition ease-in-out duration-200 p-2 rounded-md">
                                            <div>{{ Auth::user()->name }}</div>
                
                                            <div class="ms-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>
                
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>
                                        
                                        <!-- Authentication -->
                                        <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit"></button>
</form>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                
                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                            <form action="{{ route('logout') }}" method="POST">
                                  </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </div>
                        
                    </div>
                </nav>
                <div>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
