<?php
require_once "serieDAO.php";

SerieDAO::cadastrarSerie($_POST);

header("location: ../../cineverse.php");