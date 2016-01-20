function AttackerDice(iDiceCount, aDiceType) {
	this.type = "attacker";
	this.dice = new PlayerDice(iDiceCount, aDiceType);
	return this;
}
