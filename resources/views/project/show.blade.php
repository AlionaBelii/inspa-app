@extends("layout")

@section("main")
    <p>{{ $project['title_name_en'] }}</p>
    <img src="{{ asset('storage/projects/' . $project->filename) }}"alt="{{ $project->alt_text }}">
    
@endsection