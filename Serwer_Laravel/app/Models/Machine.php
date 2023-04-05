<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'serial_number',
        'purchase_date',
        'name',
        'location',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
