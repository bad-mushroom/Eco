<x-card>
    <x-slot:header>
        <i class="fas fa-info-circle me-2"></i>Meta Information
    </x-slot>
    <x-slot:body>
        <div class="mb-3">
            <label for="content-type-id" class="form-label">Type</label>
            <select class="form-control" id="content-type-id" aria-describedby="contentTypeHelp">
                @foreach ($contentTypes as $type)
                    <option value="{{ $type->id }}"
                        @if (optional($selectedType)->slug == $type->slug)
                            selected
                        @endif>{{ $type->label }}
                    </option>
                @endforeach
            </select>
            <div id="content-type-id" class="form-text">The type of content this is.</div>
        </div>
        <div class="mb-3">
            <label for="user-id" class="form-label">Author</label>
            <select class="form-control" id="user-id" aria-describedby="authorHelp">
                <option></option>
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
        @if ($content ?? false)
            @foreach ($content->tags as $tag) {{ $tag->label }}@endforeach
        @endif
        <textarea class="form-control">

        </textarea>
    </x-slot>
</x-card>
