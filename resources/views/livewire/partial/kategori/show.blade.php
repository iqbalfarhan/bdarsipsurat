<div>
    <input type="checkbox" id="showKategori" wire:model='show' class="modal-toggle" />
    <div class="modal">
        @if ($data)    
            <div class="modal-box">
                <h3 class="font-bold text-lg">Detail subkategori</h3>
                <div class="py-4">
                    <small>list surat dalam sub kategori ini :</small>
                    <ul class="list-disc list-inside">
                        @foreach ($data->surats as $surat)
                            <li><a href="{{ route('detailsurat', $surat->id) }}">{{ $surat->perihal }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-action">
                    <label for="showKategori" class="btn">Close!</label>
                </div>
            </div>
        @endif
    </div>
</div>