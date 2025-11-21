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