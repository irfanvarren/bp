
@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li class="page-item">
                <span onclick="getSK({{ $paginator->currentPage() - 1 }},'{{isset($type) ? $type : ''}}')" class="page-link" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</span>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled page-item" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active page-item" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><span class="page-link" onclick="getSK({{ $page }},'{{isset($type) ? $type : ''}}')">{{ $page }}</span></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <span onclick="getSK({{ $paginator->currentPage() + 1 }},'{{isset($type) ? $type : ''}}')" class="page-link" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</span>
            </li>
        @else
            <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true" class="page-link">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif

