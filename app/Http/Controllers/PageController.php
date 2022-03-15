<?php


namespace App\Http\Controllers;


class PageController
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function login()
    {
        return view('pages.login');
    }

    public function chat()
    {
        return view('side-pages.chat');
    }

    public function clean()
    {
        return view('side-pages.clean');
    }

    public function finance()
    {
        return view('side-pages.finance');
    }

    public function shopping()
    {
        return view('side-pages.shopping');
    }
}
