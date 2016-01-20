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
		return rand ( $this->getDiceMinValue() , $this->getDiceMaxValue() );
	}

}

?>