<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $primaryKey = 'MenuID';

    public $timestamps = false;

    protected $fillable = [
        'Name'
    ];

    

}
