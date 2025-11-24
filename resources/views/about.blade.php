@extends("layout")
@section("main")
    <div class="w-full relative flex flex-col md:flex-row md:justify-between">
        <div class="flex flex-col gap-5 md:ml-16">
            <div class="flex flex-col gap-5 text-left justify-left md:max-w-[500px] py-5">
                <h1 class="decorative-font text-2xl lg:text-4xl">About</h1>
                <p>Inspa is a digital platform that bridges the gap between designers and clients. Founded with a mission to simplify the creative process, Inspa empowers both creators and businesses to connect, collaborate, and bring ideas to life.</p>
            </div>
            <div class="flex flex-col gap-5 text-left md:max-w-[500px] py-5">
                <h1 class="decorative-font text-2xl lg:text-4xl">Our Mission</h1>
                <p>Our mission is simple: to make design accessible, transparent, and inspiring. We believe that great design should be available to everyone, regardless of size or budget. Through our platform, clients can easily submit design requests, choose styles and designers, and track progress in real-time. For designers, Inspa provides a space to showcase their work, manage projects, and grow their creative careers.</p>
            </div>
            <div class="flex flex-col gap-5 text-left md:max-w-[500px] py-5">
                <h1 class="decorative-font text-2xl lg:text-4xl">Why Choose Inspa?</h1>
                <div class="flex gap-4 mt-5">
                    <img src="{{ asset('storage/about/1.svg') }}" alt="">
                    <div>
                        <span class="text-blue-900 font-bold">Top-Tier Designers</span> <br>
                        We carefully select talented designers from around the world.
                    </div>
                </div>
                <div class="flex gap-4 mt-5">
                    <img src="{{ asset('storage/about/2.svg') }}" alt="">
                    <div>
                        <span class="text-blue-900 font-bold">Effortless Collaboration</span> <br>
                        Streamlined communication and progress tracking for smooth project management.
                    </div>
                </div>
                <div class="flex gap-4 mt-5">
                    <img src="{{ asset('storage/about/3.svg') }}" alt="">
                    <div>
                        <span class="text-blue-900 font-bold">Transparent Pricing</span> <br>
                        Clear and competitive rates for every design category.
                    </div>
                </div>
                <div class="flex gap-4 mt-5">
                    <img src="{{ asset('storage/about/4.svg') }}" alt="">
                    <div>
                        <span class="text-blue-900 font-bold">Custom Solutions</span> <br>
                        Get designs tailored to your brand's voice and vision.
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-5 text-left md:max-w-[500px] py-5">
                <h1 class="decorative-font text-2xl lg:text-4xl">Join Our Community</h1>
                <p><span class="text-blue-900 font-bold">Stay Inspired. Stay Updated.</span>
                Join our community and be the first to know about exclusive design trends, new features, and special offers. Get inspiration delivered straight to your inbox!</p>
                <div class="flex max-w-[650px] input-btn w-full mt-5">
                    <input class="bg-white rounded-[1000px] w-full pl-5" type="text" placeholder="Your email">
                    <button class="blue-btn">Subscribe</button>
                </div>
            </div>
        </div>
        <div class="sticky top-[-80px] right-0 xl:top-[-100px] xl:right-[0px] overflow:hidden z-1000">@livewire("animated-spinner")</div>

    </div>
@endsection