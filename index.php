<?php
	include 'includes/class-autoload.inc.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 

	$counter = 0;
	$Orderus = new Hero("Hero", rand(70,100), rand(70,80), rand(45,55), rand(40,50), rand(10,30));
	$Beast = new Character("Beast", rand(60,90), rand(60,90), rand(40,60), rand(40,60), rand(25,40));
	echo "<br>"."<br>";

	$k = $Orderus->Kfinder($Orderus->speed, $Beast->speed, $Orderus->luck, $Beast->luck );

	while(($Orderus->health > 0) && ($Beast->health > 0) && ($counter < 20)){
		$counter = $counter + 1;
		switch ($k){
			case 1:
				$luckThisRound = $Beast->gotLucky($Orderus->name, rand(1,10));
				if($luckThisRound != 1){
					$Beast->getsAttacked($Orderus->strength, $Orderus->name);
				}
				if($Beast->health > 0){
					$Beast->health = $Orderus -> RapidStrike($Beast->health, $Beast->name, $Beast->defence, rand(1,10));
				}
				$k=0;
				break;
			case 0:
				$luckyThisRound = $Orderus-> gotLucky($Beast->name,rand(1,10));
				if($luckyThisRound != 1){
					$magicShieldThisRound = $Orderus -> MagicShield($Beast->strength, rand(1,10));
					if($magicShieldThisRound != 1){
						$Orderus->getsAttacked($Beast->strength, $Beast->name);
					}
				}
				$k=1;
				break;
			default:
				echo "Oops! Something went wrong!";
				break;
		}
	}

	$Orderus->getWinner($Orderus->health, $Beast->health);

	?>

</body>
</html>