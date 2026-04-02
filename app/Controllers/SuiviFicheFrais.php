<?php

namespace App\Controllers;

use App\Models\GsbModel;
use App\Libraries\Gsb_lib;

/**
* Le controlleur SuiviFicheFrais (pas fait) (comptable)
*/
class SuiviFicheFrais extends BaseController
{
    private $id_annee;
    private $id_mois;
    private $id_fiche;
    private $id_visiteur;
    protected $gsb_lib;
    protected $gsb_model;
    /**
     * Constructeur du controlleur SuiviFicheFrais
     */
    public function __construct()
    {
        helper(['url', 'form']);
        $this->gsb_model = new GsbModel();
    }

    /**
     * Verifie si l'utilisateur est connecter et ensuite affichage de la page (la page n'a pas été faite donc la page est en travaux)
     *
     * @return void
     */
    public function index()
    {
        // Vérifie si l’utilisateur est connecté
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $data['titre'] = "Suivi des fiches de frais";

        return view('structures/page_entete')
            . view('structures/messages')
            . view('sommaire')
            . view('structures/contenu_entete', $data)
            . view('en_travaux', $data)
            . view('structures/page_pied');
    }
}