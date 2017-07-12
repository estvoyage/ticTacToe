<?php namespace estvoyage\ticTacToe\ointeger\recipient;

use estvoyage\ticTacToe\{ ointeger, block };

class functor extends block\functor
	implements
		ointeger\recipient
{
	function ointegerIs(ointeger $ointeger) :void
	{
		parent::blockArgumentsAre($ointeger);
	}
}
