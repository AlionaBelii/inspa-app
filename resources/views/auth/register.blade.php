@extends("layout")

@section("main")
    <section>
        <div class="flex flex-col gap-5 width-full h-full align-center justify-center">
            <h1 class="decorative-font text-2xl text-center">Register</h1>
            <div class="w-full flex align-center justify-center">
                <form method="post" action="{{ route('registerPost') }}" class="flex flex-col gap-5 w-full lg:max-w-[600px]">
                @csrf

                    <input class="border border-gray-100 rounded-full p-3" type="text" name="name" placeholder="Username" value="{{ old('name') }}">
                    @error("name")
                        <p class="text-blue-500 text-sm">{{ $message }}</p>
                    @enderror
                    
                    <input class="border border-gray-100 rounded-full p-3" type="text" name="fullname" placeholder="Fullname" value="{{ old('name') }}">
                    @error("fullname")
                        <p class="text-blue-500 text-sm">{{ $message }}</p>
                    @enderror

                    <input class="border border-gray-100 rounded-full p-3" type="email" name="email" placeholder="Email" value="{{ old('name') }}">
                    @error("email")
                        <p class="text-blue-500 text-sm">{{ $message }}</p>
                    @enderror

                    <input class="border border-gray-100 rounded-full p-3" type="password" name="password" placeholder="Password">
                    @error("password")
                        <p class="text-blue-500 text-sm">{{ $message }}</p>
                    @enderror
                    
                    <input class="border border-gray-100 rounded-full p-2" type="password" name="password_confirmation" placeholder="Confirm password">
                    @error("password_confirmation")
                        <p class="text-blue-500 text-sm">{{ $message }}</p>
                    @enderror

                    <button class="blue-btn" type="submit">Register</button>
                </form>
            </div>
        </div>
    </section>

@endsection