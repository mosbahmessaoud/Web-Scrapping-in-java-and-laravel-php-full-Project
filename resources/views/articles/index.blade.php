@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Articles</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('articles.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search articles..."
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Article Number</th>
                            <th>Title</th>
                            <th>Authors</th>
                            <th>Year</th>
                            <th>Journal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article->article_number }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->authors }}</td>
                                <td>{{ $article->publication_year }}</td>
                                <td>{{ $article->journal }}</td>
                                <td>
                                    <a href="{{ route('articles.show', $article) }}" class="btn btn-sm btn-primary">View
                                        Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $articles->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
