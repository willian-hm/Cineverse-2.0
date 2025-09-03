<?php
require_once "serieDAO.php";

SerieDAO::cadastrarSerie($_POST);

header("location: ../../cadastrarSeries.php");