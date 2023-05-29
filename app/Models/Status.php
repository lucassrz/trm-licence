<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Status extends Model
{
    use HasFactory, Sortable;

    protected $table = 'status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'libelle',
        'value'
    ];

    // Attributes that are sortable
    public $sortable = [
        'id',
        'libelle',
        'value'
    ];
}
