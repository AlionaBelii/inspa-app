@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between w-full max-w-xl">
        <div class="flex flex-1 items-center justify-between">
            
            {{-- Информация о текущих элементах --}}
            <div class="hidden sm:block">
                <p class="text-sm text-gray-700 leading-5">
                    {!! __('Showing') !!}
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            {{-- Кнопки навигации --}}
            <div class="flex items-center space-x-2">
                
                {{-- 1. Кнопка "Previous" --}}
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-500 cursor-default leading-5 opacity-50 shadow-sm">
                        {!! __('Previous') !!}
                    </span>
                @else
                    {{-- Используем wire:click для Livewire --}}
                    <button 
                        wire:click="previousPage('{{ $paginator->getPageName() }}')" 
                        wire:loading.attr="disabled" 
                        rel="prev" 
                        class="relative inline-flex items-center rounded-lg border border-blue-600 bg-white px-3 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50 focus:outline-none focus:border-blue-700 focus:ring-1 focus:ring-blue-500 leading-5 transition ease-in-out duration-150 shadow-md"
                    >
                        {!! __('Previous') !!}
                    </button>
                @endif

                {{-- 2. Элементы страниц (номера) --}}
                @foreach ($paginator->elements() as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                {{-- Активная страница (синий фон) --}}
                                <span class="relative inline-flex items-center rounded-lg border border-blue-600 bg-blue-600 px-3 py-2 text-sm font-medium text-white cursor-default leading-5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-lg">
                                    {{ $page }}
                                </span>
                            @else
                                {{-- Неактивная страница --}}
                                <button 
                                    wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" 
                                    class="relative inline-flex items-center rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 hover:border-blue-600 focus:outline-none focus:border-blue-300 focus:ring-1 focus:ring-blue-500 leading-5 transition ease-in-out duration-150 shadow-sm"
                                >
                                    {{ $page }}
                                </button>
                            @endif
                        @endforeach
                    @elseif (is_string($element))
                        {{-- Эллипсис (...) --}}
                        <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 cursor-default leading-5">
                            {{ $element }}
                        </span>
                    @endif
                @endforeach

                {{-- 3. Кнопка "Next" --}}
                @if ($paginator->hasMorePages())
                    <button 
                        wire:click="nextPage('{{ $paginator->getPageName() }}')" 
                        wire:loading.attr="disabled" 
                        rel="next" 
                        class="relative inline-flex items-center rounded-lg border border-blue-600 bg-white px-3 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50 focus:outline-none focus:border-blue-700 focus:ring-1 focus:ring-blue-500 leading-5 transition ease-in-out duration-150 shadow-md"
                    >
                        {!! __('Next') !!}
                    </button>
                @else
                    <span class="relative inline-flex items-center rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-500 cursor-default leading-5 opacity-50 shadow-sm">
                        {!! __('Next') !!}
                    </span>
                @endif
            </div>
        </div>
    </nav>
@endif