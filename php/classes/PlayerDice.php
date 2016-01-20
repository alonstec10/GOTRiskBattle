<?php 


class PlayerDice implements IPlayerDice {

	private $playerType;
	private $playerDice = array();

	/**
	* Set the player type (attacker/defender) and number of dice each party will have
	*/
	public function __construct($playerType, $iNumberOfDice, $changeDiceArray = array())
	{
		$this->playerType = $playerType;
		
		$this->createPlayerDice($iNumberOfDice);

		if(count($changeDiceArray) > 0) 
		{
			$this->changeDice($changeDiceArray);
		}


	} 

	private function changeDice($changeDiceArray)
	{
		for ($i=0; $i < count($changeDiceArray); $i++) { 
			$this->playerDice[$i]->setDiceSides($changeDiceArray[$i]);
			//var_dump($this->playerDice[$i]);
		}
	}


	/**
	* @var int Number of dice the player will have
	*/
	public function createPlayerDice($iNumberOfDice)
	{
		
		if(is_numeric($iNumberOfDice) && $iNumberOfDice > 0) 
		{
			for ($i=0; $i < $iNumberOfDice; $i++) 
			{ 	
				$this->addDiceToPlayer(new Dice());
			}
		}

	}

	/**
	* Adds dice to the player
	*/
	private function addDiceToPlayer(IDice $dice) {
		$this->playerDice[] = $dice;
	}


	public function rollAllDice()
	{
		
		$diceCount = count($this->playerDice);
		$rolls = array();
		
		if($diceCount > 0) 
		{
			for ($i=0; $i < $diceCount; $i++) { 
				# code...
				$dice = $this->playerDice[$i];
				$rolls[] = $dice->roll();
			}
			
		}
		
		rsort($rolls);

		return $rolls;
	}

	public function removeAllDice()
	{
		$this->playerDice = array();
	}


}

//$playerDice = new PlayerDice('attacker', 3, array(8, 6, 6));
//$rolls = $playerDice->rollAllDice();
//var_dump($rolls);

?>