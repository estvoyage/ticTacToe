<?php namespace estvoyage\ticTacToe\symbol;

use estvoyage\ticTacToe\symbol;

interface container
{
	function recipientOfContainerWithTicTacToeSymbolIs(symbol $symbol, symbol\container\recipient $recipient) :void;
}
