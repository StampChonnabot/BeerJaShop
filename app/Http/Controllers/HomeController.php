<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function showList(Request $request)
    {
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->request('GET', 'https://api.punkapi.com/v2/beers?page=1&per_page=80');
        $arrItem = $result->getBody()->getContents();
        $json = \json_decode($arrItem);
        // dd($json);
        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // Create a new Laravel collection from the array data
        $itemCollection = collect($json);
        // Define how many items we want to be visible in each page
        $perPage = 16;
        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        // Create our paginator and pass it to the view
        $paginatedItems = new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);
        // set url path for generted links
        $paginatedItems->setPath($request->url());
        // dd($paginatedItems);
        return \view("home",  ['id' => $paginatedItems]);
    }
}
