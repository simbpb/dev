<?php

namespace App\Models\Auth;

use App\Models\BaseModel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class UserHsbgn extends BaseModel implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Notifiable, Authenticatable, Authorizable, CanResetPassword;
    protected $guard = 'hsbgn';
    protected $primaryKey = 'user_id';
    protected $table = 'tbl_user_sihsbgn';
}
