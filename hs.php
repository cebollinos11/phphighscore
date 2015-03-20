<?php

require_once('hsclass.php'); //include class

//handle input
if(isset($_GET["score"]));
{
	$score = $_GET["score"];
	echo $score;
	echo is_int($score);
}
	


if(0)
{
	$hscore = new HighScore;
	$hscore->loadData();
	$hscore->addScore("figo","66");
	$hscore->sortScores();
	$hscore->truncateHS();
	$hscore->showData();
	$hscore->saveData();
}


?>