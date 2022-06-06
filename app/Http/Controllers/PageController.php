<?php


namespace App\Http\Controllers;


class PageController
{
    public function home()
    {
        return view('pages.home');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function login()
    {
        return view('pages.login');
    }

}
