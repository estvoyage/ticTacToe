<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary\recipient;

use estvoyage\ticTacToe\{ ninteger, block };

class functor extends block\functor
	implements
		ninteger\comparison\unary\recipient
{
	function comparisonWithNIntegerIs(int $ninteger, bool $boolean) :void
	{
		parent::blockArgumentsAre($ninteger, $boolean);
	}
}
