<?php

namespace TaskApp\ProtectionLayers;

use Imanghafoori\HeyMan\Facades\HeyMan;
use TaskApp\TaskStoreResponses\Responses;
use TaskApp\Widgets\StatesSelect;

class BlockNastyUsers
{
    public static function install()
    {
        $callback = function () {
            $state = StatesSelect::$states;
            return isset($state[request('state')]);
        };

        $callback2 = function () {
            $user = auth()->user();
            $end = now()->addSecond(120);
            tempTags($user)->tagIt('banned', $end, ['reason' => 'tempering with create form']);
        };
        HeyMan::onCheckPoint('tasks.store')
            ->thisClosureShouldAllow($callback)
            ->otherwise()
            ->afterCalling($callback2)
            ->weRespondFrom([Responses::class, 'userBlocked']);
    }
}
