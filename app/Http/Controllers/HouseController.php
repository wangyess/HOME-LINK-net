<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

class HouseController extends ApiController
{
    //
    public function search()
    {
        $keyword = request('keyword');
        $data = $this->model->where('title', 'like', "%$keyword%")->get();
        return suc($data);
    }
}
