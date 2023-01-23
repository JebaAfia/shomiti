<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'amount',
        'interest_rate',
        'frequency',
        'start_date',
        'handover_date',
        'granter_name',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
