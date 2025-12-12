@extends("layout")
@section("main")
    <div class="py-10">
        <div class="flex flex-col items-center gap-2">
            <h1 class="decorative-font text-2xl lg:text-4xl">Wanna add review to Designer?</h1>
            <div class="w-full flex align-center justify-center">
                <h2 class="text-blue-900 font-bold text-center">We’d Love to Hear From You</h2>
            </div>
        </div>
        <div class="flex flex-col align-center justife-center md:py-7">
            <form method="POST" action="{{ route('review-post') }}" class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @csrf
                <div class="flex flex-col gap-2">
                    <label class="text-blue-900 font-bold" for="fullname">Full name*</label>
                    <input type="text" class="border border-gray-300 rounded-md p-3" name="fullname" placeholder="Full Name" value="{{ old('fullname', Auth::check() ? Auth::user()->fullname : '') }}">
                    @error('fullname') 
                        <p class="text-blue-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-blue-900 font-bold" for="worker_id">Select designer</label>
                    <select name="worker_id" id="worker_id" class="border border-gray-300 rounded-md p-3">
                        @forelse ($workers as $worker)
                        <option class="text-black" value="{{ $worker->id}}" >[{{ $worker->category->title_en }}] {{ $worker->fullname_en}}</option>
                        @empty
                        <option class="text-black" value="">No designers.</option>
                        @endforelse
                    </select>
                    @error('worker_id') 
                        <p class="text-blue-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-blue-900 font-bold" for="project_description">Comment*</label>
                    <input type="text" class="border border-gray-300 rounded-md p-3" name="comment" placeholder="Describe your needs">
                    @error('comment') 
                        <p class="text-blue-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="blue-btn self-end justify-self-end">
                    Send review
                </button>
                 @if (session('success'))
                    <p class="text-blue-500 col-span-full">
                        {{ session('success') }}
                    </p>
                @endif
            </form>
        </div>
    </div>
@endsection