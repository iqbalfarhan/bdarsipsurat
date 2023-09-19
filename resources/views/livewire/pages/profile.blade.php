<div class="fc6">
    <div>
        @livewire('partial.header', [
        "title" => "Edit profile",
        "subtitle" => "Ubah informasi login, update password dan photo",
        ])
    </div>
    <div class="card bg-base-100 w-full">
        <div class="card-body">
            <div class="flex flex-col lg:flex-row gap-6 items-center">
                <div class="avatar">
                    <div class="w-20 rounded-full">
                        <img src="{{ $user->gambar }}" />
                    </div>
                </div>
                
                <div>
                    <h2 class="card-title">{{ $user->name }}</h2>
                    <p>Sebagai {{ implode(', ', $user->getRoleNames()->toArray()) }}</p>
                </div>
            </div>
            
        </div>
    </div>
    
    <div class="grid lg:grid-cols-4 gap-6">
        <div>
            <ul class="menu">
                <li>
                    <h2 class="menu-title">Update profile</h2>
                    <ul>
                        <li><button class="{{ $halaman == 'login' ? 'active' : '' }}" wire:click.prevent="$set('halaman', 'login')">Update login info</button></li>
                        <li><button class="{{ $halaman == 'password' ? 'active' : '' }}" wire:click.prevent="$set('halaman', 'password')">Update password</button></li>
                        <li><button class="{{ $halaman == 'photo' ? 'active' : '' }}" wire:click.prevent="$set('halaman', 'photo')">Photo profile</button></li>
                    </ul>
                </li>
            </ul>
        </div>
        
        <div class="lg:col-span-3 fc6">
            <div class="card bg-base-100 w-full">
                <form class="card-body" wire:submit.prevent="simpan">
                    @if ($halaman == "login")
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">Nama lengkap</span>
                            @error('name')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="text" wire:model="name" class="input bg-base-200 shadow" placeholder="nama user">
                    </div>
                    
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">Username login</span>
                            @error('username')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="text" wire:model="username" class="input bg-base-200 shadow" placeholder="username">
                    </div>
                    @elseif ($halaman == "photo")
                    <div class="fc6">
                        <div class="avatar">
                            <div class="w-24 rounded-full">
                                @if ($gambar)
                                <img src="{{ $gambar->temporaryUrl() }}" />
                                @else
                                <img src="{{ $user->gambar }}">
                                @endif
                            </div>
                        </div>
                        <input type="file" class="file-input bg-base-200" wire:model='gambar'>
                    </div>
                    @elseif ($halaman == "password")
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Password lama</span>
                            @error('password_old')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="text" placeholder="Type here" class="input bg-base-200 w-full"
                        wire:model="password_old" />
                    </div>
                    
                    <div class="grid lg:grid-cols-2 gap-6">
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Password baru</span>
                                @error('password_new')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                                @enderror
                            </label>
                            <input type="text" placeholder="Type here" class="input bg-base-200 w-full"
                            wire:model="password_new" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Konfirmasi password baru</span>
                                @error('confirm-new')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                                @enderror
                            </label>
                            <input type="text" placeholder="Type here" class="input bg-base-200 w-full"
                            wire:model="confirm_new" />
                        </div>
                    </div>
                    @endif
                </form>
            </div>
            
            <div class="card bg-base-100">
                <div class="card-body">
                    <div class="card-actions">
                        <button class="btn btn-neutral" wire:click.prevent='simpan'>
                            @livewire('component.icon', ['name' => 'check'])
                            <span>simpan</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>