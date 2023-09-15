<div>
    <input type="checkbox" id="createRoleModal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Add role or permission</h3>
            <form wire:submit.prevent='simpan'>
                <div class="py-4">
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Tambah role atau permission</span>
                        </label>
                        <select class="select select-bordered w-full" wire:model='jenis'>
                            <option value="permission">Permission</option>
                            <option value="role">Role</option>
                        </select>
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Nama {{ $jenis }}</span>
                        </label>
                        <input type="text" placeholder="Type here" wire:model='name' class="input input-bordered w-full" />
                    </div>
                </div>
                <div class="modal-action">
                    <label for="createRoleModal" class="btn">Close!</label>
                </div>
            </form>
        </div>
    </div>
</div>