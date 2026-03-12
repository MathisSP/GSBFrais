<?php

namespace App\Controllers;

class ChangerMdp extends BaseController
{
    public function __construct()
    {
        // On charge le helper URL et HTML
        helper(['url', 'html']);
    }

    public function changerMdp()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $data['titre'] = "Changer le mot de passe";

        return view('structures/page_entete')
            . view('structures/messages')
            . view('sommaire')
            . view('structures/contenu_entete', $data)
            . view('changerMotDePasse')
            . view('structures/page_pied');
    }
}