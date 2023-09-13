<div class="navbar bg-neutral text-neutral-content shadow-sm">
    <div class="flex-none">
        <label for="drawer" class="btn btn-square btn-ghost lg:hidden">
            @livewire('component.icon', ['name' => 'menu'])
        </label>
    </div>
    <div class="flex-1">
        <a class="btn btn-ghost normal-case text-xl">{{ config('app.name') }}</a>
    </div>
    <div class="flex-none">

        <label for="search" class="btn btn-circle btn-ghost">
            @livewire('component.icon', ['name' => 'search'])
        </label>

        <!-- Put this part before </body> tag -->
        <input type="checkbox" id="search" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box">
                <div class="card-actions justify-between items-center">
                    <h3 class="font-bold text-lg">Pencarian surat</h3>
                    <label for="search" class="btn btn-ghost btn-circle btn-sm">
                        @livewire('component.icon', ['name' => 'x'])
                    </label>
                </div>
                <div class="py-4">
                    <input type="text" class="input bg-base-200 w-full" placeholder="Cari surat dengan perihal">
                </div>
            </div>
        </div>
    </div>
</div>
