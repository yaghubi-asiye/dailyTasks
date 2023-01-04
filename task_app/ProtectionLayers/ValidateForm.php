<?php

namespace TaskApp\ProtectionLayers;


use Imanghafoori\HeyMan\Facades\HeyMan;

class ValidateForm
{
    public static function install()
    {
        HeyMan::onRoute('tasks.store')
            ->validate(['title' => 'required']);
    }
}
