<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pokemon
 *
 * @property int $id
 * @property string|null $mote
 * @property string $nombre
 * @property string $tipo
 * @property string $tamanio
 * @property string $idEntrenador
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereIdEntrenador($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereMote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereTamanio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokemon whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemon';

    protected $fillable = [
        'idEntrenador',
        'mote',
        'nombre',
        'tipo',
        'tamanio', 
        'peso',
    ];
}
