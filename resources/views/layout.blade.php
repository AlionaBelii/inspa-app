<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspa Community</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('storage/header/inspa-favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"></link>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="{{ asset('js/search.js') }}"></script>

    @livewireStyles
</head>
<body>
    @livewire("header")

    <main class="py-5 px-4 container mx-auto">
        @yield("main")
    </main>
    <div id="sidebar-overlay" onclick="toggleSidebar()"></div>
        <aside class="fixed h-full right-0 z-2000 flex flex-col justify-between gap-5 bg-white px-10 py-10" id="sidebar">
            <nav class="flex flex-col gap-5">
                @auth
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('login') }}"wire:navigate><span class="flex gap-2 items-center"><x-ri-account-circle-line class="h-[25px] text-blue-600"/> Account</span></a>
                    <a href="{{ route('admin.dashboard') }}" wire:navigate><span class="flex gap-2 items-center"><x-ri-dashboard-line class="h-[25px] text-blue-600"/> Admin's panel</span></a>
                    <a href="{{ route('logout') }}" wire:navigate><span class="flex gap-2 items-center"><x-humble-logout class="h-[25px] text-blue-600"/> Logout</span></a>
                @endif
                @endauth
                @auth
                @if (Auth::user()->role === 'user')
                    <a href="{{ route('login') }}"wire:navigate><span class="flex gap-2 items-center"><x-ri-account-circle-line class="h-[25px] text-blue-600"/> Account</span></a>
                    <a href="{{ route('start-project') }}"wire:navigate><span class="flex gap-2 items-center">Start a project</span></a>
                    <a href="{{ route('logout') }}" wire:navigate><span class="flex gap-2 items-center"><x-humble-logout class="h-[25px] text-blue-600"/> Logout</span></a>
                @endif
                @endauth

                @guest
                    <a href="{{ route('login') }}"wire:navigate><span class="flex gap-2 items-center"><x-ri-account-circle-line class="h-[25px] text-blue-600"/>Login</span></a>
                    <a href="{{ route('register') }}"wire:navigate><span class="flex gap-2 items-center"><x-tabler-login class="h-[25px] text-blue-600"/>Register</span></a>
                @endguest
            </nav>
            <div class="flex flex-col gap-3 items-center w-full">
                <img class="h-[75px]" src="{{ asset('storage/flaticon.svg') }}" alt="">
                <div class="flex items-center text-gray-900 gap-1">
                    <span class="footer-link-simple-mobile text-center"> Copyright 2025</span>
                    <span class="footer-link-simple-mobile text-center"> | </span>
                    <a class="footer-link-underline-mobile text-center" href="{{ route('blog') }}">Privacy Policy</a>
                    <span class="footer-link-simple-mobile text-center"> | </span>
                    <a class="footer-link-underline-mobile text-center" href="{{ route('blog') }}">Site Terms & Disclosures</a>
                </div>
            </div>       
        </aside>
        <div id="sidebar-mobile-overlay" onclick="toggleSidebarMobile()"></div>
        <aside class="flex flex-col gap-5 bg-white px-10 py-10" id="sidebar-mobile">
            <nav class="flex flex-col gap-5">
                <ul class="flex flex-col">
                        <li class="header-link @if (Request::routeIs('home')) header-link-active @endif">
                            <a href="{{ route('home') }}" wire:navigate>Home</a>
                        </li>
                        <li class="header-link @if (Request::routeIs('ourworks')) header-link-active @endif">
                            <a href="{{ route('ourworks') }}" wire:navigate>Our projects</a>
                        </li>
                        <li class="header-link @if (Request::routeIs('designers')) header-link-active @endif">
                            <a href="{{ route('designers') }}" wire:navigate>Designers</a>
                        </li>
                        <li class="header-link @if (Request::routeIs('pricing')) header-link-active @endif">
                            <a href="{{ route('pricing') }}" wire:navigate>Price</a>
                        </li>
                        <li class="header-link @if (Request::routeIs('about')) header-link-active @endif">
                            <a href="{{ route('about') }}" wire:navigate>About</a>
                        </li>
                        <li class="header-link @if (Request::routeIs('contacts')) header-link-active @endif">
                            <a href="{{ route('contacts') }}" wire:navigate>Contacts</a>
                        </li>
                        <li class="header-link @if (Request::routeIs('blog')) header-link-active @endif">
                            <a href="{{ route('blog') }}" wire:navigate>Blog</a>
                        </li>
                    </ul>
                <div class="flex flex-col gap-5">
                @auth
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('login') }}"wire:navigate><span class="flex gap-2 items-center px-5 py-2"><x-ri-account-circle-line class="h-[25px] text-blue-600"/> Account</span></a>
                    <a href="{{ route('admin.dashboard') }}" wire:navigate><span class="flex gap-2 items-center px-5 py-2"><x-ri-dashboard-line class="h-[25px] text-blue-600"/> Admin's panel</span></a>
                    <a href="{{ route('logout') }}" wire:navigate><span class="flex gap-2 items-center px-5 py-2"><x-humble-logout class="h-[25px] text-blue-600"/> Logout</span></a>
                @endif
                @endauth
                @auth
                @if (Auth::user()->role === 'user')
                    <a href="{{ route('login') }}"wire:navigate><span class="flex gap-2 items-center px-5 py-2"><x-ri-account-circle-line class="h-[25px] text-blue-600"/> Account</span></a>
                    <a href="{{ route('login') }}"wire:navigate><span class="flex gap-2 items-center px-5 py-2">Start a project</span></a>
                    <a href="{{ route('logout') }}" wire:navigate><span class="flex gap-2 items-center px-5 py-2"><x-humble-logout class="h-[25px] text-blue-600"/> Logout</span></a>
                @endif
                @endauth

                @guest
                    <a href="{{ route('login') }}"wire:navigate><span class="flex gap-2 items-center px-5 py-2"><x-ri-account-circle-line class="h-[25px] text-blue-600"/>Login</span></a>
                    <a href="{{ route('register') }}"wire:navigate><span class="flex gap-2 items-center px-5 py-2"><x-tabler-login class="h-[25px] text-blue-600"/>Register</span></a>
                @endguest                    
                </div>
            </nav>       
        </aside>    
    @livewire("footer")
    @livewireScripts
</body>
    
</html>