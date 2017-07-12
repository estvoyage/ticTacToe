<?php namespace estvoyage\ticTacToe\buffer\key\recipient;

use estvoyage\ticTacToe\{ buffer, block };

class functor extends block\functor
	implements
		buffer\key\recipient
{
	function bufferKeyIs(buffer\key $key) :void
	{
		parent::blockArgumentsAre($key);
	}
}
