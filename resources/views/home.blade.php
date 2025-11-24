@extends("layout")
@section("main")
    <section class="flex justify-between items-center py-14 h-max">
        <div class="flex flex-col gap-10 w-full relative">
            <div class="absolute top-[-80px] right-0 xl:top-[-100px] xl:right-0 overflow:hidden z-1000">@livewire("animated-spinner")</div>
            <div class="flex flex-col gap-10 z-2000">
                <h1 class="text-5xl leading-[45px] font-medium  md:text-7xl md:leading-[85px] text-gray-950"><span class="decorative-font text-green-600">Design<br></span>Starts With<br>
                 <span class=" text-blue-900 decorative-font">A Connection</span></h1>
                <p>A platform where clients and designers collaborate seamlessly.</p>
            </div>
            <div class="z-2000 flex flex-col justify-between md:flex-row w-full gap-5">
                <div class="flex gap-5">
                    <a href="{{ route('start-project') }}" class="blue-btn" wire:navigate>Start a project</a>
                    <a href="{{ route('designers') }}" class="white-btn" wire:navigate>Browse designers ↗</a>
                </div>
                <div class="flex max-w-[650px] input-btn w-full ">
                    <input class="bg-white rounded-[1000px] w-full pl-5" type="text" placeholder="Your email">
                    <button class="blue-btn">Subscribe</button>
                </div>
            </div>
        </div>
    </section>
    <section class="flex flex-col py-5 md:py-10">
        <h1 class="title-block text-2xl lg:text-4xl">We Work With</h1>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5 w-full justify-center md:py-7">
            @forelse ($categories as $category)
                <!-- {{-- <a href="{{ route('show-category', ['slug' => $category->slug_en]) }}">{{ $category['title_en'] }}</a> --}} -->
                <div class="text-blue">
                    <div class="flex flex-col gap-2 items-center p-5 w-auto">
                        <div class="bg-white hover:bg-blue-100 p-8 rounded-md w-full flex items-center justify-center aspect-square"><img class="h-[100px]" src="{{ asset('storage/categories/' . $category->filename) }}" alt="{{ $category->alt_text }}"></div>
                        <p class="text-gray-900 font-bold hover:text-blue-900">{{ $category['title_en'] }}</p>
                    </div>
                </div>
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
        <h1 class="title-block text-2xl lg:text-4xl">Featured Designers</h1>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-5 w-full justify-center md:py-7">
            @forelse ($topworkers as $worker)
                <a class="text-blue hover:bg-blue-100 rounded-md w-full" href="{{ route('show-worker', ['slug' => $worker['slug_en']]) }}">
                    <div class="flex flex-col gap-2 items-center p-5 w-auto">
                        <div class="rounded-md w-full aspect-square overflow-hidden">
                            <img class="w-full h-full object-cover" src="{{ asset('storage/workers/' . $worker->filename) }}" alt="{{ $worker->alt_text }}">
                        </div>
                        <div class="flex flex-wrap gap-2 mb-2">
                            <div class="flex gap-2 bg-blue-900 items-center justify-center rounded-md p-2"><x-letsicon-done-ring-round class="text-white h-[15px]"/><p class="text-white text-[10px] font-regular">+{{ $worker->projects_count }} projects</p></div>
                                <div class="flex gap-2 bg-blue-900  items-center justify-center rounded-md p-2"><x-carbon-review class="text-white h-[15px]"/><p class="text-white text-[10px] font-regular">{{ $worker->reviews_count }} reviews</p></div>
                                <div>
                                <div class="flex gap-2 bg-blue-900  items-center justify-center rounded-md p-2"><x-zondicon-calendar class="text-white h-[15px]"/> <p class="text-white text-[10px] font-regular">{{ $worker->experience_years }} years</p></div>
                            </div>
                        </div>
                        <div><p class="text-gray-900 font-bold hover:text-blue-900">{{ $worker['fullname_en'] }}</p></div>
                        <div class="p-3 bg-gray-100 rounded-md"><p class="text-gray-900 font-regular text-sm ">{{ $worker->category->title_en }}</p></div>
                        
                    </div>
                </a>
            @empty
                <p>No workers. </p>    
            @endforelse
        </div>
        <a href="{{ route('designers') }}" class="white-btn self-end" wire:navigate>Browse designers ↗</a>
    </section>

    <section class="flex flex-col py-5 md:py-10">
        <div class="w-full flex align-center justify-center">
            <h2 class="uppercase text-blue-900 font-bold text-center ">Testimonials</h2>
        </div>
        <h1 class="title-block text-2xl lg:text-4xl">Client’s RevIews</h1>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-5 w-full align-start md:py-7">
            @forelse ($topreviews as $review)
                <div class="text-blue hover:bg-blue-100 rounded-md w-full">
                    <div class="flex flex-col gap-2 items-center p-5 w-auto">
                        <x-lucide-quote class="text-blue-200 h-[75px] self-start"/>
                        <div class="flex flex-col gap-4 mt-5">
                            <p class="text-[12px] lg:text-sm italic text-justify">{{$review['comment']}}</p>
                            <div class="flex gap-2 items-center self-start">
                            <div class="h-[50px] w-[50px] rounded-full overflow-hidden"><img class="object-cover h-full" src="{{ asset('storage/users/' . ($review->user->filename ?? 'default.jpg')) }}" alt="{{ $review->user->fullname}}"></div>
                                <p>{{ $review->user->fullname }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>No testimonials. </p>    
            @endforelse
        </div>
    </section>
    
    @livewire("project-request")
    
@endsection