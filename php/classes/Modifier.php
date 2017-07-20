<?php 

/**
* Class to modify rolls any time of the game process
*/


class Modifier 
{

	private $name;
	private $value = 0;

	/**
	* Modifier constructor
	* @param (string) $name
	* @param (int) $valueChange
	*/
	public function __construct( $name = '', $valueChange = 0 ) 
	{
		$this->name = $name;
		$this->value = $valueChange;
	}

}
?>
