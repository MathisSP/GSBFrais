<?php

namespace App\Controllers;

use App\Models\GsbModel;

class ModificationMdp extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']); // helpers URL et form
        $this->gsb_model = new GsbModel();
    }

    public function changerMdp()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $data['titre'] = "Changer le mot de passe";
        $data['sc_titre'] = "Entête du changement de mot de passe";

        return view('structures/page_entete')
            . view('structures/messages')
            . view('sommaire')
            . view('structures/contenu_entete', $data)
            . view('structures/souscontenu_entete', $data)
            . view('changerMotDePasse')
            . view('structures/page_pied');
    }

    public function validerChangerMdp()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        // Récupération des mots de passe
        $mdp = $this->request->getPost('pwdMdp');
        $mdpConfirm = $this->request->getPost('pwdMdpConfirm');

        // Vérification que les deux mots de passe correspondent
        if ($mdp !== $mdpConfirm) {
            return redirect()->to('/changerMdp') ->with('erreurs', 'Les mots de passe ne correspondent pas');
        }

        // Vérification minimale (6 caractères par exemple)
        if (strlen($mdp) < 6) {
            return redirect()->to('/changerMdp') ->with('erreurs', 'Le mot de passe doit contenir au moins 6 caractères');
        }

        $idUtilisateur = session()->get('idUtilisateur');
        $this->gsb_model->updateMdpUtilisateur($idUtilisateur, $mdp);

        // Mise à jour de la date de modification dans la session (comme sa affichage de nouveau du sommaire au complet)
        session()->set('date_modif_mdp', date('Y-m-d H:i:s'));

        // On retourne sur la meme page
        return redirect()->to('/changerMdp') ->with('infos', 'Le mot de passe a été modifié avec succès');
    }
}