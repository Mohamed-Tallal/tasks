<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Cache;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskController extends Controller
{

    public function __construct(readonly TaskRepositoryInterface $taskRepository)
    {
    }

    public function index(){
        $is_paginate = true;
        $wheres = $wheresIn = [];
        $with = ['assignedBy:id,name', 'assignedTo:id,name'];
        $tasks  = $this->taskRepository->getAll($is_paginate, $wheres , $wheresIn , $with);
        return view('task', compact('tasks'));
    }

    public function create(){

        $admins =  Cache::remember('admins', now()->addMinutes(60), function () {
            return Admin::select('id', 'name')->get();
        });

        $users =  Cache::remember('users', now()->addMinutes(60), function () {
            return User::select('id', 'name')->get();
        });

        return view('create', compact('admins','users'));
    }

    public function store(TaskRequest $request){
        $data = [
            'title'             => $request->title,
            'description'       => $request->description,
            'assigned_to_id'    => $request->assigned_to,
            'assigned_by_id'    => $request->assigned_by,
        ];
        $this->taskRepository->store($data);
        return redirect()->route("index");
    }
}
