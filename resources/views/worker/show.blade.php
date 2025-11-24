@extends("layout")

@section("main")
<section>
    <div class="flex flex-col gap-5 py-8">
        <div class="w-full flex flex-col justify-center items-center gap-4">
            <h1 class="decorative-font text-2xl lg:text-4xl">{{ $worker['fullname_en'] }}</h1>
            <div class="p-3 bg-gray-100 rounded-md">
                <p class="text-gray-900 font-regular text-xl">{{ $worker->category->title_en }}</p>
            </div>
        </div>

        <div class="flex flex-wrap gap-5 items-center justify-center lg:justify-between">

            <div class="flex flex-col gap-5 items-center justify-center">

                <div class="rounded-md overflow-hidden w-full max-w-[500px] max-h-[500px]">

                    <img class="w-full h-full object-cover" src="{{ asset('storage/workers/' . $worker->filename) }}" alt="{{ $worker->alt_text }}">

                </div>

                <div class="flex flex-col gap-4 items-center">

                    <div class="flex gap-4">
                        <div class="flex gap-2 bg-blue-900 items-center justify-center rounded-md p-2">
                            <x-letsicon-done-ring-round class="text-white h-[20px]"/>
                            <p class="text-white text-md font-regular">+{{ $worker->projects_count }} projects</p>
                        </div>

                        <div class="flex gap-2 bg-blue-900 items-center justify-center rounded-md p-4">
                            <x-carbon-review class="text-white h-[20px]"/>
                            <p class="text-white text-md font-regular">{{ $worker->reviews_count }} reviews</p>
                        </div>
                    </div>

                    <div class="flex gap-4 bg-blue-900 items-center justify-center rounded-md p-4">
                        <x-zondicon-calendar class="text-white h-[20px]"/> 
                        <p class="text-white text-md font-regular">{{ $worker->experience_years }} years</p>
                    </div>

                </div>
            </div>

            <div class="w-full max-w-[750px]">
                <p class="p-7 bg-gray-100 rounded-md text-gray-900 font-regular text-md">{{ $worker->description_en }}</p>
            </div>
        </div>
    </div>

    <div class="flex flex-col w-full py-8">
        <h1 class="decorative-font text-2xl lg:text-4xl text-center pb-10">My Projects</h1>

        <div>
            @livewire("worker-projects", ['workerId' => $worker->id])
        </div>
    </div>
    
    <div class="flex flex-col w-full py-8">
        <div class="w-full flex align-center justify-center">
            <h2 class="uppercase text-blue-900 font-bold text-center ">Testimonials</h2>
        </div>
        <h1 class="decorative-font text-2xl lg:text-4xl text-center pb-10">Client’s RevIews</h1>

        <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-5 w-full align-start md:py-7">
            @forelse ($workerReviews as $review)
            <li class="text-blue hover:bg-blue-100 rounded-md w-full">
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
            </li>
            @empty
            <p>No testimonials.</p>
            @endforelse
        </ul>
    </div>

     @livewire("project-request")
</section>
@endsection