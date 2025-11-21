@extends("layout")

@section("main")
    <h1>Register</h1>
    <form method="post" action="{{ route('registerPost') }}" wire:navigate>
        @csrf

        <input type="text" name="name" placeholder="Username" value="{{ old('name') }}">
        @error("name")
            <p>{{ $message }}</p>
        @enderror
        
        <input type="text" name="fullname" placeholder="Fullname" value="{{ old('name') }}">
        @error("fullname")
            <p>{{ $message }}</p>
        @enderror

        <input type="email" name="email" placeholder="Email" value="{{ old('name') }}">
        @error("email")
            <p>{{ $message }}</p>
        @enderror

        <input type="password" name="password" placeholder="Password">
        @error("password")
            <p>{{ $message }}</p>
        @enderror
        
        <input type="password" name="password_confirmation" placeholder="Confirm password">
        @error("password_confirmation")
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">Register</button>
    </form>

@endsection