@extends("layout")
@section("main")
    <section>
       <div class="flex flex-col gap-2">
        <div class="flex flex-col gap-2">    
            <p class="uppercase text-blue-900 font-bold text-xl">Administrator's panel > Control requests</p>
            <h1 class="decorative-font text-2xl lg:text-4xl py-8">Hello, <span class="text-blue-900 font-bold">Admin!</span></h1>
            <h1 class="mb-5">Total requests: <span class="text-blue-900 font-bold">{{ $requests->total()}}</span></h1>
        </div>
            
            @livewire("project-request-control")        

    </section>
@endsection