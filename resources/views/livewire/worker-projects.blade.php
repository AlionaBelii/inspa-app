<div>
    <ul class="grid grid-cols-2 lg:grid-cols-4 gap-5">
        @forelse ($projects as $project)
        <li class="p-5 bg-gray-100 rounded-md">
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
        <p>No projects yet.</p>
        @endforelse
    </ul>
    <div class="mt-6 flex flex-col justify-center" data-no-instant>
        {{ $projects->links('livewire.pagination-dark') }}
    </div>
</div>
