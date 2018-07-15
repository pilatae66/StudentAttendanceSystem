<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Students;

class Payment extends Model
{
    protected $fillable = [
        'stud_id', 'pay_type', 'pay_amount', 'pay_to', 'semester', 'school_year'
    ];

    public function student()
    {
        return $this->belongsTo(Students::class, 'stud_id', 'stud_id');
    }
}
