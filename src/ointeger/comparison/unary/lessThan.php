<?php namespace estvoyage\ticTacToe\ointeger\comparison\unary;

use estvoyage\ticTacToe\{ ointeger, ninteger };

class lessThan extends any
{
	function __construct(ointeger $ointeger)
	{
		parent::__construct($ointeger, new ninteger\comparison\binary\lessThan);
	}
}
