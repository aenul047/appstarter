<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class API extends ResourceController
{
    protected $modelName = 'App\Models\EventModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // ...
}