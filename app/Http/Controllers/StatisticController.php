<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\StatisticRepositoryInterface;

class StatisticController extends Controller
{
    //
    public function __construct(readonly StatisticRepositoryInterface $statisticRepository)
    {
    }

    public function index(){
        $is_paginate = false;
        $wheres = $wheresIn = [];
        $with = ['user:id,name'];
        $statistics  = $this->statisticRepository->getAll($is_paginate, $wheres , $wheresIn , $with);
        return view('statistic', compact('statistics'));
    }

}
