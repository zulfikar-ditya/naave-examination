<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyFriegth extends Model
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
        'freight',
        'port_of_loading_id',
        'port_of_discharge_id',
    ];

    public function rules($method = 'create', $id = null)
    {
        $validate = [
            'company_id' => 'required|string|exists:companies,id',
            'freight' => 'required|string|max:255',
            'port_of_loading_id' => 'required|string|exists:ports,id',
            'port_of_discharge_id' => 'required|string|exists:ports,id',
        ];
        return $validate;
    }

    public function loadModel($request) {foreach ($this->fillable as $key_field) {foreach ($request as $key_request => $value) {if ($key_field == $key_request) $this->setAttribute($key_field, $value);}}}
    
    public function port_of_loading()
    {
        return $this->belongsTo(Port::class, 'port_of_loading_id');
    }

    public function port_of_discharge()
    {
        return $this->belongsTo(Port::class, 'port_of_discharge_id');
    }

}
