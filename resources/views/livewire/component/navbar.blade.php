<div class="navbar bg-neutral text-neutral-content shadow-sm">
    <div class="flex-none">
        <label for="drawer" class="btn btn-square btn-ghost lg:hidden">
            <x-tabler-align-left />
        </label>
    </div>
    <div class="flex-1">
        <a class="btn btn-ghost normal-case text-xl">{{ config('app.name') }}</a>
    </div>
    <div class="flex-none">
        <label for="search" class="btn btn-circle btn-ghost">
            <x-tabler-search />
        </label>
        
        <input type="checkbox" id="search" class="modal-toggle" />
        <div class="modal text-base-content">
            <div class="modal-box">
                <div class="card-actions justify-between items-center">
                    <h3 class="card-title">Pencarian</h3>
                    <label for="search" class="btn btn-ghost btn-circle btn-sm">
                        <x-tabler-x />
                    </label>
                    
                </div>
                <div class="py-4 flex flex-col gap-4">
                    <input type="text" class="input bg-base-200 w-full" placeholder="Cari surat dengan perihal" wire:model.lazy='cari' />
                    
                    @if (count($surat) != 0)
                    <ul class="menu w-full truncate">
                        <li>
                            <h2 class="menu-title">Hasil pencarian surat</h2>
                            <ul>
                                @foreach ($surat as $surat_id => $perihal)
                                <li><a href="{{ route('detailsurat', $surat_id) }}" class="truncate">{{ $perihal }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    @endif
                    
                    @if (count($user) != 0)
                    <ul class="menu w-full truncate">
                        <li>
                            <h2 class="menu-title">Hasil pencarian user</h2>
                            <ul>
                                @foreach ($user as $user_id => $name)
                                <li><a href="">{{ $name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>