<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEmail extends Model
{
    use HasFactory;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    public $fillable = [
        'company_id',
        'email',
    ];

    public function rules($method = 'create', $id = null)
    {
        $validate = [
            'company_id' => 'required|exists:companies,id',
        ];
        if ($method == 'create') {
            $unique_validate = [
                'email' => 'required|unique:company_emails,email'
            ];
        } else {
            $unique_validate = [
                'email' => 'required|unique:company_emails,email,'.$id
            ];
        }
        return array_merge($validate, $unique_validate);
    }

    public function loadModel($request) {foreach ($this->fillable as $key_field) {foreach ($request as $key_request => $value) {if ($key_field == $key_request) $this->setAttribute($key_field, $value);}}}
}
