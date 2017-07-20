<?php 


class PlayerDice implements IPlayerDice {

	private $playerType;
	private $playerDice = array();

	/**
	* Set the player type (attacker/defender) and number of dice each party will have
	* @param (string) $playerType
	* @param (int) $iNumberOfDice
	* @param (array) $changeDiceArray
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
	
	/**
	* Set the dice sides -- could be used change 6 sided dice to 8 sided dice
	* @param ( array ) $changeDiceArray
	*/
	private function changeDice($changeDiceArray)
	{
		$diceCount = count( $changeDiceArray);
		for ($i=0; $i < $diceCount; $i++) { 
			$this->playerDice[$i]->setDiceSides($changeDiceArray[$i]);
		}
	}
	/**
	* Number of dice the player will have
	* @param (int) $iNumberOfDice
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
	* @param (IDice) $dice
	*/
	private function addDiceToPlayer(IDice $dice) {
		$this->playerDice[] = $dice;
	}

	//rolls all dice
	public function rollAllDice()
	{
		$diceCount = count($this->playerDice);
		$rolls = array();
		if($diceCount > 0) 
		{
			for ($i=0; $i < $diceCount; $i++) 
			{ 
				$dice = $this->playerDice[$i];
				$rolls[] = $dice->roll();
			}
		}
		rsort($rolls);
		return $rolls;
	}
	
	//remove all dice
	public function removeAllDice()
	{
		$this->playerDice = array();
	}


}

?>
