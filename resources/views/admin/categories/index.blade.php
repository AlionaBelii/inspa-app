@extends("layout")
@section("main")
    <section>
       <div class="flex flex-col gap-2">
            <p class="uppercase text-blue-900 font-bold text-xl">Administrator's panel > Control categories</p>
            <h1 class="decorative-font text-2xl lg:text-4xl py-8">Hello, <span class="text-blue-900 font-bold">Admin!</span></h1>
        </div>

        <div class="px-5 py-8 border-t-2 border-solid border-gray-300 bg-white flex flex-col gap-3">
            <h2 class="text-blue-900 font-bold text-m">Change category:</h2>
            <form method="post" action=" {{ route('updateCategory') }}" class="flex gap-3 flex-wrap">
                @csrf

                <div class="flex flex-col gap-2 self-end">
                    <label for="category_id">Select category:</label>
                
                    <select name="category_id" id="category_id" class="border border-gray-300 rounded-md p-4 self-start">
                    @forelse ($categories as $category)
                    
                        <option value="{{ $category['id'] }}" class="flex gap-4 items-center">
                            <span>[{{ $category->title_en }}]</span>
                        </option>
                    @empty
                        <option value="" disabled>No categories.</option>
                    @endforelse
                    </select>
                </div>
                <div class="flex flex-col gap-2 self-end">
                    <label for="title_en">Name in english:</label>
                        <input type="text" name="title_en" placeholder="EN" class="border border-gray-300 rounded-md p-4 self-start">
                </div>
                <div class="flex flex-col gap-2 self-end">
                    <label for="title_en">Name in russian:</label>
                        <input type="text" name="title_ru" placeholder="RU" class="border border-gray-300 rounded-md p-4 self-start">
                </div>
                <button class="blue-btn self-end" type="submit">Update category</button>
            </form>
            @if (session('category_success'))
                <p class="text-blue-500">{{ session('category_success') }}</p>
            @endif
        </div>
        
        <div class="px-5 py-8 border-t-2 border-solid border-gray-300 bg-white flex flex-col gap-3">
            <h2 class="text-blue-900 font-bold text-m">Change subcategory:</h2>
            <form method="post" action=" {{ route('updateSubcategory') }} " class="flex flex-col gap-3 flex-wrap">
                @csrf

                <div class="flex flex-col gap-2 self-start">
                    <label for="subcategory_id">Select subcategory:</label>
                
                    <select name="subcategory_id" id="subcategory_id" class="border border-gray-300 rounded-md p-4 self-start">
                    @forelse ($subcategories as $subcategory)
                    
                        <option value="{{ $subcategory['id'] }}" class="flex gap-4 items-center">
                            <span>[{{ $subcategory->name_en }}]</span>
                            <span>[{{ $subcategory->price_min }}]</span>
                            <span>[{{ $subcategory->price_max }}]</span>
                        </option>
                    @empty
                        <option value="" disabled>No subcategories.</option>
                    @endforelse
                    </select>
                </div>
                <div class="flex gap-3 flex-wrap">
                    <div class="flex flex-col gap-2 self-end">
                    <label for="name_en">Name in english:</label>
                        <input type="text" name="name_en" placeholder="EN" class="border border-gray-300 rounded-md p-4 self-start">
                    </div>
                    <div class="flex flex-col gap-2 self-end">
                        <label for="name_en">Name in russian:</label>
                            <input type="text" name="name_ru" placeholder="RU" class="border border-gray-300 rounded-md p-4 self-start">
                    </div>
                    <div class="flex flex-col gap-2 self-end">
                        <label for="name_en">Minimum price:</label>
                            <input type="text" name="price_min" placeholder="Min" class="border border-gray-300 rounded-md p-4 self-start">
                    </div>
                    <div class="flex flex-col gap-2 self-end">
                        <label for="name_en">Maximum price:</label>
                            <input type="text" name="price_max" placeholder="Max" class="border border-gray-300 rounded-md p-4 self-start">
                    </div>
                    <button class="blue-btn self-end" type="submit">Update subcategory</button>
                </div>
            </form>
            @if (session('subcategory_success'))
                <p class="text-blue-500">{{ session('subcategory_success') }}</p>
            @endif
        </div>

        <div class="px-5 py-8 border-t-2 border-solid border-gray-300 bg-white flex flex-col gap-3">
            <h2 class="text-blue-900 font-bold text-m">Add subcategory:</h2>
            <form method="post" action=" {{ route('addSubcategory') }} " class="flex flex-col gap-3 flex-wrap">
                @csrf

                <div class="flex flex-col gap-2 self-start">
                    <label for="category_id">Select category to add in:</label>
                
                    <select name="category_id" id="category_id" class="border border-gray-300 rounded-md p-4 self-start">
                    @forelse ($categories as $category)
                    
                        <option value="{{ $category['id'] }}" class="flex gap-4 items-center">
                            <span>[{{ $category->title_en }}]</span>
                        </option>
                    @empty
                        <option value="" disabled>No categories.</option>
                    @endforelse
                    </select>
                </div>
                <div class="flex gap-3 flex-wrap">
                    <div class="flex flex-col gap-2 self-end">
                    <label for="name_en">Name in english:</label>
                        <input type="text" name="name_en" placeholder="EN" class="border border-gray-300 rounded-md p-4 self-start">
                    </div>
                    <div class="flex flex-col gap-2 self-end">
                        <label for="name_en">Name in russian:</label>
                            <input type="text" name="name_ru" placeholder="RU" class="border border-gray-300 rounded-md p-4 self-start">
                    </div>
                    <div class="flex flex-col gap-2 self-end">
                        <label for="name_en">Minimum price:</label>
                            <input type="text" name="price_min" placeholder="Min" class="border border-gray-300 rounded-md p-4 self-start">
                    </div>
                    <div class="flex flex-col gap-2 self-end">
                        <label for="name_en">Maximum price:</label>
                            <input type="text" name="price_max" placeholder="Max" class="border border-gray-300 rounded-md p-4 self-start">
                    </div>
                    <button class="blue-btn self-end" type="submit">Add subcategory</button>
                </div>
            </form>
            @if (session('add_subcategory_success'))
                <p class="text-blue-500">{{ session('add_subcategory_success') }}</p>
            @endif
        </div>
        
        <div class="px-5 py-8 border-t-2 border-solid border-gray-300 bg-white flex flex-col gap-3">
            <h2 class="text-blue-900 font-bold text-m">Delete subcategory:</h2>
            <form method="post" action=" {{ route('deleteSubcategory') }} " class="flex gap-3 flex-wrap">
                @csrf

                <div class="flex flex-col gap-2 self-start">
                    <label for="subcategory_id">Select category to delete:</label>
                
                    <select name="subcategory_id" id="subcategory_id" class="border border-gray-300 rounded-md p-4 self-start">
                    @forelse ($subcategories as $subcategory)
                    
                        <option value="{{ $subcategory['id'] }}" class="flex gap-4 items-center">
                            <span>[{{ $subcategory->name_en }}]</span>
                        </option>
                    @empty
                        <option value="" disabled>No categories.</option>
                    @endforelse
                    </select>
                </div>
                <button class="blue-btn self-end" type="submit">Delete subcategory</button>
            </form>
            @if (session('delete_subcategory_success'))
                <p class="text-blue-500">{{ session('delete_subcategory_success') }}</p>
            @endif
        </div>

    </section>
@endsection