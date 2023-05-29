<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Matiere extends Model
{
    use HasFactory, Sortable;

    protected $table = 'matiere';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'libelle'
    ];

    public $sortable = [
        'id',
        'libelle',
    ];
}
