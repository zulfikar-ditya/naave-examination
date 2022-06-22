<?php

namespace App\Models;

use App\Http\Helpers\RandomCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, RandomCode;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    public $fillable = [
        'name',
        // 'code',
        // 'siup',
        // 'npwp',
        'contact_person',
        'address',
    ];

    public function rules($method = 'create', $id = null)
    {
        $validate = [
            'name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ];

        if ($method == 'create') {
            $unique_validate = [
                'siup' => 'required|file|max:8000',
                'npwp' => 'required|file|max:8000',
            ];
        } else {
            $unique_validate = [
                'siup' => 'nullable|file|max:8000',
                'npwp' => 'nullable|file|max:8000',
            ];
        }
        return array_merge($validate, $unique_validate);
    }

    public function loadModel($request, $method = 'create') {
        foreach ($this->fillable as $key_field) {
            foreach ($request as $key_request => $value) {
                if ($key_field == $key_request) $this->setAttribute($key_field, $value);
            }
        }
        if ($method == 'create') $this->setAttribute('code', $this->company_code($request['name']));
    }

    public function company_emails()
    {
        return $this->hasMany(CompanyEmail::class);
    }
}
