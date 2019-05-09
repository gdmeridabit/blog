<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $primaryKey = 'id';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_admin' => false,
    ];
}
