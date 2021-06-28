<?php

class Character{
	//The Hero and the Beast have the same stats and attack the same. 
	//The only thing that differs are the skills that are only available to use for the Hero.
	//This is why, both the Hero and the Beast are at core the same class. 

	// Properties
	public $name; 
	public $health;
	public $strength;
	public $defence;
	public $speed;
	public $luck;
	

	//Constructor
	public function __construct($name, $health, $strength, $defence, $speed, $luck){
		$this->name = $name;
		echo nl2br($name . " stats: ");
		$this->health = $health;
		echo "Health: ".$health;
		echo str_repeat('&nbsp;', 5);
		$this->strength = $strength;
		echo "Strength: ".$strength;
		echo str_repeat('&nbsp;', 5);
		$this->defence = $defence;
		echo "Defence: ".$defence;
		echo str_repeat('&nbsp;', 5);
		$this->speed = $speed;
		echo "Speed: ".$speed;
		echo str_repeat('&nbsp;', 5);
		$this->luck = $luck;
		echo "Luck: ".$luck;
		echo "<br>";
	}

	//Function which calculates the "k" that is taken into
	//account when deciding which character attacks first.
	public function Kfinder($speed1, $speed2, $luck1, $luck2){
		if($speed1 > $speed2){
			$k = 1;
		}else if ($speed1 < $speed2){
			$k=0;
		}else if($luck1 > $luck2){
						$k=1;
					}else if ($luck1 < $luck2){
						$k=0;
					}else $k=rand(0,1);
					return $k; 
	}

	//Function which calculates the damage and the remaining health of the character who got attacked.
	public function getsAttacked($strength, $name1){
		$damage = $strength - $this->defence;
		$this->health = $this->health - $damage;
		echo "The ".$name1." attacked! The damage caused is:" . $damage."<br>";
		echo "The remaining health of the ".$this->name." is:" . $this->health."<br>";
	}


	//Function which decides if 
	//an instance of this class(in our case, either Beast or Hero)
	//gets lucky or not
	public function gotLucky($name1,$luckyNumber){
		$luckThisRound = 0;
		if (($this->luck >=10) && ($this->luck <=16)){
			if($luckyNumber == 1)
						$luckThisRound = 1;
			}else if (($this->luck >16) && ($this->luck <=25)){
					if(($luckyNumber == 1) || ($luckyNumber == 3))
						$luckThisRound = 1;
				}else if (($this->luck >25) && ($this->luck <=34)){
						if(($luckyNumber == 1) || ($luckyNumber == 3) || ($luckyNumber == 5))
								 $luckThisRound = 1;  
						}else if (($this->luck >34) && ($this->luck <=40)){
							if(($luckyNumber == 1) || ($luckyNumber == 3) || ($luckyNumber == 5) || ($luckyNumber == 7))
								 $luckThisRound = 1;  
						}else  $luckThisRound = 0; 
						if($luckThisRound == 1)
						echo " The ". $name1 ." attacked, but the ". $this->name ." got lucky! No damage occured! ". "<br>";

						return $luckThisRound;
	}

	//Function which shows us the winner of the fight.
	public function getWinner($health1, $health2){
		if(($health1 > 0) && ($health2 <= 0)){
			echo "WOW! The Hero won! God praise Orderus!";
		}else if (($health1 <= 0) && ($health2 > 0)){
			echo "Oh no...It looks like the Hero lost...RIP Orderus!";
		}else echo "It looks like both the beast and our hero live to see another day, as they both retreat to heal their wounds.";
	}

}