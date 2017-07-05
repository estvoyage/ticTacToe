<?php namespace estvoyage\ticTacToe\symbol\recipient;

use estvoyage\{ ticTacToe, ticTacToe\symbol };

class block extends ticTacToe\block\proxy
	implements
		symbol\recipient
{
	function ticTacToeSymbolIs(symbol $symbol) :void
	{
		parent::blockArgumentsAre($symbol);
	}
}
