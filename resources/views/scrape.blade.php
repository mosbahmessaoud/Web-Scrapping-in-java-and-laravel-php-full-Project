<!-- resources/views/scrape.blade.php -->
@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Scrape MDPI Articles</h1>
    <form action="{{ url('/scrape') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="search_query" class="form-label">Search Query</label>
            <input type="text" class="form-control" id="search_query" name="search_query" placeholder="Enter keywords"
                required>
        </div>
        <div class="mb-3">
            <label for="number_of_articles" class="form-label">Number of Articles</label>
            <input type="number" class="form-control" id="number_of_articles" name="number_of_articles"
                placeholder="Enter number of articles" required min="1">
        </div>
        <button type="submit" class="btn btn-primary">Scrape Articles</button>
    </form>

    @if (session('status'))
        <div class="alert alert-success mt-4">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger mt-4">
            {{ session('error') }}
        </div>
    @endif
@endsection
