<?php

namespace App\AuditDrivers;

use Illuminate\Support\Facades\Config;
use OwenIt\Auditing\Contracts\Audit;
use OwenIt\Auditing\Drivers\Database;
use OwenIt\Auditing\Contracts\Auditable;

class CustomAuditDriver extends Database
{
    public function audit(Auditable $model): Audit
    {
        $implementation = Config::get('audit.implementation', \OwenIt\Auditing\Models\Audit::class);

        return call_user_func([$implementation, 'create'], $model->toAudit());
    }
}
