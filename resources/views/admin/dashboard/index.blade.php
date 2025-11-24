@extends("layout")
@section("main")
    <section class="relative">
        <div class="absolute top-[-80px] right-0 xl:top-[-100px] xl:right-[0px] overflow:hidden z-1000">@livewire("animated-spinner")</div>
        <div>
            <p class="uppercase text-blue-900 font-bold text-xl">Administrator's panel</p>
        </div>
       <div x-data="{ showRoleModal: true }" class="flex flex-col gap-4">

            <div class="flex gap-5 items-center">

                <h1 class="decorative-font text-2xl lg:text-4xl py-8">Hello, <span class="text-blue-900 font-bold">Admin!</span></h1>
                
                <button @click="showRoleModal = !showRoleModal"><x-eva-settings-outline  class="text-blue-900 h-[50px]"/></button>

            </div>
            
            <div x-show="showRoleModal" class="p-5 bg-white rounded-md flex flex-col gap-3">
                <h2 class="text-blue-900 font-bold text-m">Change user's role:</h2>
                <form method="post" action="{{ route('updateRole') }}" class="flex gap-3">
                    @csrf
                    <div class="flex flex-col gap-2 self-end">
                        <label for="user_id">Select user:</label>
                    
                        <select name="user_id" id="user_id" class="border border-gray-300 rounded-md p-4 self-start">
                        @forelse ($allUsers as $user)
                        
                            <option value="{{ $user['id'] }}" class="flex gap-4 items-center">
                                <span>[{{ $user->role }}]</span>
                                <span>{{ $user->fullname }}</span>
                            </option>
                        @empty
                            <option value="" disabled>No users.</option>
                        @endforelse
                        </select>
                    </div>
                    <div class="flex flex-col gap-2 self-end">
                        <label for="role">Select role:</label>
                        <select name="role" id="role" class="border border-gray-300 rounded-md p-4 self-start">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <button class="blue-btn self-end" type="submit">Update role</button>
                </form>
                @if (session('success'))
                    <p class="text-blue-500">{{ session('success') }}</p>
                @endif
            </div>
       <div class="py-8 border-t-2 border-solid border-gray-300 flex flex-wrap gap-4">
                    <a class="blue-btn" href="{{ route('admin.categories.index') }}">Control categories</a>
                    <a class="blue-btn" href="{{ route('admin.workers.index') }}">Control designers</a>
                    <a class="blue-btn" href="{{ route('admin.requests.index') }}">Control requests</a>
                    <a class="blue-btn" href="{{ route('admin.articles.index') }}">Control articles</a>
            </div>
       <div class="flex flex-wrap gap-4">
            <div class="flex flex-col gap-2 p-4 border border-gray-300 rounded-md">
                <h4>Total users: <span class="text-blue-900 font-bold">{{ $totalUsers }}</span></h4>
            </div>
            <div class="flex flex-col gap-2 p-4 border border-gray-300 rounded-md">
                <h4>Total workers: <span class="text-blue-900 font-bold">{{ $totalWorkers }}</span></h4>
            </div>
            <div class="flex flex-col gap-2 p-4 border border-gray-300 rounded-md">
                <h4>Total projects: <span class="text-blue-900 font-bold">{{ $totalProjects }}</span></h4>
            </div>
            <div class="flex flex-col gap-2 p-4 border border-gray-300 rounded-md">
                <h4>Total categories: <span class="text-blue-900 font-bold">{{ $totalCategories }}</span></h4>
            </div>
            <div class="flex flex-col gap-2 p-4 border border-gray-300 rounded-md">
                <h4>Total subcategories: <span class="text-blue-900 font-bold">{{ $totalSubcategories }}</span></h4>
            </div>
            <div class="flex flex-col gap-2 p-4 border border-gray-300 rounded-md">
                <h4>Total articles: <span class="text-blue-900 font-bold">{{ $totalArticles}}</span></h4>
            </div>
            
       </div>
    </section>
@endsection