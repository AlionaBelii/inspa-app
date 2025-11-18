@extends("layout")

@section("main")
    <p>{{ $worker['fullname_en'] }}</p>
    <img src="{{ asset('storage/' . $worker->filename) }}"alt="{{ $worker->alt_text }}">
@endsection