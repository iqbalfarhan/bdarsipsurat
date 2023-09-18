<div class="grid lg:grid-cols-3 gap-6">
    <div class="stats shadow">
        <div class="stat">
            <div class="stat-figure">
                @livewire('component.icon', ['name' => 'lists', 'class' => 'h-8 w-8'], key(uniqid()))
            </div>
            <div class="stat-title">Total kategori</div>
            <div class="stat-value">{{ \App\Models\Kategori::count() }}</div>
            <div class="stat-desc">{{ \App\Models\SubKategori::count() }} sub kategori</div>
        </div>
    </div>

    <div class="stats shadow">
        <div class="stat">
            <div class="stat-title">Jumlah surat</div>
            <div class="stat-value">{{ \App\Models\Surat::count() }}</div>
            <div class="stat-desc">yang sudah diupload</div>
        </div>
    </div>

    <div class="stats shadow">
        <div class="stat">
            <div class="stat-figure">
                <div class="avatar">
                    <div class="w-16 rounded-full">
                        <img src="{{ $user->gambar }}" />
                    </div>
                </div>
            </div>
            <div class="stat-value">{{ date('H:i') }}</div>
            <div class="stat-title">{{ $user->name }}</div>
            <div class="stat-desc">{{ implode(', ', $user->getRoleNames()->toArray()) }} {{ $user->unit->name ?? "" }}</div>
        </div>
    </div>
</div>
