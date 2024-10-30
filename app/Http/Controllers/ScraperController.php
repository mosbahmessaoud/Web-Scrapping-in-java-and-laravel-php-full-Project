<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\SearchRequest; // Make sure to create a model for the table
use Illuminate\Support\Facades\Redirect;


class ScraperController extends Controller
{
    public function showScrapeForm()
    {
        return view('scrape'); // This will load the scrape.blade.php view
    }

    public function storeSearchRequest(Request $request)
{
    // Validate the request
    $request->validate([
        'search_query' => 'required|string',
        'number_of_articles' => 'required|integer',
    ]);

    // Create a new search request
    SearchRequest::create([
        'search_query' => $request->input('search_query'),
        'number_of_articles' => $request->input('number_of_articles'),
    ]);

    // return response()->json(['message' => ' request created successfully']);
    return Redirect::route('articles.index')->with('success', ' request created successfully so next step i should exicut the java pr');

}
}