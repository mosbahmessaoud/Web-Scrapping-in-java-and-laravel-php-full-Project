<?php
// app/Models/Article.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $table = 'articles';
    protected $fillable = [
        'article_number',
        'title',
        'authors',
        'publication_year',
        'journal',
        'doi',
        'abstract'
    ];
}