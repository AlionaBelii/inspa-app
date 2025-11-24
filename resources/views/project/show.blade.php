@extends("layout")

@section("main")
<div>
    <h1 class="decorative-font text-2xl lg:text-4xl text-center pb-10">{{ $project['title_name_en'] }}</h1>
</div>
<div class="p-5 bg-gray-100 rounded-md">
    <div class="flex justify between py-3">
        <a href="{{ route('show-worker', ['slug' => $project->worker['slug_en']] ) }}" class="font-bold text-blue-900">
            @ {{ $project->worker['slug_en'] }}
        </a>
        <span>
            {{ $project['created_at'] }}
        </span>
    </div>
    <div class="flex flex-col gap-2">
        <div class="w-full rounded-md h-[400px] overflow-hidden">
            <img class="w-full object-cover" src="{{ asset('storage/projects/' . $project->filename) }}" alt="{$project->alt_text}">
        </div>
        <div class="mt-8 flex flex-col gap-5">
            <p><span class="font-bold">Description:</span> {{ $project['description_en'] }}</p>
            <a href="{{ route('show-category', ['slug' => $project->subcategory->category['slug_en']] ) }}"><span class="font-bold">Category:</span> {{ $project->subcategory->category['title_en'] }}</a>
            <p><span class="font-bold">Type:</span> {{ $project->subcategory['name_en'] }}</p>
        </div>
    </div>
</div>

<div class="flex flex-col w-full py-8">
        <h1 class="decorative-font text-2xl lg:text-4xl text-center pb-10">See more projects</h1>

        <ul class="grid grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach ($moreprojects as $anotherProject)
            <li class="p-5 bg-gray-100 rounded-md">
                <div class="flex justify between py-3">
                    <a href="{{ route('show-worker', ['slug' => $project->worker['slug_en']] ) }}" class="font-bold text-blue-900">
                        @ {{ $anotherProject->worker['slug_en'] }}
                    </a>
                    <span>
                        {{ $anotherProject['created_at'] }}
                    </span>
                </div>
                <a class="flex flex-col gap-2" href="{{ route('show-project', ['id' => $anotherProject['id']] ) }}">
                    <div class="w-full rounded-md h-[200px] overflow-hidden">
                        <img class="w-full object-cover" src="{{ asset('storage/projects/' . $anotherProject->filename) }}" alt="{$anotherProject->alt_text}">
                    </div>
                    <h1 class="font-bold py-2 text-blue-900 text-md">{{ $anotherProject['title_name_en'] }}</h1>
                    <p class="line-clamp-3"><span class="font-bold">Description:</span> {{ $anotherProject['description_en'] }}</p>
                    <a href="{{ route('show-category', ['slug' => $anotherProject->subcategory->category['slug_en']] ) }}"><span class="font-bold">Category:</span> {{ $anotherProject->subcategory->category['title_en'] }}</a>
                    <p><span class="font-bold">Type:</span> {{ $anotherProject->subcategory['name_en'] }}</p>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    
@endsection