<?php

namespace App\Models;

use App\Models\Matiere;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Groupe extends Model
{
    use HasFactory, Sortable;

    protected $table = 'groupe';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_matiere',
        'id_enseignant'
    ];

    public $sortable = [
        'id',
        'id_matiere',
        'id_enseignant',
    ];

    public function getMatiere($id) {

        $matiere = Matiere::find($id);
        $nom = $matiere->libelle;
        return $nom;

    }

    public function getEnseignant($id) {

        $enseignant = Matiere::find($id);
        $nom = $enseignant->nom;
        return $nom;

    }
}
