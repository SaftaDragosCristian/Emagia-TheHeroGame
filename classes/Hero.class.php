<?php

class Hero extends Character{
	
	//private static $rapidStrikePrecent = 10;
	//private static $magicShieldPrecent = 20;

	//The RapidStrike Skill 
	public function RapidStrike($health, $name, $defence, $rapidNumber){
		if($rapidNumber == 3){
			$rapidStrikeThisRound = 1;
		}else $rapidStrikeThisRound = 0;
		if($rapidStrikeThisRound == 1){
			$damage = $this->strength -$defence;
			$health = $health - $damage;
			echo "It looks like the Hero has something up his sleeve! It is a RAPID STRIKE! The damage caused by the Rapid Strike is:". $damage . "<br>";
			echo "The remaining health of the beast is:" . $health . "<br>";	
		}
		return $health;
	}

	//The MagicShield Skill
	public function MagicShield($strength, $magicShieldNumber){
		if(($magicShieldNumber == 1) || ($magicShieldNumber == 3)){
			$magicShieldThisRound = 1;
		}else $magicShieldThisRound = 0;
		if($magicShieldThisRound == 1){
						$damage = ($strength -$this->defence)/2;
						$this->health = $this->health - $damage;
						echo "The Beast attacked! But the Hero got the time to block the attack with his Magic Shield! The damage caused is :" . $damage."<br>";
						echo "The remaining health of the hero is:" . $this->health . "<br>";
						
		}
		return $magicShieldThisRound;
	}
	
}


?>