<ul class="menu p-4 w-80 h-full bg-base-100 text-base-content shadow space-y-6">
    {{-- <div class="flex justify-center gap-4">
        <img src="{{ Storage::url('simpatik logo.png') }}" alt="" class="w-10 self-center">
        <div class="flex flex-col justify-center">
            <span class="text-lg">{{ config('app.name') }}</span>
            <span class="text-xs overflow-ellipsis small">Sistem informasi</span>
        </div>
    </div> --}}
    <li>
        <h2 class="menu-title">Menu utama</h2>
        <ul>
            <li><a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">@livewire('component.icon', ['name' => 'home'])Dashboard</a></li>
            @can('surat.index')
            <li><a href="{{ route('surat') }}" class="{{ Route::is(['surat', 'detailsurat']) ? 'active' : '' }}">@livewire('component.icon', ['name' => 'mail'])Semua surat</a></li>
            @endcan
            @can('surat.create')
            <li><a href="{{ route('createsurat') }}" class="{{ Route::is('createsurat') ? 'active' : '' }}">@livewire('component.icon', ['name' => 'plus'])Tambah surat</a></li>
            @endcan
            <li><a href="{{ route('dokumentasi') }}" class="{{ Route::is('dokumentasi') ? 'active' : '' }}">@livewire('component.icon', ['name' => 'search'])Dokumentasi</a></li>
        </ul>
    </li>

    @can('pengaturan.menu')
    <li>
        <h2 class="menu-title">Pengaturan</h2>
        <ul>
            @can('user.index')
            <li>
                <a href="{{ route('setting.user') }}" class="{{ Route::is('setting.user') ? 'active' : '' }}">
                    @livewire('component.icon', ['name' => 'users'])
                    Pengaturan user
                </a>
            </li>
            @endcan
            @can('kategori.index')
            <li>
                <a href="{{ route('setting.kategori') }}" class="{{ Route::is('setting.kategori') ? 'active' : '' }}">
                    @livewire('component.icon', ['name' => 'tag'])
                    Kategori & sub kategori
                </a>
            </li>
            @endcan
            @can('unit.index')
            <li>
                <a href="{{ route('setting.unit') }}" class="{{ Route::is('setting.unit') ? 'active' : '' }}">
                    @livewire('component.icon', ['name' => 'building'])
                    Unit departments
                </a>
            </li>
            @endcan
            @can('permission.index')
            <li>
                <a href="{{ route('setting.role') }}" class="{{ Route::is('setting.role') ? 'active' : '' }}">
                    @livewire('component.icon', ['name' => 'key'])
                    Role & permission
                </a>
            </li>
            @endcan
        </ul>
    </li>
    @endcan

    <li>
        <h2 class="menu-title">Pengaturan akun</h2>
        <ul>
            <li>
                <a href="{{ route('profile') }}" class="{{ Route::is('profile') ? 'active' : '' }}">
                    @livewire('component.icon', ['name' => 'user'])
                    Edit profile
                </a>
            </li>
            <li><button wire:click="$emit('logout')">@livewire('component.icon', ['name' => 'logout'])Logout</button></li>
        </ul>
    </li>
</ul>
