<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Xuxemon
 *
 * @property $id
 * @property $name
 * @property $type
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Xuxemon extends Model
{
    
    static $rules = [
		'name' => 'required',
    'hp',
		'type' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','type'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'pokedex');
    }

}
