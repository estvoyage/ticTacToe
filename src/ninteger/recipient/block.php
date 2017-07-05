<?php namespace estvoyage\ticTacToe\ninteger\recipient;

use estvoyage\{ ticTacToe, ticTacToe\ninteger };

class block extends ticTacToe\block\proxy
	implements
		ninteger\recipient
{
	function nintegerIs(int $ninteger) :void
	{
		parent::blockArgumentsAre($ninteger);
	}
}
