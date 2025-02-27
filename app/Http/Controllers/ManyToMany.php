<?php

namespace App\Http\Controllers;
use App\Models\Project;

use Illuminate\Http\Request;

class ManyToMany extends Controller
{
    public function index(){
        $projects = Project::with('users')->get();
        return view('manytomany/index',compact('projects'));
    }
}
