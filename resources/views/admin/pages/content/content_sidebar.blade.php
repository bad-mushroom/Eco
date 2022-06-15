<x-card>
    <x-slot:header>
        <i class="fas fa-info-circle me-2"></i>Meta Information
    </x-slot>
    <x-slot:body>
        <div class="mb-3">
            <label for="content-type" class="form-label">Type</label>
            <select class="form-control" name="content_type" id="content-type" aria-describedby="contentTypeHelp" wire:model="selectedContentType" @if ($content) disabled @endif>
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
            <select class="form-control" name="user_id" id="user-id" aria-describedby="authorHelp" @if ($content) disabled @endif>
                <option value="{{ auth()->id() }}" selected>{{ auth()->user()->name }}</option>
            </select>
            <div id="user-id" class="form-text">User that will be credited with this content.</div>
        </div>
        @if ($content)
            <hr>
            <div class="mb-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="fw-bold">Published</span>: {{ $content->relative_published_at ?? 'Never'}}</li>
                    <li class="list-group-item"><span class="fw-bold">Comments</span>: {{ $content->comments_count }}</li>
                </ul>
            </div>
        @endif
    </x-slot>
</x-card>

<x-card>
    <x-slot:header>
        <i class="fas fa-tag me-2"></i>Featured Image
    </x-slot>
    <x-slot:body>
        <label for="featured-image" class="form-label">Image</label>
        @if ($content && $content->featured_image)
            <div class="text-center mb-3">
                <img src="data:image/png;base64,{{ $content->featured_image }}" class="img-fluid border border-light" />
            </div>
        @endif
        <input type="file" class="form-control" name="featured_image" id="featured-image">
        <div class="form-text">Preview image.</div>
    </x-slot>
</x-card>

<x-card>
    <x-slot:header>
        <i class="fas fa-tag me-2"></i>Tags
    </x-slot>
    <x-slot:body>
        <label for="user-id" class="form-label">Tags</label>
        <div class="mb-2">
            @foreach ($content->tags ?? [] as $tag)
                <span class="badge bg-primary">{{ $tag->label }}<a href="#" title="Remove Tag"><i class="fas fa-circle-xmark ms-3"></i></a></span>
            @endforeach
        </div>
        <textarea name="tags" class="form-control"></textarea>
        <div class="form-text">Comma separated list of tags.</div>
    </x-slot>
</x-card>
