<div class="grid grid-cols-3 gap-6">
    <div class="card bg-base-100">
        <form class="card-body" wire:submit.prevent="simpan">
            <div class="flex flex-col gap-3">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Nama lengkap</span>
                    </label>
                    <input type="text" wire:model="name" class="input bg-base-200 shadow" placeholder="nama user">
                </div>
                @error('name')
                    {{ $message }}
                @enderror

                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Username login</span>
                    </label>
                    <input type="text" wire:model="username" class="input bg-base-200 shadow" placeholder="username">
                </div>
                @error('username')
                    {{ $message }}
                @enderror
            </div>
            <div class="divider"></div>

            <div class="card-action">
                <button type="submit" class="btn btn-primary">simpan</button>
            </div>
        </form>
    </div>

    <div class="card bg-base-100">
        <form class="card-body" wire:submit.prevent="gantipass">
            <div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Password lama</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input bg-base-200 w-full"
                        wire:model="password_old" />
                </div>
                @error('password_old')
                    {{ $message }}
                @enderror
            </div>

            <div class="flex flex-col gap-3">
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Password baru</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input bg-base-200 w-full"
                        wire:model="password_new" />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Konfirmasi password baru</span>
                    </label>
                    <input type="text" placeholder="Type here" class="input bg-base-200 w-full"
                        wire:model="confirm_new" />
                </div>
                @error('password_new')
                    {{ $message }}
                @enderror
                @error('confirm_new')
                    {{ $message }}
                @enderror
            </div>
            <div class="divider"></div>
            <div class="card-actions">
                <button class="btn btn-primary">ganti password</button>
            </div>
        </form>
    </div>
</div>
