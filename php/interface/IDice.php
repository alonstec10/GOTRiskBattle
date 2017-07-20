<?php 

/**
* Interface for dice rolls 
* Dice for Risk: Game of Thrones
* @author alan fiedler <alonstec10@gmail.com>
*/

abstract class IDice {

	private $diceSide = 6;
	private $diceMinValue = 1;
	private $diceMaxValue = 6;

	protected $value = 0; //value of the dice

	public abstract function roll();
	public abstract function modify( Modifier $mod);

	/**
	* Sets the amount of sides for a dice
	* @return bool
	*/
	public function setDiceSides($iNum)
	{
		if(is_numeric($iNum) && ($iNum === 6 || $iNum === 8))
		{
			$this->diceSide = $iNum;
			$this->setMinMaxDiceValues();
			return true;
		}
		else 
		{
			return false;
		}

	}

	/**
	* Get the amount of sides of dice
	* @return int
	*/
	public function getDiceSides() 
	{
		return $this->diceSide;
	}

	/**
	* Sets max value for dice
	*/
	private function setMinMaxDiceValues()
	{
		$diceNumberOfSides = $this->getDiceSides();
		if($diceNumberOfSides === 6) 
		{
			$this->diceMaxValue = 6;
		} 
		else 
		{
			$this->diceMaxValue = 8;
		}
	}

	public function getDiceMinValue() 
	{
		return $this->diceMinValue;
	}

	public function getDiceMaxValue() 
	{
		return $this->diceMaxValue;
	}

}




?>
