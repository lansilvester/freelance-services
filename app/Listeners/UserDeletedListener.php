<?php

namespace App\Listeners;

use App\Events\UserDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserDeletedListener
{
    public function __construct()
    {
        //
    }

    public function handle(UserDeleted $event)
    {
        $user = $event->user;

        // Hapus semua vendor dan service yang terkait dengan pengguna
        $user->vendors()->delete();
        $user->services()->delete();
    }
}
