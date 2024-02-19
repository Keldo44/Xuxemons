<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Entrenador
 *
 * @property int $id
 * @property string $nombre
 * @property string $fechaN
 * @property string $ciudad
 * @property string $idEntrenador
 * @property string|null $nick
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Entrenador newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrenador newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrenador query()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrenador whereCiudad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrenador whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrenador whereFechaN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrenador whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrenador whereIdEntrenador($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrenador whereNick($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrenador whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrenador whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pokemon> $pokemon
 * @property-read int|null $pokemon_count
 * @mixin \Eloquent
 */
class Entrenador extends Model
{
    use HasFactory;

    protected $table = 'entrenador';
    protected $fillable = [
        'nombre',
        'fechaN',
        'ciudad',
        'idEntrenador'
    ];

    //crear relación 1 a muchos
    public function pokemon()
    {
        return $this->hasMany(Pokemon::class, 'idEntrenador');
    }
}
