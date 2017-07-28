<?php namespace estvoyage\ticTacToe\nstring\recipient;

use estvoyage\ticTacToe\{ nstring, block };

class functor extends block\functor
	implements
		nstring\recipient
{
	function nstringIs(string $nstring) :void
	{
		parent::blockArgumentsAre($nstring);
	}
}
