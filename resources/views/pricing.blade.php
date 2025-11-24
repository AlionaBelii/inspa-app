@extends("layout")
@section("main")
    <div>
        <h1 class="decorative-font text-4xl py-10 text-center">Pricing</h1>

        <div class="flex flex-col gap-16">
            <div>
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <h1 class="font-bold text-gray-200 text-[60pt] md:text-[120pt] md:ml-[200px]">UI/UX</h1>
                    <div class="max-h-[500px] max-w-[500px]">
                        <img class="object-fit h-full" src="{{ asset('storage/pricing/uiux_category.png') }}" alt="">
                    </div>
                </div>
                <div class="p-5 lg:p-10 bg-gray-800 rounded-md gap-10 grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 w-full">
                    @foreach ($uiuxDetails as $category)
                        @foreach ($category->subcategories as $subcategory)
                        @php
                            $isFirst = $loop->first;
                            $bgColorClass = $isFirst ? 'bg-blue-900 text-white' : 'bg-white text-gray-800';
                            $bg2ColorClass = $isFirst ? 'bg-white text-gray-800' : 'bg-blue-900 text-white';
                        @endphp
                        <div class="p-4 lg:p-8 rounded-md {{ $bgColorClass }} aspect-square flex flex-col justify-between">
                            <h2 class="font-bold text-xl lg:text-2xl">{{ $subcategory->name_en }}</h2>
                            <p class="{{ $bg2ColorClass }} rounded-md p-2 lg:p-4 text-[12px] lg:text-xl font-bold self-end"> €{{ $subcategory->price_min }} - €{{ $subcategory->price_max }} </p>
                        </div>
                        @endforeach
                    @endforeach
                </div>
            </div>

            <div>
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <h1 class="font-bold text-gray-200 text-[40pt] md:text-[80pt] md:ml-[200px]">Illustration</h1>
                    <div class="max-h-[500px] max-w-[500px]">
                        <img class="object-fit h-full" src="{{ asset('storage/pricing/illustration_category.png') }}" alt="">
                    </div>
                </div>
                <div class="p-5 lg:p-10 bg-gray-800 rounded-md gap-10 grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 w-full">
                    @foreach ($illustrationDetails as $category)
                        @foreach ($category->subcategories as $subcategory)
                        @php
                            $isFirst = $loop->first;
                            $bgColorClass = $isFirst ? 'bg-blue-900 text-white' : 'bg-white text-gray-800';
                            $bg2ColorClass = $isFirst ? 'bg-white text-gray-800' : 'bg-blue-900 text-white';
                        @endphp
                        <div class="p-4 lg:p-8 rounded-md {{ $bgColorClass }} aspect-square flex flex-col justify-between">
                            <h2 class="font-bold text-xl lg:text-2xl">{{ $subcategory->name_en }}</h2>
                            <p class="{{ $bg2ColorClass }} rounded-md p-2 lg:p-4 text-[12px] lg:text-xl font-bold self-end"> €{{ $subcategory->price_min }} - €{{ $subcategory->price_max }} </p>
                        </div>
                        @endforeach
                    @endforeach
                </div>
            </div>

            <div>
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <h1 class="font-bold text-gray-200 text-[40pt] md:text-[80pt] md:ml-[200px]">Motion Video</h1>
                    <div class="max-h-[500px] max-w-[500px]">
                        <img class="object-fit h-full" src="{{ asset('storage/pricing/motionvideo_category.png') }}" alt="">
                    </div>
                </div>
                <div class="p-5 lg:p-10 bg-gray-800 rounded-md gap-10 grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 w-full">
                    @foreach ($motionDetails as $category)
                        @foreach ($category->subcategories as $subcategory)
                        @php
                            $isFirst = $loop->first;
                            $bgColorClass = $isFirst ? 'bg-blue-900 text-white' : 'bg-white text-gray-800';
                            $bg2ColorClass = $isFirst ? 'bg-white text-gray-800' : 'bg-blue-900 text-white';
                        @endphp
                        <div class="p-4 lg:p-8 rounded-md {{ $bgColorClass }} aspect-square flex flex-col justify-between">
                            <h2 class="font-bold text-xl lg:text-2xl">{{ $subcategory->name_en }}</h2>
                            <p class="{{ $bg2ColorClass }} rounded-md p-2 lg:p-4 text-[12px] lg:text-xl font-bold self-end"> €{{ $subcategory->price_min }} - €{{ $subcategory->price_max }} </p>
                        </div>
                        @endforeach
                    @endforeach
                </div>
            </div>

            <div>
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <h1 class="font-bold text-gray-200 text-[40pt] md:text-[80pt] md:ml-[200px]">Branding</h1>
                    <div class="max-h-[500px] max-w-[500px]">
                        <img class="object-fit h-full" src="{{ asset('storage/pricing/branding_category.png') }}" alt="">
                    </div>
                </div>
                <div class="p-5 lg:p-10 bg-gray-800 rounded-md gap-10 grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 w-full">
                    @foreach ($brandingDetails as $category)
                        @foreach ($category->subcategories as $subcategory)
                        @php
                            $isFirst = $loop->first;
                            $bgColorClass = $isFirst ? 'bg-blue-900 text-white' : 'bg-white text-gray-800';
                            $bg2ColorClass = $isFirst ? 'bg-white text-gray-800' : 'bg-blue-900 text-white';
                        @endphp
                        <div class="p-4 lg:p-8 rounded-md {{ $bgColorClass }} aspect-square flex flex-col justify-between">
                            <h2 class="font-bold text-xl lg:text-2xl">{{ $subcategory->name_en }}</h2>
                            <p class="{{ $bg2ColorClass }} rounded-md p-2 lg:p-4 text-[12px] lg:text-xl font-bold self-end"> €{{ $subcategory->price_min }} - €{{ $subcategory->price_max }} </p>
                        </div>
                        @endforeach
                    @endforeach
                </div>
            </div>

            <div>
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <h1 class="font-bold text-gray-200 text-[40pt] md:text-[80pt] md:ml-[200px]">3D Design</h1>
                    <div class="max-h-[500px] max-w-[500px]">
                        <img class="object-fit h-full" src="{{ asset('storage/pricing/3d_category.png') }}" alt="">
                    </div>
                </div>
                <div class="p-5 lg:p-10 bg-gray-800 rounded-md gap-10 grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 w-full">
                    @foreach ($design3Details as $category)
                        @foreach ($category->subcategories as $subcategory)
                        @php
                            $isFirst = $loop->first;
                            $bgColorClass = $isFirst ? 'bg-blue-900 text-white' : 'bg-white text-gray-800';
                            $bg2ColorClass = $isFirst ? 'bg-white text-gray-800' : 'bg-blue-900 text-white';
                        @endphp
                        <div class="p-4 lg:p-8 rounded-md {{ $bgColorClass }} aspect-square flex flex-col justify-between">
                            <h2 class="font-bold text-xl lg:text-2xl">{{ $subcategory->name_en }}</h2>
                            <p class="{{ $bg2ColorClass }} rounded-md p-2 lg:p-4 text-[12px] lg:text-xl font-bold self-end"> €{{ $subcategory->price_min }} - €{{ $subcategory->price_max }} </p>
                        </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection