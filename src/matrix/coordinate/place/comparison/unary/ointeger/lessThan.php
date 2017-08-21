<?php namespace estvoyage\ticTacToe\matrix\coordinate\place\comparison\unary\ointeger;

use estvoyage\{ ticTacToe, ticTacToe\matrix\coordinate\place, ticTacToe\condition, ticTacToe\ninteger };

class lessThan extends place\comparison\unary\ointeger\any
{
	function __construct(ticTacToe\ointeger $ointeger)
	{
		parent::__construct($ointeger, new ninteger\comparison\binary\lessThan);
	}
}
