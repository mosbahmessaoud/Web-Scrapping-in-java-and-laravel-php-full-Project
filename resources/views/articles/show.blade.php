@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{ $article->title }}</h1>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3"><strong>Article Number:</strong></div>
                <div class="col-md-9">{{ $article->article_number }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Authors:</strong></div>
                <div class="col-md-9">{{ $article->authors }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Publication Year:</strong></div>
                <div class="col-md-9">{{ $article->publication_year }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Journal:</strong></div>
                <div class="col-md-9">{{ $article->journal }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>DOI:</strong></div>
                <div class="col-md-9">
                    <a href="https://doi.org/{{ $article->doi }}" target="_blank">
                        {{ $article->doi }}
                    </a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Abstract:</strong></div>
                <div class="col-md-9">{{ $article->abstract }}</div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="https://doi.org/{{ $article->doi }}" class="btn btn-primary">View in origin site</a>
        </div>
    </div>
@endsection
