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
        return $this->model->fill(request()->toArray())->save() ? suc($this->model->id) : err('internal_error');
    }

    public function read()
    {
        return $this->model->get() ? suc($this->model->get()) : err('internal_error');
    }

    public function remove()
    {
        $a = request()->toArray();
        return $this->model->where('id', $a)->delete();
    }
}
