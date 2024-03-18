<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'prize',
        'file',
        'type',
    ];

    /**
     * Define relationships if needed.
     *
     * For example, to associate each entry with a user or xuxemon.
     */

}
