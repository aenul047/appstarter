<?php

namespace App\Controllers;

class CalenderController extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->Session = session();
    }

    public function Index()
    {
        $data = [
            'session' => $this->Session->get('role')
        ];

        return view('Event/event', $data);
    }
}
