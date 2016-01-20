'user strict';
/**
* int device type
* 
*/
function Dice (iDiceType){
	//return int -- number of sides of dice
	this.getSidedDice	=	function(sType){
		if(sType == 8) {
			return 8;
		} else {
			return 6;
		}
	};
	//6 sided dice or 8 sided dice
	this.diceSides = this.getSidedDice(iDiceType);
	this.minDiceValue = 1;
	this.maxDiceValue = this.diceSides;
}
/**
* Rolls dice set in the constructor
*/
Dice.prototype.roll = function(){
	var random = Math.random() * this.diceSides;
	var ceil = Math.ceil(random);
	return ceil;
};

