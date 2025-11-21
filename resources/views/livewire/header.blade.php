    
    <header class="sticky top-0 z-50 w-full backdrop-blur-md bg-white/40">
        <div class="container mx-auto flex flex-col justify-between md:py-3 sticky top-0 backdrop-blur-md">
            <div class="bg-blue-900 text-white py-3 md:rounded-[200px]">
                <div class="pl-5 pr-3 flex flex-col gap-2 md:flex-row justify-between items-left">
                    <div class="flex flex-row justify-between items-center">
                        <a href="{{ route('home') }}" wire:navigate><img class="h-[50px] mb-2 md:h-[30px] md:mb-0" src="{{ asset('storage/header/inspa-logo-white.svg') }}" alt="Inspa logo"></a>
                        <button id="menu-toggle-mobile" onclick="toggleSidebarMobile()" class="hamburger-menu-mobile visible md:hidden">
                        <img id="img" src="{{ asset('storage/header/header-burger-white.svg') }}" alt="Icon of menu">
                    </button>
                    </div>
                    <div class="flex flex-col gap-5 md:flex-row md:gap-10">
                        <div class="flex flex-row gap-5">
                            <a href="mailto:design@inspa.md" class="flex gap-2 items-center text-sm" wire:navigate><img class="h-[10px]" src="{{ asset('storage/header/header-mail-white.svg') }}" alt="Mail icon"> design@inspa.md</a>
                            <a href="tel:+37369738748" class="flex gap-2 items-center text-sm" wire:navigate><img class="h-[15px]" src="{{ asset('storage/header/header-phone-white.svg') }}" alt="Phone icon"> +373 69-738-748</a>
                        </div>
                        <div class="relative flex bg-white items-center py-2 pl-3 pr-2 rounded-3xl">
                            <input id="search" class="h-auto bg-white w-full text-black" type="text" placeholder="Search"><x-eva-search-outline class="h-[25px] text-blue-900"/>
                            <div id="search-results" class="hidden absolute top-[130%] z-5000 backdrop-blur-md bg-white/80 border border-gray-200 p-4 rounded-md text-black">
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <nav class="hidden md:flex px-5 py-3 justify-between items-center">
                <div class="header-border w-full flex justify-between items-center">
                    <ul class="flex">
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
                    <div>
                        <button id="menu-toggle" onclick="toggleSidebar()" class="hamburger-menu">
                            <img id="img" src="{{ asset('storage/header/header-burger-blue.svg') }}" alt="Icon of menu">
                        </button>
                    </div>
                </div>            
            </nav>    
        </div>
        
</header>