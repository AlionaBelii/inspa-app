@extends("layout")

@section("main")

<div class="p-5 bg-gray-100 rounded-md">
    <div class="flex justify between py-3  flex flex-col">
        <div class="pb-8">
            <h1 class="text-gray-500 text-sm">{{ $article->category['title_en'] }}</h1>
            <h2 class="text-blue-900 font-bold text-2xl">{{ $article->title_en }}</h2>
        </div>
       <div class="flex flew-wrap gap-5 justify-between">
            <div class="w-full overflow-hidden rounded-md">
            <img class="w-full lg:max-h-[500px] rounded-md" src="{{ asset('storage/' . $article->filename) }}" alt="">
            </div>
            <p class="max-w-[700px]">{{ $article['description_en'] }}</p>
       </div>
    </div>
</div>

<div class="">
    <h1 class="decorative-font text-2xl lg:text-4xl text-center p-10">More articles</h1>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
        @forelse ($morearticles as $article)
            <a class="text-blue hover:bg-blue-100 rounded-md w-full flex flex-col gap-3 p-4" href="{{ route('show-article', ['slug' => $article['slug_en']] ) }}">
                <img class="w-full h-[200px]" src="{{ asset('storage/' . $article->filename) }}" alt="">
                <h1 class="text-gray-500 text-sm">{{ $article->category['title_en'] }}</h1>
                <h2 class="text-blue-900 font-bold">{{ $article->title_en }}</h2>
                <p class="text-sm">{{ $article['sh_description_en'] }}</p>
            </a>
        @empty
        <p>Nothing to show.</p>
        @endforelse
    </div>
</div>

    
@endsection