@extends("layout")
@section("main")
    <section>
       <div class="flex flex-col gap-2">
            <p class="uppercase text-blue-900 font-bold text-xl">Administrator's panel > articles</p>
            <h1 class="decorative-font text-2xl lg:text-4xl py-8">Hello, <span class="text-blue-900 font-bold">Admin!</span></h1>
        </div>

        <div class="px-5 py-8 border-t-2 border-solid border-gray-300 bg-white flex flex-col gap-3">
            <h2 class="text-blue-900 font-bold text-m">Add new article:</h2>
            <form method="post" action=" {{ route('addArticle') }}" enctype="multipart/form-data" class="flex flex-col gap-3">
                @csrf
                
                <div class="flex flex-col gap-2">
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
                        <label for="title_ru">Title in RU:</label>
                        <input type="text" name="title_ru" placeholder="RU" class="border border-gray-300 rounded-md p-4 self-start">
                    </div>
                    <div class="flex flex-col gap-2 self-end">
                        <label for="title_en">Title in EN:</label>
                        <input type="text" name="title_en" placeholder="RU" class="border border-gray-300 rounded-md p-4 self-start">
                    </div>
                    <div class="flex flex-col gap-2 self-end">
                        <label for="experience_years">Short description RU:</label>
                        <input type="text" name="sh_description_ru" placeholder="Short description RU" class="border border-gray-300 rounded-md p-4 self-start">
                    </div>
                    <div class="flex flex-col gap-2 self-end">
                        <label for="experience_years">Short description EN:</label>
                        <input type="text" name="sh_description_en" placeholder="Short description EN" class="border border-gray-300 rounded-md p-4 self-start">
                    </div>
                    <div class="flex flex-col gap-2 self-end">
                        <label for="description_ru">Description in RU:</label>
                        <input type="text" name="description_ru" placeholder="Description in RU" class="border border-gray-300 rounded-md p-4 self-start">
                    </div>
                    <div class="flex flex-col gap-2 self-end">
                        <label for="description_ru">Description in EN:</label>
                        <input type="text" name="description_en" placeholder="Description in EN" class="border border-gray-300 rounded-md p-4 self-start">
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="description_ru">Article's photo:</label>
                    <div id="drop-area" class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md cursor-pointer transition duration-150 ease-in-out hover:border-blue-500 hover:bg-blue-50" onclick="document.getElementById('photo_file').click()">
                        <div id="file-upload-content" class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600 justify-center">
                                <span id="file-name-display" class="font-medium text-blue-600 hover:text-blue-500">Drag and drop files or click to select</span>
                            </div>
                            <p class="text-xs text-gray-500">ZIP, PDF, JPG, PNG up to 2MB</p>
                        </div>
                    <input id="photo_file" name="filename" type="file" class="sr-only" accept=".zip,.pdf,.jpg,.png" onchange="document.getElementById('file-name-display').textContent = this.files[0].name">
                    @error('filename') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                
                <button class="blue-btn self-start" type="submit">Add article</button>
            </form>
            @if (session('add_article_success'))
                <p class="text-blue-500">{{ session('add_article_success') }}</p>
            @endif
        </div>

        
        
    </section>
@endsection