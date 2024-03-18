<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pc extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'xuxemon_id',
        'hp_remaining',
        'hp_total',
        'candies',
    ];

    /**
     * Define relationships if needed.
     *
     * For example, to associate each entry with a user or xuxemon.
     */

    /**
     * Get the user associated with the xuxemon data.
     */
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    /**
     * Get the xuxemon associated with the xuxemon data.
     */
    public function xuxemon()
    {
        return $this->belongsTo(Xuxemon::class, 'xuxemon_id');
    }
}


