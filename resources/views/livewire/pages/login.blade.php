<form wire:submit.prevent="submit" class="flex flex-col gap-4">

    <img src="{{ Storage::url('simpatik logo.png') }}" alt="" class="w-24 self-center">
    <div class="">
        <h3 class="text-lg font-bold">Login aplikasi</h3>
        <span class="text-sm">Silakan masuk aplikasi menggunakan username dan password yang sudah terdaftar</span>
    </div>

    <div class="py-4 flex flex-col gap-2">
        <input type="text" wire:model="username"
            class="input w-full bg-base-200 shadow @error('username') input-error @enderror" placeholder="Username">
        <input type="password" wire:model="password"
            class="input w-full bg-base-200 shadow @error('password') input-error @enderror" placeholder="Password">
    </div>

    <div class="card-actions">
        <button type="submit" class="btn btn-block btn-neutral">login</button>
    </div>
</form>
