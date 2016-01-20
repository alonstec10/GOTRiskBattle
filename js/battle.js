/**
* Each parameter must be a attacker of
*/



function BattleRoll(oAttackerDice, oDefenderDice) {

	try {
		if(typeof(oAttackerDice) != 'object' || typeof(oDefenderDice) != 'object') {
			throw "Error: attacker dice or defender dice not configured correctly";
		}
		if(!(oAttackerDice instanceof AttackerDice)) {
			throw "Attacker Dice not set correctly";
		}

		if(!(oDefenderDice instanceof DefenderDice)) {
			throw "Defender Dice not set correctly";
		}

	} catch(err) {
		alert(err);
	}


	this.attackerDiceConfig = oAttackerDice;
	this.defenderDiceConfig = oDefenderDice;

	this.modifiers = new Array();
	this.outcome = {};
};

BattleRoll.prototype.rollAttackerAndDefenderDice = function() {
	
	var rollDiceObject = {};

	var attackerRollValues = this.attackerDiceConfig.dice.rollAllDice();
	var defenderRollValues = this.defenderDiceConfig.dice.rollAllDice();

	return {"attackValues" : attackerRollValues, "defendRollValues": defenderRollValues};

}

//change value to the highest die
//all ties attacker wins
//reroll one die
BattleRoll.prototype.addAttackModifier = function(iModfierType){

	switch(iModfierType) {
		case 1:

		break;
	}

}

BattleRoll.prototype.startBattle = function(iAttackerHighestDie, iAttackerAllDie, iDefenderHighestDie, iDefenderAllDie){

	var playerRollValues = this.rollAttackerAndDefenderDice();
	var attackValues = playerRollValues['attackValues'];
	var defendValues = playerRollValues['defendRollValues']; 

	//log("attack values pre-buff: ", attackValues);
	//log("defend values pre-buff: ", defendValues);

	//add all the buffs for attacker and defender
	attackValues[0] = attackValues[0] + iAttackerHighestDie;

	for(var i = 0; i < attackValues.length; i++) {
		attackValues[i] = attackValues[i] + iAttackerAllDie;
	}

	defendValues[0] = defendValues[0] + iDefenderHighestDie;

	for(var i = 0; i < defendValues.length; i++) {
		defendValues[i] = defendValues[i] + iDefenderAllDie;
	}

	var battleOutcome = {"attacker" : 0, "defender" : 0};

	if(attackValues[0] > defendValues[0]) {
		battleOutcome.attacker++;
	} else {
		battleOutcome.defender++;
	}

	if(defendValues[1] && attackValues[1] > defendValues[1]) {
		battleOutcome.attacker++;
	} else {
		battleOutcome.defender++;
	}

	//log("attack values pre-buff: ", attackValues);
	//log("defend values pre-buff: ", defendValues);


	this.outcome = battleOutcome;
	return battleOutcome;	

}



var attackDice = new AttackerDice(3, [6, 6, 6]);

var defenderDice = new DefenderDice(2, [6, 6]);


var battleRollObject = new BattleRoll(attackDice, defenderDice);


var outcome = battleRollObject.startBattle(0, 0, 0, 1);

log(outcome);
//just adding this to add another tag



