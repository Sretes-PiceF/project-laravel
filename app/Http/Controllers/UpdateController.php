<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\ViewName;

class UpdateController extends Controller
{
    public function updateBuku () {
        return view('admin.update_buku');
    }

    
}
