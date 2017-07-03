<?php namespace estvoyage\ticTacToe\ninteger\recipient;

use estvoyage\ticTacToe\{ ninteger, block };

class functor extends block\functor
	implements
		ninteger\recipient
{
	function nintegerIs(int $ninteger) :void
	{
		parent::blockArgumentsAre($ninteger);
	}
}
