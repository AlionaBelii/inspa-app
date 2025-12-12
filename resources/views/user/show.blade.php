@extends("layout")

@section("main")
<div class="flex justify-between flex-wrap items-center h-min-[500px]">
    <h1 class="decorative-font text-2xl lg:text-4xl text-center pb-10">Hi, {{ $user['name'] }}</h1>
    <div class="flex gap-5">
        <a href="{{ route('start-project') }}" class="blue-btn" wire:navigate>Start a project</a>
        <a href="{{ route('start-review') }}" class="blue-btn" wire:navigate>Add review</a>
    </div>
</div>
<div class="flex flex-wrap gap-4">
    <div class="flex flex-col gap-2 p-4 border border-gray-300 rounded-md">
        <h4>Total projects: <span class="text-blue-900 font-bold">{{ $totalProjects }}</span></h4>
    </div>
    <div class="flex flex-col gap-2 p-4 border border-gray-300 rounded-md">
        <h4>Total reviews: <span class="text-blue-900 font-bold">{{ $totalReviews }}</span></h4>
    </div>         
</div>

<div class="flex flex-col w-full py-8">
    <h1 class="decorative-font text-2xl lg:text-4xl text-center pb-10">See all testimonials:</h1>

    <ul class="grid grid-cols-2 lg:grid-cols-4 gap-5">
            @forelse ($userReviews as $review)
            <li class="">
                <div class="text-blue hover:bg-blue-100 rounded-md w-full">
                    <div class="flex flex-col gap-2 items-center p-5 w-auto">
                        <x-lucide-quote class="text-blue-200 h-[75px] self-start"/>
                        <div class="flex gap-2 items-center self-start">
                            <div class="h-[50px] w-[50px] rounded-full overflow-hidden">
                                <img class="object-cover h-full" 
                                     src="{{ asset('storage/workers/' . ($review->worker->filename ?? 'default.jpg')) }}" 
                                     alt="{{ $review->worker->fullname_en }}">
                            </div>
                            <div class="flex flex-col">
                                <span class="font-bold text-sm">To:</span>
                                <p class="text-sm">{{ $review->worker->fullname_en }}</p>
                            </div>
                        </div>
                        
                        <p class="text-[12px] lg:text-sm italic text-justify py-3">{{ $review->comment }}</p>

                        <div class="flex gap-2 items-center self-start mt-auto"> <div class="h-[50px] w-[50px] rounded-full overflow-hidden">
                                <img class="object-cover h-full" 
                                     src="{{ asset('storage/users/' . ($review->user->filename ?? 'default.jpg')) }}" 
                                     alt="{{ $review->user->fullname }}">
                            </div>
                            <div class="flex flex-col">
                                <span class="font-bold text-sm">From:</span>
                                <p class="text-sm">{{ $review->user->fullname }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @empty
        <p>No testimonials. </p>  
            @endforelse
    </ul>
</div>

<div class="flex flex-col w-full py-8">
    <h1 class="decorative-font text-2xl lg:text-4xl text-center pb-10">See all projects:</h1>

    <ul class="grid grid-cols-2 lg:grid-cols-4 gap-5">
            @forelse ($userProjects as $project)
            <li>
                <div class="flex justify between py-3">
                <a href="{{ route('show-worker', ['slug' => $project->worker['slug_en']] ) }}" class="font-bold text-blue-900">
                    @ {{ $project->worker['slug_en'] }}
                </a>
                <span>
                    {{ $project['created_at'] }}
                </span>
            </div>
            <a class="flex flex-col gap-2" href="{{ route('show-project', ['id' => $project['id']] ) }}">
                <div class="w-full rounded-md h-[200px] overflow-hidden">
                    <img class="w-full object-cover" src="{{ asset('storage/projects/' . $project->filename) }}" alt="{$project->alt_text}">
                </div>
                <h1 class="font-bold py-2 text-blue-900 text-md">{{ $project['title_name_en'] }}</h1>
                <p class="line-clamp-3"><span class="font-bold">Description:</span> {{ $project['description_en'] }}</p>
                <a href="{{ route('show-category', ['slug' => $project->subcategory->category['slug_en']] ) }}"><span class="font-bold">Category:</span> {{ $project->subcategory->category['title_en'] }}</a>
                <p><span class="font-bold">Type:</span> {{ $project->subcategory['name_en'] }}</p>
            </a>
            </li>
        @empty
        <p>No projects. </p>  
            @endforelse
    </ul>
</div>

@endsection