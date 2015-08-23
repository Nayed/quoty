<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Models\Quote;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 *  Display the quote of the day
 */
$app->get('/', function() use ($app) {
    /*
     *  Picks a different quote every day
     *  (for a maximum of 366 quotes)
     *      - $count: the total number of available quotes
            - $day: the current day of the year (from 0 to 365)
            - $page: the page to look for to retrieve the correct record
     */
    $count = Quote::query()->get()->count();
    $day = (int) date('z');
    $page = $day % $count + 1;

    $quotes = Quote::query()->get()->forPage($page, 1)->all();

    if (empty($quotes))
        throw new ModelNotFoundException();

    return view('quote', ['quote' => $quotes[0]]);
});

/**
 *  Dispplay a specific quote
 */
$app->get('/{id}', function($id) use ($app) {
    $quote = Quote::query()->findOrFail($id);
    return view('quote', compact('quote'));
});