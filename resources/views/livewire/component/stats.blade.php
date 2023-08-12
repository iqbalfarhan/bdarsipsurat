<div class="grid grid-cols-4 gap-4">
    <div class="stats">
        <div class="stat">
            <div class="stat-figure text-primary">
                @livewire('component.icon', ['name' => 'lists', 'class' => 'h-8 w-8'], key(uniqid()))
            </div>
            <div class="stat-title">Total kategori</div>
            <div class="stat-value text-primary">{{ \App\Models\Kategori::count() }}</div>
            <div class="stat-desc">{{ \App\Models\SubKategori::count() }} sub kategori</div>
        </div>
    </div>

    <div class="stats">
        <div class="stat">
            <div class="stat-figure text-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block w-8 h-8 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z">
                    </path>
                </svg>
            </div>
            <div class="stat-title">Jumlah surat</div>
            <div class="stat-value text-secondary">{{ \App\Models\Surat::count() }}</div>
            <div class="stat-desc">yang sudah diupload</div>
        </div>
    </div>

    <div class="stats col-span-2">
        <div class="stat">
            <div class="stat-figure text-secondary">
                <div class="avatar online">
                    <div class="w-16 rounded-full">
                        <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                    </div>
                </div>
            </div>
            <div class="stat-value">86%</div>
            <div class="stat-title">{{ auth()->user()->name }}</div>
            <div class="stat-desc text-secondary">{{ auth()->user()->username }}</div>
        </div>
    </div>
</div>
