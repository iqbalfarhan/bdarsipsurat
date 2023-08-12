<ul class="menu p-4 w-80 h-full bg-base-100 text-base-content shadow">

    <li class="menu-title">Menu</li>
    <li><a href="{{ route('home') }}">@livewire('component.icon', ['name' => 'home'])Dashboard</a></li>
    <li><a href="{{ route('surat') }}">@livewire('component.icon', ['name' => 'mail'])Semua surat</a></li>
    <li><a href="{{ route('createsurat') }}">@livewire('component.icon', ['name' => 'plus'])Tambah surat</a></li>
    <li>
        <details open>
            <summary>
                @livewire('component.icon', ['name' => 'cog'])
                Setting
            </summary>

            <ul>
                <li>
                    <a href="{{ route('setting.kategori') }}">
                        @livewire('component.icon', ['name' => 'lists'])
                        Kategori & sub kategori
                    </a>
                </li>
                <li>
                    <a href="{{ route('setting.unit') }}">
                        @livewire('component.icon', ['name' => 'building'])
                        Unit departments
                    </a>
                </li>
                <li>
                    <a href="{{ route('setting.user') }}">
                        @livewire('component.icon', ['name' => 'users'])
                        Pengaturan user
                    </a>
                </li>
            </ul>
        </details>
    </li>
    <li><a href="{{ route('profile') }}">@livewire('component.icon', ['name' => 'user'])Edit profile</a></li>
    <li><button wire:click="$emit('logout')">@livewire('component.icon', ['name' => 'logout'])Logout</button></li>
</ul>
