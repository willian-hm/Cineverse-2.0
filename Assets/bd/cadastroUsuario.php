<?php
require_once "UsuarioDAO.php";

UsuarioDAO::cadastrar($_GET);

header("location: ../../index.php");