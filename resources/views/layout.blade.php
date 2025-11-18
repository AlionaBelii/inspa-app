<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspa Community</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/svg+xml" href="{{ asset('storage/header/inspa-favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <header class="container mx-auto flex flex-col justify-between md:py-3">
        <div class="bg-blue-900 text-white py-3 md:rounded-[200px]">
            <div class="pl-5 pr-3 flex flex-col gap-2 md:flex-row justify-between items-left">
                <div class="flex flex-row justify-between items-center">
                    <a href="{{ route('home') }}"><img class="h-[50px] mb-2 md:h-[30px] md:mb-0" src="{{ asset('storage/header/inspa-logo-white.svg') }}" alt="Inspa logo"></a>
                    <button id="menu-toggle-mobile" onclick="toggleSidebarMobile()" class="hamburger-menu-mobile visible md:hidden">
                    <img id="img" src="{{ asset('storage/header/header-burger-white.svg') }}" alt="Icon of menu">
                </button>
                </div>
                <div class="flex flex-col gap-5 md:flex-row md:gap-10">
                    <div class="flex flex-row gap-5">
                        <a href="mailto:design@inspa.md" class="flex gap-2 items-center text-sm"><img class="h-[10px]" src="{{ asset('storage/header/header-mail-white.svg') }}" alt="Mail icon"> design@inspa.md</a>
                        <a href="tel:+37369738748" class="flex gap-2 items-center text-sm"><img class="h-[15px]" src="{{ asset('storage/header/header-phone-white.svg') }}" alt="Phone icon"> +373 69-738-748</a>
                    </div>
                    <div class="flex bg-white items-center py-2 pl-3 pr-2 rounded-3xl"><input class="h-auto bg-white w-full" type="text" placeholder="Search"><img class="h-[15px]" src="{{ asset('storage/header/header-loop-blue.svg') }}" alt="Search icon"></div>
                </div>
            </div>
        </div>
        <nav class="hidden md:flex px-5 py-3 justify-between items-center">
           <div class="header-border w-full flex justify-between items-center">
                <ul class="flex">
                    <li class="header-link @if (Request::routeIs('home')) header-link-active @endif">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="header-link @if (Request::routeIs('ourworks')) header-link-active @endif">
                        <a href="{{ route('ourworks') }}">Our projects</a>
                    </li>
                    <li class="header-link @if (Request::routeIs('designers')) header-link-active @endif">
                        <a href="{{ route('designers') }}">Designers</a>
                    </li>
                    <li class="header-link @if (Request::routeIs('pricing')) header-link-active @endif">
                        <a href="{{ route('pricing') }}">Price</a>
                    </li>
                    <li class="header-link @if (Request::routeIs('about')) header-link-active @endif">
                        <a href="{{ route('about') }}">About</a>
                    </li>
                    <li class="header-link @if (Request::routeIs('contacts')) header-link-active @endif">
                        <a href="{{ route('contacts') }}">Contacts</a>
                    </li>
                    <li class="header-link @if (Request::routeIs('blog')) header-link-active @endif">
                        <a href="{{ route('blog') }}">Blog</a>
                    </li>
                </ul>
                <div>
                <button id="menu-toggle" onclick="toggleSidebar()" class="hamburger-menu">
                    <img id="img" src="{{ asset('storage/header/header-burger-blue.svg') }}" alt="Icon of menu">
                </button>
            </div>
           </div>            
        </nav>    
    </header>
    <div id="sidebar-overlay" onclick="toggleSidebar()"></div>
    <aside class="flex flex-col gap-5 bg-white px-10 py-10" id="sidebar">
        <nav class="flex flex-col gap-5">
            <a href=""><span class="flex gap-2 items-center"><img class="h-[15px]" src="{{ asset('storage/header/my-account.svg') }}" alt="Icon of menu">Sign in</span></a>
            <a href=""><span class="flex gap-2 items-center"><img class="h-[15px]" src="{{ asset('storage/header/dashboard.svg') }}" alt="Icon of menu">Dasboard</span></a>
            <a href=""><span class="flex gap-2 items-center"><img class="h-[15px]" src="{{ asset('storage/header/notification.svg') }}" alt="Icon of menu">Notifications</span></a>
        </nav>       
    </aside>
    <div id="sidebar-mobile-overlay" onclick="toggleSidebarMobile()"></div>
    <aside class="flex flex-col gap-5 bg-white px-10 py-10" id="sidebar-mobile">
        <nav class="flex flex-col gap-5">
            <ul class="flex flex-col">
                    <li class="header-link @if (Request::routeIs('home')) header-link-active @endif">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="header-link @if (Request::routeIs('ourworks')) header-link-active @endif">
                        <a href="{{ route('ourworks') }}">Our projects</a>
                    </li>
                    <li class="header-link @if (Request::routeIs('designers')) header-link-active @endif">
                        <a href="{{ route('designers') }}">Designers</a>
                    </li>
                    <li class="header-link @if (Request::routeIs('pricing')) header-link-active @endif">
                        <a href="{{ route('pricing') }}">Price</a>
                    </li>
                    <li class="header-link @if (Request::routeIs('about')) header-link-active @endif">
                        <a href="{{ route('about') }}">About</a>
                    </li>
                    <li class="header-link @if (Request::routeIs('contacts')) header-link-active @endif">
                        <a href="{{ route('contacts') }}">Contacts</a>
                    </li>
                    <li class="header-link @if (Request::routeIs('blog')) header-link-active @endif">
                        <a href="{{ route('blog') }}">Blog</a>
                    </li>
                </ul>
            <div class="flex flex-col gap-5">
                <a href=""><span class="flex gap-2 items-center px-5 py-2"><img class="h-[15px]" src="{{ asset('storage/header/my-account.svg') }}" alt="Icon of menu">Sign in</span></a>
                <a href=""><span class="flex gap-2 items-center px-5 py-2"><img class="h-[15px]" src="{{ asset('storage/header/dashboard.svg') }}" alt="Icon of menu">Dasboard</span></a>
                <a href=""><span class="flex gap-2 items-center px-5 py-2"><img class="h-[15px]" src="{{ asset('storage/header/notification.svg') }}" alt="Icon of menu">Notifications</span></a>
            </div>
        </nav>       
    </aside>    
    <main class="py-5 px-4 container mx-auto">
        @yield("main")
    </main>

    <footer class="w-full bg-blue-900 flex flex-col px-2 py-5 md:px-5 md:py-8 items-center">
        <a class="mb-5" href="{{ route('home') }}"><img class="h-[50px]" src="{{ asset('storage/header/inspa-logo-white.svg') }}" alt="Inspa logo"></a>
        <div class="text-white">
             <nav class="px-5">
                <ul class="flex flex-wrap justify-center">
                    <li class="footer-link-mobile">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="footer-link-mobile">
                        <a href="{{ route('ourworks') }}">Projects</a>
                    </li>
                    <li class="footer-link-mobile">
                        <a href="{{ route('designers') }}">Designers</a>
                    </li>
                    <li class="footer-link-mobile">
                        <a href="{{ route('pricing') }}">Price</a>
                    </li>
                    <li class="footer-link-mobile">
                        <a href="{{ route('about') }}">About</a>
                    </li>
                    <li class="footer-link-mobile">
                        <a href="{{ route('contacts') }}">Contacts</a>
                    </li>
                    <li class="footer-link-mobile">
                        <a href="{{ route('blog') }}">Blog</a>
                    </li>
                </ul>
            </nav>    
        </div>
        <div class="flex items-center text-white">
            <span class="footer-link-simple-mobile"> Copyright 2025</span>
            <span class="footer-link-simple-mobile"> | </span>
            <a class="footer-link-underline-mobile" href="{{ route('blog') }}">Privacy Policy</a>
            <span class="footer-link-simple-mobile"> | </span>
            <a class="footer-link-underline-mobile" href="{{ route('blog') }}">Site Terms & Disclosures</a>
        </div>
    </footer>
</body>
    
</html>