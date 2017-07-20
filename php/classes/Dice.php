<?php 




/**
* @author alan fiedler <alonstec10@gmail.com>
*/

class Dice extends IDice {

	/**
	* Function that rolls a dice
	* @return int	
	*/
	public function roll() {
		$this->value = rand( $this->getDiceMinValue(), $this->getDiceMaxValue() );
		return $this->value;
	}

	/**
	* Modify dice roll
	* @param ( Modify )
	*/
	public function modify( Modifier $mod ) 
	{
		$this->value = $this->value + $mod->value;	
		return $this->value;
	}

}

?>
