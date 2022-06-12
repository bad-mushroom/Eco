<x-card>
    <x-slot:header>
        <i class="fas fa-info-circle me-2"></i>Meta Information
    </x-slot>
    <x-slot:body>
        <div class="mb-3">
            <label for="content-type" class="form-label">Type</label>
            <select class="form-control" name="content_type" id="content-type" aria-describedby="contentTypeHelp" wire:model="selectedContentType">
                @foreach ($contentTypes as $type)
                    <option value="{{ $type->slug }}"
                        @if (optional($selectedType ?? null)->slug == $type->slug)
                            selected
                        @endif>{{ $type->label }}
                    </option>
                @endforeach
            </select>
            <div id="content-type" class="form-text">The type of content this is.</div>
        </div>
        <div class="mb-3">
            <label for="user-id" class="form-label">Author</label>
            <select class="form-control" name="user_id" id="user-id" aria-describedby="authorHelp">
                <option value="{{ auth()->id() }}" selected>{{ auth()->user()->name }}</option>
            </select>
            <div id="user-id" class="form-text">User that will be credited with this content.</div>
        </div>
    </x-slot>
</x-card>

<x-card>
    <x-slot:header>
        <i class="fas fa-tag me-2"></i>Tags
    </x-slot>
    <x-slot:body>
        <label for="user-id" class="form-label">Tags</label>
        <textarea name="tags" class="form-control">@foreach ($content->tags ?? [] as $tag) {{ $tag->label }}@endforeach</textarea>
        <div class="form-text">Comma separated list of tags.</div>
    </x-slot>
</x-card>
