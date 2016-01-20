/**
* int dice count
* array dice sides
*/
function PlayerDice(iDiceCount, aDiceType) {

	this.createDiceForPlayer = function(){

		var playerDice = new Array();

		for (var i = 0; i < this.diceCount; i++) {
			playerDice.push(new Dice(aDiceType[i]));
		}
		return playerDice;
	}

	this.diceCount = iDiceCount;
	this.dice = this.createDiceForPlayer(); 
	

}
PlayerDice.prototype.rollAllDice = function() {
	
	var diceValuesFromRoll = new Array();


	for(var i = 0; i < this.diceCount; i++) {
		var currentDice = this.dice[i];
		diceValuesFromRoll.push(currentDice.roll());
	}

	//sort the values here
	diceValuesFromRoll.sort(function(a, b){return b-a});

	return diceValuesFromRoll;

};


