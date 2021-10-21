<?php

$banco = new mysqli("localhost", "root", "fenocriador", "barbearia");

if ($banco->connect_errno):
    die("Erro (".$banco->connect_errno.") ".$banco->connect_error);
endif;