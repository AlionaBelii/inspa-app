<div>
    <h1 class="mb-5">List of <span class="text-blue-900 font-bold">new</span> requests: <span class="text-blue-900 font-bold">{{ $newRequestsCount }}</span></h1>
    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-5 w-full justify-center">
    @forelse ($newrequests as $request)
        <li class="aspect-square width-auto flex flex-col gap-2 p-5 border border-gray-300 rounded-md">
            <div class="flex justify-between align-center gap-5 text-sm">
                <span class="text-blue-900 font-bold">No: {{ $request->id }}</span>
                <div class="flex gap-2">
                    <button wire:click="updateStatus( {{ $request->id }}, 'in_progress')" wire:confirm="Change №{{ $request->id }} to status: In progress?">
                    <x-tabler-progress class="h-[20px] text-blue-500"/>
                    </button>
                    <button wire:click="updateStatus( {{ $request->id }}, 'rejected')" wire:confirm="Change №{{ $request->id }} to status: Rejected?">
                    <x-bx-no-entry class="h-[20px] text-red-500"/>
                    </button>
                </div>
            </div>
            <div class="flex justify-between align-center border-b-2 border-solid border-gray-300 py-2 gap-5">
                <div class="flex gap-2 text-sm">
                    <span>From:</span> <span class="text-blue-900 font-bold">{{ $request->user['fullname'] }}</span>
                </div>
                <div class="flex gap-2 text-sm">
                    <span>Designer:</span> <span class="text-blue-900 font-bold">{{ $request->worker['fullname_en'] }}</span>
                </div>
            </div>
            <div class="border-b-2 border-solid border-gray-300 py-2">
                <div class="flex gap-2 text-sm">
                    <span>Project type:</span> <span class="text-blue-900 font-bold">{{ $request->subcategory['name_en'] }}</span>
                </div>
                <div class="flex gap-2 text-sm">
                    <span>Date:</span> <span class="text-blue-900 font-bold">{{ $request['created_at'] }}</span>
                </div>
                <div class="flex gap-2 text-sm">
                    <span>Project deadline:</span> <span class="text-blue-900 font-bold">{{ $request['prefered_deadline'] }}</span>
                </div>
            </div>
            <div class="text-sm">
                <span class="">{{ $request['project_description'] }}</span>
            </div>
            <div class="w-[100px] h-[100px] overflow-hidden">
                <img class="object-cover w-full" src="{{ asset('storage/' . $request->reference_file) }}" alt="">
            </div>
        </li>
                
        @empty
            <p>No new requests!</p>
        @endforelse
    </ul>
    <div class="mt-6 flex justify-center">
        {{ $newrequests->links() }}
    </div>
</div>