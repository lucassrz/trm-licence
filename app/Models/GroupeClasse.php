<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupeClasse extends Model
{
    use HasFactory;

    protected $table = 'groupe_classe';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_classe',
        'libelle',
        'effectif'
    ];
}
