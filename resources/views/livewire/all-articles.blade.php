<div>
    <div class="flex glex-wrap gap-5 pb-8">
        <button class="@if ($selectedCategoryId === null) blue-btn @else white-btn @endif" wire:click="filterByCategory(null)">All</button>
        @foreach ($categories as $category)
            <button class="@if ((int)$selectedCategoryId ===  $category->id) blue-btn @else white-btn @endif" wire:click="filterByCategory({{ $category->id }})">
                {{ $category->title_en }}
            </button>
        @endforeach
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
        @forelse ($articles as $article)
        <a class="text-blue hover:bg-blue-100 rounded-md overflow-hidden w-full flex flex-col gap-3 p-4" href="{{ route('show-article', ['slug' => $article['slug_en']] ) }}">
            <img class="w-full h-[200px] rounded-md" src="{{ asset('storage/' . $article->filename) }}" alt="">
            <h1 class="text-gray-500 text-sm">{{ $article->category['title_en'] }}</h1>
            <h2 class="text-blue-900 font-bold">{{ $article->title_en }}</h2>
            <p class="text-sm">{{ $article['sh_description_en'] }}</p>
        </a>
        @empty
        <p>No articles yet.</p>
        @endforelse
    </div>
    <div class="mt-6 flex flex-col justify-center" data-no-instant>
        {{ $articles->links('livewire.pagination-dark') }}
    </div>
</div>
