<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function create(): Response
    {
        $accessLevels = collect(Account::$accessLevels)->map(fn($value, $key) => [
            'id' => $key,
            'text' => sprintf('(%d) - %s', $key, $value),
        ]);

        return Inertia::render('Accounts/Create', compact('accessLevels'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'login' => 'required|unique:App\Models\Account,login',
            'password' => 'required',
            'email' => 'required|email|unique:App\Models\Account,email',
            'accessLevel' => 'required|integer|min:-1|max:8',
        ]);

        $account = Account::create($request->all());

        return redirect()->route('accounts.index')
            ->with('success', "New account {$account->login} has been created.");
    }
}
