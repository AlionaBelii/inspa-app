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
        @forelse ($allDesigners as $worker)
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
        <p>No workers yet.</p>
        @endforelse
</div>
    <div class="mt-6 flex flex-col justify-center" data-no-instant>
        {{ $allDesigners->links('livewire.pagination-dark') }}
    </div>
</div>
