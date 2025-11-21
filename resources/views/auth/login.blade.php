@extends("layout")

@section("main")
    <h1>Login</h1>
    <!-- web.php have to imeti loginPost -->
    <form method="post" action="{{ route('loginPost') }}">
        @csrf
        
        <input type="email" name="email" placeholder="Email">
        @error("email")
            <p>{{ $message }}</p>
        @enderror
        <input type="password" name="password" placeholder="Password">
        @error("password")
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">Login</button>
    </form>
    <p>Don't have account?</p>
    <a href="{{ route('register') }}" wire:navigate>Register now</a>
@endsection