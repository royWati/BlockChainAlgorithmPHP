<?php

require './Chain.php';

header("content-type:application/json");
echo Chain::StartMining();
?>