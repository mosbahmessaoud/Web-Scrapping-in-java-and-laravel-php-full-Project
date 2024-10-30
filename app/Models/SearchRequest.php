<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class SearchRequest extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'search_requests';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'search_query',
        'number_of_articles',
    ];

    // Optionally, you can define the timestamps if you want to customize them
    public $timestamps = true; // This is true by default, so you can omit this line if you want.
}