<?php
$inputArr = array();
for ($j = 0; $j < 3; $j++) {
        for ($i = 0; $i < 3; $i++) {
      fscanf(STDIN, "%d\n", &$inputArr[$i][$j]);
        }
    }
fscanf(STDIN, "%d\n", &$player);
$gameOver = 0;
if($player == 1) $bot = 2;
else if($player == 2) $bot = 1;
while(!$gameOver)
{
	while(1)
	{
		$x = rand(0,2);
		$y = rand(0,2);
		if($inputArr[$x][$y] == 0)
		{
			echo $x." ".$y."\n";
			$inputArr[$x][$y] = $bot;
			$gameOver = checkWin($inputArr);
			if($gameOver != 0)
			{
			 	echo $gameOver. "wins";	
				return;
			}
			break;
		}
	}
	echo "player turn enter x-cordinate: ";
	fscanf(STDIN,"%d",&$botTurnX);
	echo "player turn enter y-cordinate: ";
	fscanf(STDIN,"%d",&$botTurnY);
	$inputArr[$botTurnX][$botTurnY] = $player;
	$gameOver = checkWin($inputArr);
	if($gameOver != 0)
	{
	 	echo $gameOver. "wins";	
		return;
	}
}

function checkWin($inputArr)
{
	//check rows
	for($i=0;$i<3;$i++)
	{
		if(($inputArr[$i][0] == $inputArr[$i][1]) && ($inputArr[$i][1] == $inputArr[$i][2]))
		return $inputArr[$i][1];
	}
	//check columns
	for($j=0;$j<3;$j++)
	{
		if(($inputArr[0][$j] == $inputArr[1][$j]) && ($inputArr[1][$j] == $inputArr[2][$j]))
		return $inputArr[0][$j];
	}
	//check diagonals
	if(($inputArr[0][0] == $inputArr[1][1]) && ($inputArr[1][1] == $inputArr[2][2]))
	{
		return $inputArr[0][0];
	}
	if(($inputArr[2][0] == $inputArr[1][1]) && ($inputArr[1][1] == $inputArr[0][2]))
	{
		return $inputArr[2][0];
	}
	return 0;
	
}
?>
