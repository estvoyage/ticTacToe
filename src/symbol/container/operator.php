<?php namespace estvoyage\ticTacToe\symbol\container;

use estvoyage\ticTacToe\symbol;

interface operator extends symbol\recipient
{
	function recipientOfTicTacToeSymbolContainerIs(symbol\container\recipient $recipient) :void;
}
