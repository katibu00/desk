@extends('admin.layout.app')
@section('pageTitle', 'Subjects')

@section('content')
    <main id="main-container">
        <div class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title align-self-center">Topics</h5>
                            <a href="{{ route('articles.create') }}" class="btn btn-primary">Add
                                Article</a>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Subject</th>
                                                <th>Published</th>
                                                <th>Featured</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($articles as $article)
                                            <tr>
                                                <td>{{ $article->id }}</td>
                                                <td>{{ $article->title }}</td>
                                                <td>{{ $article->subject->name }}</td>
                                                <td>{{ $article->published ? 'Yes' : 'No' }}</td>
                                                <td>{{ $article->featured ? 'Yes' : 'No' }}</td>
                                                <td>
                                                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('articles.destroy', $article->id) }}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{-- {{ $users->links() }} --}}
                    </div>

                </div>
            </div>
        </div>
    </main>


@endsection



@section('js')



    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


@endsection
