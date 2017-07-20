<?php 
require_once('interface/IDice.php');
require_once('interface/IPlayerDice.php');
require_once('classes/Dice.php');
require_once('classes/PlayerDice.php');
/*******

	Small Program based on Game of Risk
	A Battle Conists of each player with Dice.
	This program simulates that experience and shows the outcome of a battle.
	Each player sets their Dice amount and how many sides the dice has

********/

class BattleException extends Exception {

	const THROW_BATTLE = 0;

}




class Battle 
{
	private $attacker;
	private $denfeder;
	private $outcome;

	private $outcome_datatype = 'json';


	/**
	* Constructor for Battle class
	* @param (IPlayerDice) $attacker
	* @param (IPlayerDice) $defender
	*/
	public function __construct(IPlayerDice $attacker, IPlayerDice $defender) 
	{
		$this->attacker = $attacker;
		$this->defender = $defender;
	}

	/**
	* Start battle with attacker and defender dice
	* @return (Mixed) $battleOutcome
	*/
	

	public function startBattle()
	{
		$totalRolls = $this->rollAllPlayersDice();
		$attackValues = $totalRolls->attacker;
		$defenderValues = $totalRolls->defender; 

		$battleOutcome = new stdClass();
		$battleOutcome->attacker = 0;
		$battleOutcome->defender = 0;
		$battleOutcome->defender_rows = $defenderValues;
		$battleOutcome->attack_rolls = $attackValues;
	
		if($attackValues[0] > $defenderValues[0])
		{
			$battleOutcome->attacker++;
		}
		else 
		{
			$battleOutcome->defender++;
		}


		if($defenderValues[1] && $attackValues[1] > $defenderValues[1]) {
			$battleOutcome->attacker++;
		} else {
			$battleOutcome->defender++;
		}

		$this->outcome = $battleOutcome;
		return json_encode($battleOutcome);	
	}
	
	/**
	* set outcome data type ex. json, xml
	*/
	public function setOutcomeDataType( $datatype )
	{
		$datatypes = array('json', 'xml');
		if( !in_array($datatype, $datatypes) )
		{
			$this->outcome_datatype = 'json';			
		}
		else 
		{
			$this->outcome_datatype = $datatype;
		}
	}


	/**
	* Roll all the players Dice
	*/
	private function rollAllPlayersDice()
	{
		return (object)array('attacker' => $this->attacker->rollAllDice(), 'defender' => $this->defender->rollAllDice());
	}



}


$attackPlayerDice = new PlayerDice('attacker', 3, array(8, 6, 6));
//$rolls = $playerDice->rollAllDice();
//var_dump($rolls);
$defenderPlayerDice = new PlayerDice('defender', 2, array(8, 6));
//$rolls = $playerDice->rollAllDice();
//var_dump($rolls);

$battle = new Battle($attackPlayerDice, $defenderPlayerDice);

echo $battle->startBattle();

$xml = new SimpleXMLElement('<xml/>');

echo $xml;


?>
