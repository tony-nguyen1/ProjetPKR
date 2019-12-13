<?php
echo '
  <form method="get">
    <fieldset>
      <legend>Mon formulaire :</legend>
      <p>
        <label for="adrMail_id">Mail</label> :
        <input type="text" placeholder="jean@gmail.com" name="login" id="adrMail_id" required/>
      </p>
      <p>
        <label for="mdp_id">Mot de passe</label> :
        <input type="password" placeholder="* * * *" name="mdp" id="mdp_id" required/>
      </p>
      <input type="hidden" name="controller" value="client">
      <input type="hidden" name="nomFonction" value="connected">
      <input type="hidden" name="arg1" value="">
      <p>
        <input type="submit" value="Envoyer" />
      </p>
    </fieldset> 
  </form>';
?>