@extends("layout")
@section("main")
    <section>
       <p>Control projects</p>
       <div>
            <h1>List of requests: {{ $requests->total()}}</h1>
       </div>

       @if (session('success'))
        {{ session('success') }}
       @endif
    </section>
@endsection