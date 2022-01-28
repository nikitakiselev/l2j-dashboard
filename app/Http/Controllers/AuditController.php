<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use OwenIt\Auditing\Models\Audit;

class AuditController extends Controller
{
    public function index(): Response
    {
        $audits = Audit::all();

        return Inertia::render('Audit/Index', compact('audits'));
    }
}
