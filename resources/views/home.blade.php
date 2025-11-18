@extends("layout")
@section("main")
    <section class="flex justify-between items-center py-14 h-max">
        <div class="flex flex-col gap-10 w-full">
            <div class="flex flex-col gap-10">
                <h1 class="text-5xl leading-[45px] font-medium  md:text-7xl md:leading-[85px] text-gray-950"><span class="decorative-font text-green-600">Design<br></span>Starts With<br>
                 <span class=" text-blue-900 decorative-font">A Connection</span></h1>
                <p>A platform where clients and designers collaborate seamlessly.</p>
            </div>
            <div class="flex flex-col justify-between md:flex-row w-full gap-5">
                <div class="flex gap-5">
                    <button class="blue-btn">Start a project</button>
                    <button class="white-btn">Browse designers ↗</button>
                </div>
                <div class="flex max-w-[650px] input-btn pl-5">
                    <input class="bg-white rounded-[1000px] w-full" type="text" placeholder="Your email">
                    <button class="blue-btn">Subscribe</button>
                </div>
            </div>
        </div>
    </section>
    <section class="flex flex-col py-5 md:py-10">
        <h1 class="title-block">Popular Categories</h1>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5 w-full justify-center md:py-7">
            @forelse ($categories as $category)
                <!-- {{-- <a href="{{ route('show-category', ['slug' => $category->slug_en]) }}">{{ $category['title_en'] }}</a> --}} -->
                <a class="text-blue" href="{{ route('show-category', ['slug' => $category['slug_en']]) }}">
                    <div class="flex flex-col gap-2 items-center p-5 w-auto">
                        <div class="bg-white hover:bg-blue-100 p-8 rounded-md w-full flex items-center justify-center aspect-square"><img class="h-[100px]" src="{{ asset('storage/categories/' . $category->filename) }}" alt="{{ $category->alt_text }}"></div>
                        <p class="text-gray-900 font-bold hover:text-blue-900">{{ $category['title_en'] }}</p>
                    </div>
                </a>
            @empty
                <p>No categories </p>    
            @endforelse
        </div>
    </section>
    <section class="flex flex-col py-5 md:py-10">
       <div class="bg-blue-900 p-1 rounded-md grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 w-full justify-center ">
            <div class="bg-blue-900 flex items-center justify-center aspect-square p-1">
                <img class="h-[35px] md:max-h-[50px]" src="{{ asset('storage/partners/adobe.png') }}" alt="Logo of Adobe">
            </div>
            <div class="bg-blue-900 flex items-center justify-center aspect-square p-1">
                <img class="h-[35px] md:max-h-[50px]" src="{{ asset('storage/partners/blender.png') }}" alt="Logo of Blender">
            </div>
            <div class="bg-blue-900 flex items-center justify-center aspect-square p-1">
                <img class="h-[35px] md:max-h-[50px]" src="{{ asset('storage/partners/canva.webp') }}" alt="Logo of Canva">
            </div>
            <div class="bg-blue-900 flex items-center justify-center aspect-square p-1">
                <img class="h-[35px] md:max-h-[50px]" src="{{ asset('storage/partners/coreldraw.png') }}" alt="Logo of Corel Draw">
            </div>
            <div class="bg-blue-900 flex items-center justify-center aspect-square p-1">
                <img class="h-[35px] md:max-h-[50px]" src="{{ asset('storage/partners/creative.png') }}" alt="Logo of Creative">
            </div>
            <div class="bg-blue-900 flex items-center justify-center aspect-square p-1">
                <img class="h-[35px] md:max-h-[50px]" src="{{ asset('storage/partners/figma.png') }}" alt="Logo of Figma">
            </div>
       </div>
    </section>
    <section class="flex flex-col py-5 md:py-10">
        <h1 class="title-block">How It Works</h1>
        <div class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-7 xl:grid-cols-9 gap-5 w-full justify-center md:py-7">
           <div class="bg-white flex flex-col gap-3 items-center justify-center p-5">
                <img class="h-[75px]" src="{{ asset('storage/howitworks/choose-design.svg') }}" alt="Choose design">
                <p class="text-center">Choose design</p>
            </div>
            <div class="bg-white flex flex-col gap-3 items-center justify-center p-5">
                <img class="h-[10px]" src="{{ asset('storage/howitworks/arrow.svg') }}" alt="Choose design">
            </div>
            <div class="bg-white flex flex-col gap-3 items-center justify-center p-5">
                <img class="h-[75px]" src="{{ asset('storage/howitworks/select-designer.svg') }}" alt="Select a designer">
                <p class="text-center">Select a designer</p>
            </div>
            <div class="bg-white flex flex-col gap-3 items-center justify-center p-5">
                <img class="h-[10px]" src="{{ asset('storage/howitworks/arrow.svg') }}" alt="Choose design">
            </div>
            <div class="bg-white flex flex-col gap-3 items-center justify-center p-5">
                <img class="h-[75px]" src="{{ asset('storage/howitworks/define-details.svg') }}" alt="Define details">
                <p class="text-center">Define details</p>
            </div>
            <div class="bg-white flex flex-col gap-3 items-center justify-center p-5">
                <img class="h-[10px]" src="{{ asset('storage/howitworks/arrow.svg') }}" alt="Choose design">
            </div>
            <div class="bg-white flex flex-col gap-3 items-center justify-center p-5">
                <img class="h-[75px]" src="{{ asset('storage/howitworks/track-progress.svg') }}" alt="Track progress">
                <p class="text-center">Track progress</p>
            </div>
            <div class="bg-white flex flex-col gap-3 items-center justify-center p-5">
                <img class="h-[10px]" src="{{ asset('storage/howitworks/arrow.svg') }}" alt="Choose design">
            </div>
            <div class="bg-white flex flex-col gap-3 items-center justify-center p-5">
                <img class="h-[75px]" src="{{ asset('storage/howitworks/final-result.svg') }}" alt="Receive the final result">
                <p class="text-center">Receive the final result</p>
            </div>
        </div>
    </section>
    <section class="flex flex-col py-5 md:py-10">
        <h1 class="title-block">Featured Designers</h1>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5 w-full justify-center md:py-7">
            @forelse ($topworkers as $worker)
                <!-- {{-- <a href="{{ route('show-category', ['slug' => $category->slug_en]) }}">{{ $category['title_en'] }}</a> --}} -->
                <a class="text-blue" href="{{ route('show-worker', ['slug' => $worker['slug_en']]) }}">
                    <div class="flex flex-col gap-2 items-center p-5 w-auto">
                        <div class="bg-white hover:bg-blue-100 p-8 rounded-md w-full flex items-center justify-center aspect-square">
                            <!-- <img class="h-[100px]" src="{{ asset('storage/categories/' . $worker->filename) }}" alt="{{ $category->alt_text }}"></div> -->
                        <p class="text-gray-900 font-bold hover:text-blue-900">{{ $worker['fullname_en'] }}</p>
                        <p class="text-gray-900 font-bold hover:text-blue-900">{{ $worker->category->title_en }}</p>
                    </div>
                </a>
            @empty
                <p>No categories </p>    
            @endforelse
        </div>
    </section>
    
@endsection