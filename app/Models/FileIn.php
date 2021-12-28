<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileIn extends Model
{
    use HasFactory;

    protected $table = "file_ins";
    protected $fillable = [   
        'date',
        'filesource',
        'subject', 
        'fileid',
        'file'
    ]; 

}
