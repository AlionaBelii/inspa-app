@extends("layout")

@section("main")
<section class="">
     <div class="flex flex-col gap-5 width-full h-full align-center justify-center">
        <h1 class="decorative-font text-2xl text-center">Login</h1>
        <div class="w-full flex align-center justify-center">
            <form method="post" action="{{ route('loginPost') }}" class="flex flex-col gap-5 w-full lg:max-w-[600px]">
                @csrf
                
                <input class="border border-gray-100 rounded-full p-3" type="text" name="name" placeholder="Username">
                @error("name")
                    <p class="text-blue-500 text-sm">{{ $message }}</p>
                @enderror
                <input class="border border-gray-100 rounded-full p-3" type="password" name="password" placeholder="Password">
                @error("password")
                    <p class="text-blue-500 text-sm">{{ $message }}</p>
                @enderror
                <div class="flex flex-col gap-1">
                    <p>Don't have account?</p>
                    <a class="text-blue-400" href="{{ route('register') }}" wire:navigate>Register now</a>
                </div>
                <button class="blue-btn" type="submit">Login</button>
                </form>
            </div>
    </div>
    
</section>
@endsection