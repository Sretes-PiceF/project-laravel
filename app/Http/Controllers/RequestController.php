<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;

class RequestController extends Controller
{
    public function fetchData()
{
    $data = Http::get('https://jsonplaceholder.typicode.com/users');
    $jsonData = $data->json();

    dump($jsonData);
}

public function store(Request $request): RedirectResponse
{
    $nama = $request->input('name', 'Agusnurwatisitisrizaeini');
    return redirect('/name')->with('name', $nama);
}

}
