<div class="flex flex-col gap-6">
    <div>Selamat datang, {{ auth()->user()->name }}</div>
    @livewire('component.stats')

    <div>Cari surat</div>
    <div class="card card-compact bg-base-100">
        <div class="flex justify-between px-4 py-1 items-center">
            <div class="text-sm breadcrumbs">
                <ul>
                    <li>
                        <a wire:click.prevent="resetkatsub">
                            @livewire('component.icon', ['name' => 'home'], key(uniqid()))
                            <span class="ml-2">Home</span>
                        </a>
                    </li>
                    @if ($kat)
                        <li>
                            <a wire:click.prevent="$set('sub', '')">
                                @livewire('component.icon', ['name' => 'folder'], key(uniqid()))
                                <span class="ml-2">{{ $katlabel }}</span>
                            </a>
                        </li>
                    @endif
                    @if ($sub)
                        <li>
                            <a>
                                @livewire('component.icon', ['name' => 'folder'], key(uniqid()))
                                <span class="ml-2">{{ $sublabel }}</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            <a href="" class="link text-sm">lihat semua</a>
        </div>
        <div class="divider m-0 p-0"></div>
        <ul class="menu">
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
