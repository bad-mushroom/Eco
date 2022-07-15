<form>
    @include('manage.livewire.modals.confirm_delete', [
        'confirmTitle' => 'Delete Story?',
        'confirmBody' => 'Are you sure you want to delete this story?',
        ])

    <div class="row">
        <div class="col-lg-8 col-md-9 col-sm-12">
            @include('manage.partials.alerts')

            <section id="story-edit">
                <x-header header="Details" size="5" classes="pb-3" />

                @includeIf('manage.partials.forms.' . $type)
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-danger text-light" wire:click="setDeleteId('{{ $story->id }}')"
                            data-bs-toggle="modal" data-bs-target="#confirmDelete">
                            <i class="bi bi-trash me-2"></i>Delete
                        </button>

                    </div>
                    <div class="col text-end">
                        <button type="button" class="btn btn-info text-dark me-4" data-bs-toggle="modal" data-bs-target="#previewStory">
                            <i class="bi bi-eye me-2"></i>Preview
                        </button>

                        @if ($story->published_at)
                        <button type="button" class="btn btn-secondary text-light" wire:click="saveDraft">
                            <i class="bi bi-cloud-fill me-2"></i>Convert to draft
                        </button>
                        @else
                        <button type="button" class="btn btn-secondary text-light" wire:click="saveDraft">
                            <i class="bi bi-cloud me-2"></i>Save Draft
                        </button>
                        @endif
                        <button type="button" class="btn btn-success text-light" wire:click="publish">
                            <i class="bi bi-cloud-fill me-2"></i>Save and Publish
                        </button>
                    </div>
                </div>

            </section>
        </div>

        <div class="col-lg-4 col-md-3 col-sm-12">

            <section id="story-meta">
                <x-header header="Meta" size="5" classes="pb-2" />
                <div class="mb-3">
                    <label for="type" class="form-label required">Story Type</label>
                    <select class="form-control" id="type" aria-describedby="typeHelp" wire:model="type" @if ($story->published_at) disabled @endif>
                        @foreach ($storyTypes as $type)
                        <option value="{{ $type->slug }}">{{ $type->label }}</option>
                        @endforeach
                    </select>
                    <div id="typeHelp" class="form-text text-muted">Each story type has its own template</div>
                </div>
                @if ($story->author)
                <div class="mb-3">
                    <label for="published_at" class="form-label required">Author</label>
                    <input type="text" value="{{ $story->author->name }}" class="form-control" disabled aria-describedby="authorHelp">
                    <div id="publishedAtHelp" class="form-text text-muted">Author of the story</div>
                </div>
                @endif
                @if ($story->published_at)
                    <div class="mb-3">
                        <label for="published_at" class="form-label required">Published At</label>
                        <input type="datetime-local" class="form-control" wire:model="publishedAt" aria-describedby="publishedAtHelp" disabled>
                        <div id="publishedAtHelp" class="form-text text-muted">Date and time this story was published</div>
                    </div>
                @endif
                <hr>
                <div class="mb-3">
                    <div class="form-check">
                        <input wire:model="isFeatured" class="form-check-input" type="checkbox" value="1" id="featured-story"
                            aria-describedby="featured-story-help">
                        <label class="form-check-label" for="featured-story">Featured Story?</label>
                    </div>
                    <div id="featured-story-help" class="form-text text-muted">Featured stories can be shown at the top of all other
                        stories</div>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input wire:model="allowComments" class="form-check-input" type="checkbox" value="1" id="allow_comments"
                            aria-describedby="allow_comments-help">
                        <label class="form-check-label" for="allow_comments">Allow Comments?</label>
                    </div>
                    <div id="allow_comments-help" class="form-text text-muted">Allow commenting for this story</div>
                </div>
            </section>

            <section id="story-image">
                <x-header header="Featured Image" size="5" classes="pb-2" />
                <div class="mb-3">
                    <label for="featured-image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="featured-image" aria-describedby="featuredImageHelp">
                    <div id="featuredImageHelp" class="form-text"></div>
                </div>
            </section>

            <section id="story-tags">
                <x-header header="New Tags" size="5" classes="pb-2" />
                <div class="mb-3">
                    <textarea class="form-control" name="tags" rows="2" wire:model="tags" aria-describedby="tagsHelp"></textarea>
                    <div id="tagsHelp" class="form-text">Comma seperated values</div>

                    <x-header header="Existing Tags" size="5" classes="pb-2" />
                    @foreach ($story->tags as $tag)
                        <span class="text-dark bg-info badge">{{ $tag->label }}</span>
                    @endforeach
                </div>
            </section>
        </div>
    </div>

    @include('manage.livewire.modals.preview')

</form>
