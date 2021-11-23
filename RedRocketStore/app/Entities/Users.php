<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Users.
 *
 * @package namespace App\Entities;
 */
class Users extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'name',
        'cpf',
        'birthdate',
        'gender',
        'email',
        'job',
        'password',
        'email_verified_at',
        'remember_token',
        'created_at',
        'updated_at'
    ];

}
