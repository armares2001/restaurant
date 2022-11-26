<?php

namespace App\Models;

use App\Models\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable=[

        'first_name',
        'last_name',
        'email' ,
        'res_date',
        'tel_number',
        'guest_number',
        'table_id',
    ];
    protected $dates = [
        'res_date' 
    ];
    public function table(){
        return $this->belongsTo(Table::class);
    }
}
