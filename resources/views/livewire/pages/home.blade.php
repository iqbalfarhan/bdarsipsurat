<div class="flex flex-col gap-6">
    {{-- <div>Selamat datang, {{ auth()->user()->name }}</div> --}}
    @livewire('component.stats')
    
    <div class="card bg-base-100">
        <div class="card-body">
            <div class="tabs space-y-3">
                @foreach ($kategories as $katid => $katname)
                    <a class="tab tab-lg tab-lifted {{ $kat == $katid ? "tab-active" : "" }}"
                    wire:click.prevent="setkat('{{ $katid }}', '{{ $katname }}')">{{ $katname }}</a>
                @endforeach
            </div>
            <ul class="menu bg-base-100">
                @if ($sub)
                @foreach ($surats as $suratid => $perihal)
                <li>
                    <a
                    href="{{ route('detailsurat', $suratid) }}">@livewire('component.icon', ['name' => 'mail'], key(uniqid())){{ Str::limit($perihal, 50) }}</a>
                </li>
                @endforeach
                @elseif ($kat)
                @foreach ($subkategories as $subid => $subname)
                <li>
                    <button
                    wire:click.prevent="setsub('{{ $subid }}', '{{ $subname }}')">@livewire('component.icon', ['name' => 'folder'], key(uniqid())){{ Str::limit($subname, 50) }}</button>
                </li>
                @endforeach
                @else
                @foreach ($kategories as $katid => $katname)
                <li>
                    <button
                    wire:click.prevent="setkat('{{ $katid }}', '{{ $katname }}')">@livewire('component.icon', ['name' => 'folder'], key(uniqid())){{ Str::limit($katname, 50) }}</button>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
