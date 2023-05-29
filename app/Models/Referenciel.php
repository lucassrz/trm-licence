<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Referenciel extends Model
{
    use HasFactory, Sortable;

    protected $table = 'referenciel';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'libelle',
        'annees',
        'niveau'
    ];

    public $sortable = [
        'id',
        'libelle',
        'annees',
        'niveau'
    ];
}
