<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Etablissement;

class Classe extends Model
{
    use HasFactory, Sortable;

    protected $table = 'classe';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_etablissement',
        'id_referenciel',
        'libelle',
        'niveau',
        'effectif'
    ];

    // Attributes that are sortable
    public $sortable = [
        'id',
        'id_etablissement',
        'id_referenciel',
        'libelle',
        'niveau',
        'effectif',
        'created_at',
        'updated_at',
    ];

    public function etablissement() {
        return $this->hasOne(Etablissement::class, 'id', "id_etablissement");
    }
}
