@extends('admin.layout.app')
@section('pageTitle', 'Create Article')

@section('content')
<main id="main-container">
    <div class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Create Article</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('articles.store') }}" method="post">
                            @csrf

                            <div class="form-group mb-2">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="title">Subject</label>
                                <select class="form-select" id="subject_id" name="subject_id">
                                    <option value=""></option>
                                    @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" class="form-control" rows="5">{{ old('content') }}</textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="featured" name="featured" value="1">
                                <label class="form-check-label" for="featured">Featured</label>
                            </div>

                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="published" name="published" value="1" checked>
                                <label class="form-check-label" for="published">Published</label>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Create Article</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('content', {
            toolbar: [
                { name: 'document', items: ['Styles', 'Format'] },
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                { name: 'clipboard', items: ['Undo', 'Redo', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord'] },
                { name: 'links', items: ['Link', 'Unlink'] },
                { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] }, // Include 'Image' in the insert items
                { name: 'tools', items: ['Maximize', 'Source'] },
                '/',
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'] }
            ]
        });
    });
</script>

@endsection
