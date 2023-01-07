<?php

namespace TaskApp\DB;

use Illuminate\Support\Facades\DB;

class Transactioner
{
    public function handle($input, $next)
    {
        DB::beginTransaction();
        $result = $next($input);
        $value = $result->getOr(null);
        $value ? DB::commit() : DB::rollBack();
        return $result;
    }
}
