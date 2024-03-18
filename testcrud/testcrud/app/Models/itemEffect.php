<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemEffect extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_item',
        'id_effect',
        'mod',
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

    /**
     * Get the xuxemon associated with the xuxemon data.
     */
    public function effect()
    {
        return $this->belongsTo(effect::class, 'id_effect');
    }
}
