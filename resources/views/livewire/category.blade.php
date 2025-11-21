<div>
    <h2>{{ category['title_en']}}</h2>
    <ul class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-7 xl:grid-cols-9 gap-5 w-full justify-center md:py-7">
        @forelse ($category->workers as $worker)
            @livewire("worker", ["worker" => $worker])
        @else
        <p>No one</p>
        @endforelse
    </ul>
</div>