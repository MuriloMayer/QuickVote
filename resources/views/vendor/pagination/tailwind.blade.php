@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">

            <div>
                <span class="fixed bottom-6 left-1/2 -translate-x-1/2 ">
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="px-4 py-2 text-sm font-medium text-gray-700 bg-white cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="px-4 py-0  font-semibold text-black border-b-2 border-black cursor-default ">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="px-4 py-0 font-medium text-black " aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </span>
        </div>
    </nav>
@endif
