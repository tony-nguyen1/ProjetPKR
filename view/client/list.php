<?php
foreach ($tab_c as $c) {
    echo '<p>' . 
        "<a href=\"" . 
        "index.php?nomFonction=read&arg1=" .
        $c->get('adrMail') .
        "&controller=client\">" .
        htmlspecialchars($c->get('adrMail')) .
        "</a></p>";
}
echo "<a href=\"".
"index.php?nomFonction=create&arg1=&controller=client\">".
"Créer un nouveau Client".
"</a>";
echo "<br><a href=\"".
"index.php?nomFonction=connect&arg1=&controller=client\">".
"Se connecter".
"</a>";
?>
