<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'amount',
        'interest_rate',
        'frequency',
        'start_date',
        'handover_date',
        'granter_name',
    ];

}
