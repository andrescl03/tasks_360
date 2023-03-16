<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    /* PERMITE REALIZAR MODIFICACIONES A LOS CAMPOS REGISTRADOS EN EL ARRAY */
    protected $fillable = ['title', 'description' , 'completed'];

}
