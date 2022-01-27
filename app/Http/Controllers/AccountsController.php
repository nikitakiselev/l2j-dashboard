<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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
        $accessLevels = $this->getAccessLevelsOptions();

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

        $account = new Account();
        $account->forceFill($request->only([
            'login',
            'password',
            'email',
            'accessLevel',
        ]));
        $account->save();

        return redirect()->route('accounts.index')
            ->with('success', "New account {$account->login} has been created.");
    }

    public function edit(string $login): Response
    {
        $account = Account::findOrFail($login);
        $accessLevels = $this->getAccessLevelsOptions();

        return Inertia::render('Accounts/Edit', compact('account', 'accessLevels'));
    }

    public function update(string $login, Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'accessLevel' => 'required|integer|min:-1|max:8',
        ]);

        $account = Account::findOrFail($login);

        $account->update($request->only('email', 'accessLevel'));

        return redirect()->route('accounts.index')
            ->with('success', "Account {$account->login} has been updated.");
    }

    public function delete(string $login): RedirectResponse
    {
        $account = Account::findOrFail($login);

        $account->delete();

        return redirect()->route('accounts.index')
            ->with('success', "Account {$account->login} has been deleted.");
    }

    public function getAccessLevelsOptions(): Collection
    {
        return collect(Account::$accessLevels)->map(fn($value, $key) => [
            'id' => $key,
            'text' => sprintf('(%d) - %s', $key, $value),
        ]);
    }
}
