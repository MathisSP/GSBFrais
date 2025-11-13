<?php $session = session(); ?>

<?php // var_dump(esc($session->get('idRole')));?>

<div id="menuGauche">
    <div id="infosUtil">
        <div id="user">
            <img src="<?= base_url('assets/images/UserIcon.png') ?>" alt="Utilisateur" />
        </div>
        <div id="infos">
            <h2><?= esc($session->get('prenom') . ' ' . $session->get('nom')) ?></h2>
            <h3><?= esc($session->get('libelleRole')) ?></h3>  <!-- afficher libelleRole de la table Role -->
        </div>
        <ul class="menuList">
            <li>
                <?= anchor('connexion/deconnexion', 'Déconnexion', ['title' => 'Se déconnecter']) ?>
            </li>
        </ul> 
    </div>  

    <ul id="menuPrincipal" class="menuList">
        <li>
            <?= anchor('accueil', 'Accueil', ['title' => 'Accueil']) ?>
        </li>
        
        <!-- hidden tout les rôles sauf visiteur médicaux -->
            <li <?= (esc($session->get('idRole')) != 'v') ? 'hidden' : '' ?>> 
                <?= anchor('gererfrais', 'Saisie fiche de frais', ['title' => 'Saisie fiche de frais']) ?>
            </li>
            <li <?= (esc($session->get('idRole')) != 'v') ? 'hidden' : '' ?>>
                <?= anchor('etatfrais', 'Mes fiches de frais', ['title' => 'Consultation de mes fiches de frais']) ?>
            </li>
        <!-- fin du hidden-->

        <!-- hidden tout les rôles sauf comptable -->
        <li <?= (esc($session->get('idRole')) != 'c') ? 'hidden' : '' ?>> 
                <?= anchor('valideFicheFrais', 'Valider fiche de frais', ['title' => 'Valider fiche de frais']) ?>
            </li>
            <li <?= (esc($session->get('idRole')) != 'c') ? 'hidden' : '' ?>>
                <?= anchor('suiviFicheFrais', 'Suivi du paiment', ['title' => 'Suivi des fiches de frais']) ?>
            </li>
        <!-- fin du hidden-->
    </ul>
</div>
