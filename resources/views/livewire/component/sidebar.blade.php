<ul class="menu p-4 w-80 h-full bg-base-100 text-base-content shadow space-y-6">
    <li>
        <h2 class="menu-title">Menu utama</h2>
        <ul>
            <li><a href="{{ route('home') }}">@livewire('component.icon', ['name' => 'home'])Dashboard</a></li>
            <li><a href="{{ route('surat') }}">@livewire('component.icon', ['name' => 'mail'])Semua surat</a></li>
            <li><a href="{{ route('createsurat') }}">@livewire('component.icon', ['name' => 'plus'])Tambah surat</a></li>
            <li><a href="{{ route('dokumentasi') }}">@livewire('component.icon', ['name' => 'search'])Dokumentasi</a></li>
        </ul>
    </li>

    <li>
        <h2 class="menu-title">Pengaturan</h2>
        <ul>
            <li>
                <a href="{{ route('setting.user') }}" class="{{ Route::is('setting.user') ? 'active' : '' }}">
                    @livewire('component.icon', ['name' => 'users'])
                    Pengaturan user
                </a>
            </li>
            <li>
                <a href="{{ route('setting.kategori') }}" class="{{ Route::is('setting.kategori') ? 'active' : '' }}">
                    @livewire('component.icon', ['name' => 'lists'])
                    Kategori & sub kategori
                </a>
            </li>
            <li>
                <a href="{{ route('setting.unit') }}" class="{{ Route::is('setting.unit') ? 'active' : '' }}">
                    @livewire('component.icon', ['name' => 'building'])
                    Unit departments
                </a>
            </li>
            <li>
                <a href="{{ route('setting.unit') }}" class="{{ Route::is('setting.unit') ? 'active' : '' }}">
                    @livewire('component.icon', ['name' => 'key'])
                    Role & permission
                </a>
            </li>
        </ul>
    </li>

    <li>
        <h2 class="menu-title">Pengaturan akun</h2>
        <ul>
            <li><a href="{{ route('profile') }}">@livewire('component.icon', ['name' => 'user'])Edit profile</a></li>
            <li><button wire:click="$emit('logout')">@livewire('component.icon', ['name' => 'logout'])Logout</button></li>
        </ul>
    </li>
</ul>
