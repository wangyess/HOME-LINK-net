<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct($model)
    {
        $model = '\App\\' . ucfirst($model);
        $this->model = new $model;
    }

    public function add()
    {
        if (!$title = request('title')) {
            return err('invalid_title');
        }
//        dd(request()->toArray());
        return $this->model->fill(request()->toArray())->save() ? suc($this->model->id) : err('internal_error');
    }

    public function read()
    {
        return $this->model->simplePaginate(10) ? suc($this->model->simplePaginate(10)) : err('internal_error');
    }

    public function remove()
    {
        $a = request()->toArray();
        return $this->model->where('id', $a)->delete()?suc():err('internal_error');
    }

    public function update()
    {
        $id = request('id');
        return $this->model->where('id', $id)->update(request()->toArray()) ?suc($id):err("internal_error");
    }

    public function number(){
       return $a= $this->model->count();
    }
}
