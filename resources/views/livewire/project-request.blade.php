<section class="flex flex-col py-5 md:py-10">
        <div class="flex flex-col items-center gap-2">
            <h1 class="decorative-font text-2xl lg:text-4xl">Ready to Start your Project?</h1>
            <div class="w-full flex align-center justify-center">
                <h2 class="text-blue-900 font-bold text-center">We’d Love to Hear From You</h2>
            </div>
        </div>
        <div class="flex flex-col align-center justife-center md:py-7">
                       <form wire:submit.prevent="submitRequest" class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="flex flex-col gap-2">
                    <label class="text-blue-900 font-bold" for="fullname">Full name*</label>
                    <input type="text" class="border border-gray-300 rounded-md p-3" wire:model="fullname" placeholder="Full Name">
                    @error('fullname') 
                        <p class="text-blue-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-blue-900 font-bold" for="company_name">Company Name*</label>
                    <input type="text" class="border border-gray-300 rounded-md p-3" wire:model="company_name" placeholder="Company Name">
                    <span class="text-[10px] text-gray-400">*write “Personal” if you're not affiliated with any business.</span>
                    @error('company_name') 
                        <p class="text-blue-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-blue-900 font-bold" for="email">E-mail*</label>
                    <input type="text" class="border border-gray-300 rounded-md p-3" wire:model="email" placeholder="E-mail">
                    @error('email') 
                        <p class="text-blue-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-blue-900 font-bold" for="phonenumber">Phone number</label>
                    <input type="text" class="border border-gray-300 rounded-md p-3" wire:model="phonenumber" placeholder="Phone number">
                    @error('phonenumber') 
                        <p class="text-blue-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-blue-900 font-bold" for="project_type">Project Type / Category*</label>
                    <select wire:model="project_type" id="project_type" class="border border-gray-300 rounded-md p-3">
                        @forelse ($subcategories as $subcategory)
                        <option class="text-black" value="{{ $subcategory->id}}">{{ $subcategory->name_en}}</option>
                        @empty
                        <option class="text-black" value="">No category</option>
                        @endforelse
                    </select>
                    @error('project_type') 
                        <p class="text-blue-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-blue-900 font-bold" for="worker_id">Select designer</label>
                    <select wire:model="worker_id" id="worker_id" class="border border-gray-300 rounded-md p-3">
                        @forelse ($workers as $worker)
                        <option class="text-black" value="{{ $worker->id}}">[{{ $worker->category->title_en }}] {{ $worker->fullname_en}}</option>
                        @empty
                        <option class="text-black" value="">No designers.</option>
                        @endforelse
                    </select>
                    @error('worker_id') 
                        <p class="text-blue-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-blue-900 font-bold" for="prefered_deadline">Preferred Deadline*</label>
                    <input type="text" class="border border-gray-300 rounded-md p-3" wire:model="prefered_deadline" placeholder="2 weeks">
                    @error('prefered_deadline') 
                        <p class="text-blue-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-blue-900 font-bold" for="project_description">Project Description*</label>
                    <input type="text" class="border border-gray-300 rounded-md p-3" wire:model="project_description" placeholder="Describe your needs">
                    @error('project_description') 
                        <p class="text-blue-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-blue-900 font-bold" for="reference_file">Upload Files (references, guides, etc.)</label>
                    <div id="drop-area" class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md cursor-pointer transition duration-150 ease-in-out hover:border-blue-500 hover:bg-blue-50" onclick="document.getElementById('file_input_lw').click()">
                        <div id="file-upload-content" class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600 justify-center">
                               <span id="file-name" class="font-medium text-blue-600 hover:text-blue-500">
                                @if ($reference_file)
                                    File chosen: {{ $reference_file->getClientOriginalName() }}
                                @else 
                                    Drag and drop files or click to select
                                @endif 
                            </span>
                            <div wire:loading wire:target="reference_file" class="ml-3 text-sm font-semibold text-blue-500">
                                Loading...
                            </div>
                            </div>
                            <p class="text-xs text-gray-500">ZIP, PDF, JPG, PNG up to 10MB</p>
                        </div>
                    <input id="file_input_lw" wire:model="reference_file" type="file" class="sr-only" accept=".zip,.pdf,.jpg,.png">
                    </div>
                </div>
                @error('reference_file') 
                    <p class="text-blue-500 text-sm">{{ $message }}</p>
                @enderror
                <button type="submit" class="blue-btn self-end justify-self-end" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="submitRequest, reference_file">Send request</span>
                    <span wire:loading wire:target="submitRequest, reference_file">Sending...</span>
                </button>
                 @if ($successMessage)
                    <p class="text-blue-500">
                        {{ $successMessage }}
                    </p>
                 @endif
            </form>
        </div>
    </section>