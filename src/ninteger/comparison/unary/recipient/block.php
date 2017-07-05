<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary\recipient;

use estvoyage\{ ticTacToe, ticTacToe\ninteger };

class block extends ticTacToe\block\proxy
	implements ninteger\comparison\unary\recipient
{
	function comparisonWithNIntegerIs(int $ninteger, bool $boolean) :void
	{
		parent::blockArgumentsAre($ninteger, $boolean);
	}
}
