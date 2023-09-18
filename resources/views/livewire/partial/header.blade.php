<div class="mb-3">
    <h1 class="text-2xl font-semibold">{{ $title ?: "Page Header" }}</h1>
    @if ($subtitle)
        <span class="text-sm">{{ $subtitle }}</span>
    @endif
</div>
