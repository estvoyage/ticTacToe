<?php namespace estvoyage\ticTacToe\symbol\recipient;

use estvoyage\ticTacToe\{ block, symbol };

class functor extends block\functor
	implements
		symbol\recipient
{
	function ticTacToeSymbolIs(symbol $symbol) :void
	{
		parent::blockArgumentsAre($symbol);
	}
}
