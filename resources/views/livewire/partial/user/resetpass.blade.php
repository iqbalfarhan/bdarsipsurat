<div>
    <input type="checkbox" id="resetpassmodal" class="modal-toggle" wire:model="show" />
    <div class="modal">
        @if ($user)
            <form class="modal-box" wire:submit.prevent="simpan">
                <div class="space-y-6">
                    <h3 class="font-bold text-lg">Reset password user</h3>
                    <div>Anda yakin akan mereset password user : <b>{{ $user->name }}</b> menjadi
                        <b><q><i>password123</i></q></b>?
                    </div>
                    <div>setelah mereset password minta user untuk mengganti password dengan password yang aman</div>
                </div>
                <div class="modal-action justify-between">
                    <label for="resetpassmodal" class="btn">Close</label>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </form>
        @endif
    </div>
</div>
