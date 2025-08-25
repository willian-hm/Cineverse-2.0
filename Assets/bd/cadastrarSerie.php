<?php
require_once "serieDAO.php";

serieDAO::cadastrarSerie($_POST);

header("location: ../../cineverse.php");