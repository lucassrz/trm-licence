<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Enseignant extends Model
{
    use HasFactory, Sortable;

    protected $table = 'enseignant';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_discipline',
        'nom',
        'prenom',
        'id_status'
    ];

    // Attributes that are sortable
    public $sortable = [
        'id',
        'nom',
        'id_discipline',
        'id_status',
    ];
}
