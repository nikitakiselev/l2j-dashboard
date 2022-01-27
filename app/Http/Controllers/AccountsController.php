<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\GameServer;
use Inertia\Inertia;
use Inertia\Response;

class AccountsController extends Controller
{
    public function index(): Response
    {
        $accounts = Account::query()
            ->with('lastGameServer')
            ->get();

        return Inertia::render('Accounts/Index', compact('accounts'));
    }
}
