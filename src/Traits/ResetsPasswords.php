<?php

namespace Bestmomo\LaravelEmailConfirmation\Traits;

use Illuminate\Foundation\Auth\ResetsPasswords as BaseResetsPasswords;

trait ResetsPasswords
{
    use BaseResetsPasswords;

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => str_random(60),
        ])->save();

        if ($user->confirmed) {
            $this->guard()->login($user);
        }
    }
}
