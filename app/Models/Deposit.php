<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $fillable = [
        'loan_id',
        'instalment_date',
        'instalment_rate',
    ];

    public function loan(){
        return $this->belongsTo(Loan::class);
    }

}
