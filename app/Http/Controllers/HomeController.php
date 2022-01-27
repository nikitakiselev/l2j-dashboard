<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class HomeController
{
    public function index(): RedirectResponse
    {
        return redirect()->route('dashboard');
    }
}
