<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function insert() {
        // $task = new Task();
        // $task->name = "Test";
        // $task->save();

        return view('welcome');
    }

    public function delete() {
        

        return view('welcome');
    }
}
