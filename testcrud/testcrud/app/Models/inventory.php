<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_item',
        'id_user',
        'amount',
    ];

    /**
     * Define relationships if needed.
     *
     * For example, to associate each entry with a user or xuxemon.
     */

    /**
     * Get the user associated with the xuxemon data.
     */
    public function item()
    {
        return $this->belongsTo(item::class, 'id_item');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
