<?php namespace Halo;

class welcome extends Controller
{

    function index()
    {
        $this->users = get_all("SELECT * FROM users");
    }

    function AJAX_index()
    {

    }

    function POST_index()
    {

    }
}