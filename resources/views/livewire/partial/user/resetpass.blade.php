<div>
    <input type="checkbox" id="resetpassmodal" class="modal-toggle" wire:model="show" />
    <div class="modal">
        @if ($user)
            <form class="modal-box" wire:submit.prevent="simpan">
                <h3 class="font-bold text-lg">Reset password user</h3>
                <p class="py-4">Anda yakin akan mereset password user : <b>{{ $user->name }}</b> menjadi
                    <b><q><i>password123</i></q></b>?
                </p>
                <div class="modal-action justify-between">
                    <label for="resetpassmodal" class="btn">Close</label>
                    <button type="submit" class="btn">Ya</button>
                </div>
            </form>
        @endif
    </div>
</div>
