@extends("layout")
@section("main")
    <section>
       <p>Control projects</p>
       <div>
            <h1>List of requests: {{ $requests->total()}}</h1>
       </div>
    </section>
@endsection