<?php
echo '
  <form method="get">
    <fieldset>
      <legend>Mon formulaire :</legend>
      <p>
        <label for="adrMail_id">Mail</label> :
        <input type="text" placeholder="jean@gmail.com" name="adrMail" id="adrMail_id" value="'.
              $adrMail.
              '" '.$re1.'/>
      </p>
      <p>
        <label for="nom_id">Prenom</label> :
          <input type="text" placeholder="Votre nom" name="nom" id="nom_id" value="'.
              $nom.
              '" '.$re1.'/>
      </p>
      <p>
          <label for="prenom_id">Nom</label> :
          <input type="text" placeholder="Votre prenom" name="prenom" id="prenom_id" value="'.
              $prenom.
              '" '.$re1.'/>
      </p>
      <p>
        <label for="adrFacturation_id">Adresse de facturation</label> :
        <input type="text" placeholder="1 rue DesChamps" name="adrFacturation" id="adrFacturation_id" value="'.
              $adrFacturation.
              '" '.$re1.'/>
      </p>
      <p>
        <label for="mdp_id">Mot de passe</label> :
        <input type="password" placeholder="* * * *" name="mdp" id="mdp_id" value="'.
              $mdp.
              '" '.$re1.'/>
      </p>
      <p>
        <label for="mdp2_id">Confirmation mot de passe</label> :
        <input type="password" placeholder="* * * *" name="mdp2" id="mdp2_id" value="'.
              $mdp.
              '" '.$re1.'/>
      </p>
      <input type="hidden" name="controller" value="client">
      <input type="hidden" name="nomFonction" value="'.$fct.'">
      <input type="hidden" name="arg1" value="">
      <p>
        <input type="submit" value="Envoyer" />
      </p>
    </fieldset> 
  </form>';
?>