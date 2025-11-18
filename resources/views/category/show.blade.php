@extends("layout")

@section("main")
    <p>{{ $category['title_en'] }}</p>
    <img src="{{ asset('storage/' . $category->filename) }}"alt="{{ $category->alt_text }}">
    
@endsection