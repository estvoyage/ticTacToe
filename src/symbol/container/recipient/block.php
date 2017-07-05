<?php namespace estvoyage\ticTacToe\symbol\container\recipient;

use estvoyage\{ ticTacToe, ticTacToe\symbol };

class block extends ticTacToe\block\proxy
	implements
		symbol\container\recipient
{
	function ticTacToeSymbolContainerIs(symbol\container $container) :void
	{
		parent::blockArgumentsAre($container);
	}
}
