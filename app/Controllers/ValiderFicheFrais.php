<?php

namespace App\Controllers;

use App\Models\GsbModel;

class ValiderFicheFrais extends BaseController
{
    protected $gsb_model;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->gsb_model = new GsbModel();
    }

    public function index()
    {
        // Vérifie si l’utilisateur est connecté
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $data['titre'] = "Valider les fiches de frais";

        return view('structures/page_entete')
            . view('structures/messages')
            . view('sommaire')
            . view('structures/contenu_entete', $data)
            . view('en_travaux', $data)
            . view('structures/page_pied');
    }
}