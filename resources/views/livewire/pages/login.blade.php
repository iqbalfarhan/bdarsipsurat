<form wire:submit.prevent="submit" class="flex flex-col gap-4 lg:px-8">
    <div class="text-center fc4">
        <img src="{{ url('images/simpatik logo.png') }}" alt="" class="w-24 self-center flex lg:hidden" />
        <div class="text-center">
            <h3 class="text-3xl">{{ config('app.name') }}</h3>
            <span class="text-sm">{{ config('app.desc') }}</span>
        </div>
    </div>

    <div class="py-4 flex flex-col gap-3">
        <div class="form-control">
            <label for="" class="label">
                <span class="label-text">Username</span>
                @error('username')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </label>
            <input type="text" wire:model="username" class="input w-full bg-base-200 shadow @error('username') input-error @enderror" placeholder="Username">
        </div>
        <div class="form-control">
            <label for="" class="label">
                <span class="label-text">Password</span>
                @error('password')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </label>
            <input type="password" wire:model="password" class="input w-full bg-base-200 shadow @error('password') input-error @enderror" placeholder="Password">
        </div>
    </div>

    <div class="card-actions">
        <button type="submit" class="btn btn-block btn-neutral">login</button>
    </div>
</form>
