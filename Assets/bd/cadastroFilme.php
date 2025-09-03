<?php
require_once "filmeDAO.php";

filmeDAO::cadastrarFilme($_POST);

header("location: ../../cadastrarFilmes.php");