<?php
require "./lib/redbean/rb-mysql.php";
R::setup('mysql:host=db;dbname=phoenix', 'devuser', 'devpass');
// R::setup('mysql:host=localhost;dbname=phoenix', 'pacman', 'NS#KjXxAuAj9#@');
R::freeze(TRUE);
?>
