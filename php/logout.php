<?php
//fermer la session et rediriger vers index.php
session_destroy();
header("Location: /");
?>