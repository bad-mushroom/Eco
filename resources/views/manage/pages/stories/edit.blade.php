@extends('manage.layout')

@section('content')

<div class="row">
    <div class="col-6">
        <x-header :header="'Edit ' . $story->type->label . ': ' . $story->subject" />
        <x-breadcrumbs :current="$breadcrumbs['current']" :crumbs="$breadcrumbs['crumbs']" />
    </div>
    <div class="col-6">
    </div>
</div>

<form>
    <div class="row">
        <div class="col-lg-8 col-md-9 col-sm-12">
            <section id="story-create">
                <x-header header="Details" size="5" classes="pb-3" />

                @include('manage.partials.forms.post')

                <div class="mb-3 text-end">
                    @if ($story->published_at)
                        <button class="btn btn-secondary text-light"><i class="bi bi-cloud me-2"></i>Convert to Draft</button>
                    @else
                        <button class="btn btn-secondary text-light"><i class="bi bi-cloud me-2"></i>Save Draft Changes</button>
                    @endif
                    <button class="btn btn-success text-light"><i class="bi bi-cloud-fill me-2"></i>Save and Publish Changes</button>
                </div>
            </section>
        </div>

        <div class="col-lg-4 col-md-3 col-sm-12">
            <section id="story-meta">
                <x-header header="Meta" size="5" classes="pb-2" />
                <div class="mb-3">
                    <label for="type" class="form-label required">Story Type</label>
                    <select class="form-control" id="type" aria-describedby="typeHelp" disabled>
                        @foreach ($storyTypes as $type)
                            <option value="{{ $type->id }}" @if ($type->id == $story->type->id) selected @endif>{{ $type->label }}</option>
                        @endforeach
                    </select>
                    <div id="typeHelp" class="form-text text-muted">Each story type has its own template</div>
                </div>
                <div class="mb-3">
                    <label for="user" class="form-label required">Author</label>
                    <select class="form-control" id="type" aria-describedby="userHelp">
                        <option value="">{{ $story->author->name }}</option>
                    </select>
                    <div id="userHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label required">Published</label>
                    <input type="datetime-local" class="form-control" id="subject" aria-describedby="subjectHelp" value="{{ $story->published_at }}">
                    <div id="subjectHelp" class="form-text"></div>
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
                <x-header header="Tags" size="5" classes="pb-2" />
                <div class="mb-3">
                    @foreach ($story->tags as $tag)
                        <span class="badge bg-primary">{{ $tag->label }} <a href="" class=" ms-3 text-light"><i class="bi bi-x"></i></a></span>
                    @endforeach
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="tags" rows="2" aria-describedby="tagsHelp"></textarea>
                    <div id="tagsHelp" class="form-text">Comma seperated values</div>
                </div>
            </section>
        </div>
    </div>
</form>
@endsection
