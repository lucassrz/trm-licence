<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use Smalot\PdfParser\Parser;
class PdfController extends Controller {
    
    public function create(): View {
        return view('pdf');
    }

    public function store(Request $request) {
        $config = new \Smalot\PdfParser\Config();
        $config->setFontSpaceLimit(-60);
        $config->setHorizontalOffset('');
        $config->setHorizontalOffset("\t");
        $parser = new Parser([], $config);

        $pdf = $parser->parseFile($request->file('pdf'));

        $global_array = [];

        $i = 0;

        //Parcours les pages
        while ($i < count($pdf->getPages())) {

            $data = $pdf->getPages()[$i]->getText();
            $clean_data = '';

            //Parcours chaques caracteres pour supprimer les espaces en trop
            for ($j = 0; $j != strlen($data) - 1; $j++) {

                if (isset($data[$j]) && $data[$j] != ' ' && $data[$j] != '\n' && $data[$j] != '\t'  || $data[$j + 1] != ' ') {

                    $clean_data .= $data[$j];

                }
            }

            $explode_clean_data = explode(' ', $clean_data);
            $matiere_array = [];
            $last_word_matiere = '';

            // Parcours chaque mots
            $start = false;
            for ($y = 0; $y < count($explode_clean_data); $y++) {

                $explode_clean_data[$y] = rtrim($explode_clean_data[$y]);

                //Nouvelle ligne à partir du code discipline
                if (!$start && preg_match('/^[A-Z][0-9]{4}$/', $explode_clean_data[$y])){
                    $start = true;
                }
                
                if ($start) {
                    $value = '';
                    $matiere = '';

                    //Parcours chaque caracteres de chaque mots pour dissociés libellé matières et données numériques
                    for ($j = 0; $j < strlen($explode_clean_data[$y]); $j++) {
                        if (ctype_alnum($explode_clean_data[$y][$j]) || $explode_clean_data[$y][$j] == ',' || $explode_clean_data[$y][$j] == '-' || $explode_clean_data[$y][$j] == '&') {
                            if (!is_numeric($explode_clean_data[$y][$j]) && $explode_clean_data[$y][$j] != ',' && $explode_clean_data[$y][$j] != '-') {
                                $matiere .= $explode_clean_data[$y][$j];
                            }
                            $value .= $explode_clean_data[$y][$j];
                        }
                    }

                    //Récupère le libellé de la matière
                    if (strlen($matiere) >= 2) {
                        $value = ltrim(str_replace($matiere, '', $explode_clean_data[$y]));

                        //Détécte si l'ancienne itération etait une matiere si c'est le cas cela rajoute l'itération courante au libellé de la matière
                        if (!empty($last_word_matiere)) {
                            $key = array_search($last_word_matiere, $matiere_array);
                            //On ajoute le mot au libellé de la matière
                            $matiere_array[$key] .= ' ' . $matiere;
                            //On définit le dernier mot du libellé par la dernière itération
                            $last_word_matiere = $matiere_array[$key];
                        } else {
                            //Sinon ajoute le mot qui correspond au libellé de la matère directement dans le tableau de la matière
                            $matiere_array[] = $matiere;
                        }

                        if (empty($last_word_matiere)) {
                            $last_word_matiere = $matiere;
                        }
                    }

                    if (!empty($value)) {
                        if (preg_match('/^[A-Z][0-9]{4}$/', $value)) {
                            $last_word_matiere = '';
                            //On ajoute le tableau de la matière aux tableau qui comprendra tout les tableaux des différentes matières
                            $global_array[] = $matiere_array;
                            $matiere_array = [];
                        }
                        $matiere_array[] = $value;

                    }
                }
            }
            $i += 1;
        }

        var_dump($global_array);

    }   

}
