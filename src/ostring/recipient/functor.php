<?php namespace estvoyage\ticTacToe\ostring\recipient;

use estvoyage\ticTacToe\{ ostring, block };

class functor extends block\functor
	implements
		ostring\recipient
{
	function ostringIs(ostring $ostring) :void
	{
		parent::blockArgumentsAre($ostring);
	}
}
