<nav role="navigation" aria-label="{{ __('Pagination') }}" class="flex-1 flex flex-col items-center justify-between space-y-4">
    {{-- Ссылки на страницы --}}
    <div>
        @if ($paginator->hasPages())
            <span class="relative z-0 inline-flex shadow-sm rounded-md">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium border border-gray-300 cursor-default leading-5 rounded-l-md bg-gray-100 text-gray-500">
                            {!! __('pagination.previous') !!}
                        </span>
                    </span>
                @else
                    {{-- Кнопка "Назад" - тёмно-синяя (С ИМЕНЕМ ПАГИНАТОРА) --}}
                    <button wire:click="previousPage('newRequestPage')" wire:loading.attr="disabled" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium border border-gray-300 leading-5 rounded-l-md text-white transition ease-in-out duration-150 bg-blue-900 hover:bg-blue-700 focus:outline-none focus:ring ring-blue-300 active:bg-blue-800">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span aria-disabled="true">
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium border border-gray-300 cursor-default leading-5 text-gray-700">{{ $element }}</span>
                        </span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page">
                                    {{-- АКТИВНАЯ КНОПКА: Тёмно-синий фон, белый текст (ИСПРАВЛЕНО) --}}
                                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold border border-blue-900 leading-5 text-white bg-blue-900 focus:outline-none focus:ring ring-blue-300 transition ease-in-out duration-150">
                                        {{ $page }}
                                    </span>
                                @else
                                    {{-- НЕАКТИВНАЯ КНОПКА: Белый фон, тёмно-синий текст. Клик! (С ИМЕНЕМ ПАГИНАТОРА) --}}
                                    <button wire:click="gotoPage({{ $page }}, 'newRequestPage')" class="relative inline-flex items-center px-4 py-2 text-sm font-medium border border-gray-300 leading-5 text-blue-900 bg-white hover:text-white hover:bg-blue-700 focus:outline-none focus:ring ring-blue-300 focus:text-white transition ease-in-out duration-150">
                                        {{ $page }}
                                    </button>
                                @endif
                            @endforeach
                        </span>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    {{-- Кнопка "Вперед" - тёмно-синяя (С ИМЕНЕМ ПАГИНАТОРА) --}}
                    <button wire:click="nextPage('newRequestPage')" wire:loading.attr="disabled" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium border border-gray-300 leading-5 rounded-r-md text-white transition ease-in-out duration-150 bg-blue-900 hover:bg-blue-700 focus:outline-none focus:ring ring-blue-300 active:bg-blue-800">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium border border-gray-300 cursor-default leading-5 rounded-r-md bg-gray-100 text-gray-500">
                            {!! __('pagination.next') !!}
                        </span>
                    </span>
                @endif
            </span>
        @endif
    </div>
        {{-- Информация о текущей странице (1 to 4 of 4) --}}
    <div>
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
</nav>