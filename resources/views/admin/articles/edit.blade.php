<!-- resources/views/admin/articles/edit.blade.php -->
@extends('admin.layout.app')
@section('pageTitle', 'Edit Article')

@section('content')
<main id="main-container">
    <div class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Article</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('articles.update', $article->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-2">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="title">Subject</label>
                                <select class="form-select" id="subject_id" name="subject_id">
                                    <option value=""></option>
                                    @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" @if($subject->id == $article->subject_id) selected @endif>{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" class="form-control" rows="5" required>{{ $article->content }}</textarea>
                            </div>

                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="featured" name="featured" value="1" @if($article->featured) checked @endif>
                                <label class="form-check-label" for="featured">Featured</label>
                            </div>

                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="published" name="published" value="1" @if($article->published) checked @endif>
                                <label class="form-check-label" for="published">Published</label>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Update Article</button>
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
                { name: 'insert', items: ['Image','Markup', 'Table', 'HorizontalRule', 'SpecialChar'] }, // Include 'Image' and 'Markup' in the insert items
                { name: 'tools', items: ['Maximize', 'Source'] },
                '/',
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'] },
                
            ],
            extraAllowedContent: 'div(lightbox_shortcode); img[alt,src]; a[href,class]; i' // Allow the specified elements and their attributes
        });
    });
</script>

@endsection