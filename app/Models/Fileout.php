<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fileout extends Model
{
    use HasFactory;


    protected $table = "fileouts";
    protected $fillable = [   
        'date',
        'filesource',
        'subject', 
        'fileid',
        'file'
    ]; 
}
