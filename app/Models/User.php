<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * User Roles
     *
     * @const
     */
    const USER_ROLE = 0;
    const ADMIN_ROLE = 1;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password',
        'api_token',
        'api_token_expiration'
    ];

    /**
     * Saves new token
     *
     * @param string $token
     * @return void
     */
    public function setApiTokenAttribute(string $token): void
    {
        $this->attributes['api_token'] = hash('sha256', $token);
        $this->attributes['api_token_expiration'] = Carbon::now()->addHours(24);
    }

    /**
     * Get latest transactions of user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction')->latest();
    }

}
