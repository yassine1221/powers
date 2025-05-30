<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('make:admin {email}', function ($email) {
    $user = \App\Models\User::where('email', $email)->first();
    
    if (!$user) {
        $this->error("User with email {$email} not found!");
        return;
    }

    $user->is_admin = true;
    $user->save();

    $this->info("User {$email} has been made an admin!");
})->purpose('Make a user an admin by their email');

Artisan::command('list:admins', function () {
    $admins = \App\Models\User::where('is_admin', true)->get();
    
    $this->table(
        ['ID', 'Name', 'Email', 'Created At'],
        $admins->map(function ($admin) {
            return [
                $admin->id,
                $admin->name,
                $admin->email,
                $admin->created_at->format('Y-m-d H:i:s')
            ];
        })
    );
})->purpose('List all admin users');
