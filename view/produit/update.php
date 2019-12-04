
      <?php
      echo "
      <form method=\"get\">
       
          <fieldset>
            <legend>Mon formulaire :</legend>
            <p>
              <label for=\"nomProduit_id\">Nom du produit</label> :
              <input type=\"text\" placeholder=\"Windows 10 Pro\" name=\"nomProduit\" id=\"nomProduit_id\" value=\"".
              $nomProduit.
              "\" ".$re1."/>
            </p>
            
            <p>
              <label for=\"description_id\">Description</label> :
              <input type=\"text\" placeholder=\"Cle d'activation de Windows 10\" name=\"descriptionProduit\" id=\"description_id\" value=\"".
              $descriptionProduit.
              "\" required/>
            </p>
            <p>
              <label for=\"prix_id\">Prix</label> :
              <input type=\"text\" placeholder=\"9.99€\" name=\"prix\" id=\"prix_id\" value=\"".
              $prix.
              "\" required/>
            </p>
            <input type='hidden' name='nomFonction' value='".$fct."'>
            <input type='hidden' name='arg1' value=''>
            <p>
              <input type=\"submit\" value=\"Envoyer\" />
            </p>
            
          </fieldset> 
        </form>
        
      ";
      ?>