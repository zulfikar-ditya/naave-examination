<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        // 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rules($method = 'create', $id = null)
    {
        $validate = [
            'name' => 'required|string|max:255',
        ];

        if ($method == 'create') {
            $unique_validate = [
                'email' => 'required|unique:users,email',
                'password' => 'required|string|max:244|min:8',
            ];
        } else {
            $unique_validate = [
                'email' => 'required|unique:users,email,'.$id,
                'password' => 'nullable|string|max:244|min:8',
            ];
        }
        return array_merge($validate, $unique_validate);
    }

    public function loadModel($request) {foreach ($this->fillable as $key_field) {foreach ($request as $key_request => $value) {if ($key_field == $key_request) $this->setAttribute($key_field, $value);}}}
}
