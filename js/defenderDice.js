function DefenderDice(iDiceCount, aDiceType) {
	this.type = "defender";
	this.dice = new PlayerDice(iDiceCount, aDiceType);
	return this;
}
