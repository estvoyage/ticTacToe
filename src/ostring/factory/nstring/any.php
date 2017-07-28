<?php namespace estvoyage\ticTacToe\ostring\factory\nstring;

use estvoyage\ticTacToe\ostring;

class any
	implements
		ostring\factory\nstring
{
	function recipientOfOStringWithNStringIs(string $nstring, ostring\recipient $recipient) :void
	{
		$recipient->ostringIs(new ostring\any($nstring));
	}
}
