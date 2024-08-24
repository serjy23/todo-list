<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function new() {
        return view('new-item');
    }

    public function delete() {

    }
}
