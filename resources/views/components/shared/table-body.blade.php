@props([
    'columns' => ['name', 'Email', 'Tenement'],
    // 'label' => 'sample table',
    'create_url' => null,
    'archived_url' => null,
])

<div class="w-full h-auto flex flex-col gap-2">
    <div class="w-full flex  items-center justify-between">
        {{-- <h1 class="text-2xl font-bold tex">{{ $label }}</h1> --}}
        <div class="flex items-center space-x-2">
            @if ($archived_url)
                <a href="{{ $archived_url }}" class="btn btn-sm btn-gray-200 text-primary">
                    <span>
                        <i class="fi fi-rr-box"></i>
                    </span>
                    <span>
                        Archived
                    </span>
                </a>
            @endif
            @if ($create_url)
                <a href="{{ $create_url }}" class="btn btn-sm btn-primary text-accent">
                    <span>
                        <i class="fi fi-rr-add"></i>
                    </span>
                    <span>
                        Create
                    </span>
                </a>
            @endif
        </div>

    </div>

    <div class="overflow-y-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <!-- head -->
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
             
                    @foreach ($columns as $column)
                        <th class="px-6 py-3">{{ $column }}</th>
                    @endforeach
          
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>
