<?php
foreach ($tab_c as $c) {
    echo '<p>' . 
        "<a href=\"" . 
        "index.php?nomFonction=read&arg1=" .
        $c->get('adrMail') .
        "\">" .
        htmlspecialchars($c->get('adrMail')) .
        "</a></p>";
}
echo "<a href=\"".
"index.php?nomFonction=create&arg1=".
"\">".
"Créer un nouveau Client".
"</a>";
?>
