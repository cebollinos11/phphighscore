<?php

class HighScore{
	var $data;
	var $filename = "hs.txt";
	var $maxsize = 3; //max highscore entries

	function loadData()
	{
		$dataJSONencoded = file_get_contents($this->filename);
		$this->data = json_decode($dataJSONencoded,true);
	}

	function showData()
	{
		foreach ($this->data["players"] as $key => $value) {
			# code...
			echo $value["name"];
			echo "-";
			echo $value["score"];
			echo "<br>";
		}
	}

	function sortScores()
	{
		function cmp($a, $b)
		{
		    return strcmp($b["score"], $a["score"]);
		}

		usort($this->data["players"], "cmp");
	}

	function saveData(){
		file_put_contents($this->filename, json_encode($this->data));
	}
	

	function addScore($name,$score)
	{
		
		$newplayer["name"]=$name;
		$newplayer["score"]=$score;
		array_push($this->data["players"], $newplayer);
	}

	function truncateHS(){
		$arr_size = count($this->data["players"]);

		$i = 0;
		$times_to_run = $arr_size-$this->maxsize;
		
		while ($i++ < $times_to_run)
		{
			array_pop($this->data["players"]);    
		}

	}
}

$hscore = new HighScore;
$hscore->loadData();
$hscore->addScore("figo","66");
$hscore->sortScores();
$hscore->truncateHS();
$hscore->showData();
$hscore->saveData();

?>