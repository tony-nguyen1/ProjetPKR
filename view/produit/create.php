<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8" />
        <title>Insérer un Produit</title>
    </head>
   
    <body>
      <form method="get">
          <fieldset>
            <legend>Mon formulaire :</legend>
            <input type='hidden' name='idProduit' value='NULL'>
            <p>
              <label for="nomProduit_id">Nom du Produit</label>
              <input type="text" placeholder="Windows 10" name="nomProduit" id="nomProduit_id" required/>
            </p>
            <p>
              <label for="descriptionProduit_id">Description du Produit</label> :
              <input type="text" placeholder="Ex : Porsche" name="descriptionProduit" id="descriptionProduit_id" required/>
            </p>
            <p>
              <label for="prix_id">Prix du Produit</label> :
              <input type="text" placeholder="14.99" name="prix" id="prix_id" required/>
            </p>
            <label for="nomProduit_id">Nom du Produit</label>
            <p>
              <input type='hidden' name='nomFonction' value='created'>
              <input type="submit" value="Envoyer" />
            </p>
          </fieldset> 
        </form>
    </body>
</html>