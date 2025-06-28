@php
    $currentSort = request('sort', 'asc');
    $nextSort = $currentSort === 'desc' ? 'asc' : 'desc';

    $query = array_merge(request()->query(), ['sort' => $nextSort]);
@endphp

<a href="{{ route(Route::currentRouteName(), $query) }}"
    title="Urutkan berdasarkan tanggal {{ $nextSort === 'desc' ? 'terbaru' : 'terlama' }}">
    <button class="flex items-center px-3 py-2 text-blue-600 border border-blue-200 rounded-lg bg-blue-50 hover:bg-blue-100">
        @if ($currentSort === 'desc')
            {{-- Icon Panah Turun --}}
            <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.19l3.71-3.96a.75.75 0 011.08 1.04l-4.25 4.54a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z"
                    clip-rule="evenodd" />
            </svg>
        @else
            {{-- Icon Panah Naik --}}
            <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.81l-3.71 3.96a.75.75 0 01-1.08-1.04l4.25-4.54a.75.75 0 011.08 0l4.25 4.54a.75.75 0 01-.02 1.06z"
                    clip-rule="evenodd" />
            </svg>
        @endif
        <span class="text-sm font-semibold">Sortir</span>
    </button>
</a>
