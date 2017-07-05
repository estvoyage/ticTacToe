<?php namespace estvoyage\ticTacToe\symbol\container\recipient;

use estvoyage\ticTacToe\{ symbol, block };

class functor extends block\functor
	implements
		symbol\container\recipient
{
	function ticTacToeSymbolContainerIs(symbol\container $container) :void
	{
		parent::blockArgumentsAre($container);
	}
}
