<div class="text-center">
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            <div class="flex gap-2">
                {{-- Previous Page Link --}}
                @if (!$paginator->onFirstPage())
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="btn btn-sm btn-link">
                        << Anterior
                    </button>
                @endif

                {{-- First Page Link --}}
                @if ($paginator->currentPage() > 3)
                    <button wire:click="gotoPage(1)" class="btn btn-sm btn-link">1</button>
                @endif

                {{-- "Three Dots" Separator Before Current Page --}}
                @if ($paginator->currentPage() > 4)
                    <span class="px-4 py-2">...</span>
                @endif

                {{-- Two Pages Before Current Page --}}
                @foreach(range(2, 1) as $i)
                    @if ($paginator->currentPage() - $i > 0)
                        <button wire:click="gotoPage({{ $paginator->currentPage() - $i }})" class="btn btn-sm btn-link">
                            {{ $paginator->currentPage() - $i }}
                        </button>
                    @endif
                @endforeach

                {{-- Current Page --}}
                <span class="btn btn-sm btn-primary">{{ $paginator->currentPage() }}</span>

                {{-- Two Pages After Current Page --}}
                @foreach(range(1, 2) as $i)
                    @if ($paginator->currentPage() + $i <= $paginator->lastPage())
                        <button wire:click="gotoPage({{ $paginator->currentPage() + $i }})" class="btn btn-sm btn-link">
                            {{ $paginator->currentPage() + $i }}
                        </button>
                    @endif
                @endforeach

                {{-- "Three Dots" Separator After Current Page --}}
                @if ($paginator->currentPage() < $paginator->lastPage() - 3)
                    <span class="px-4 py-2">...</span>
                @endif

                {{-- Last Page Link --}}
                @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                    <button wire:click="gotoPage({{ $paginator->lastPage() }})" class="btn btn-sm btn-link">{{ $paginator->lastPage() }}</button>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="btn btn-sm btn-link">
                        Siguiente >>
                    </button>
                @endif
            </div>
        </nav>
    @endif
</div>
