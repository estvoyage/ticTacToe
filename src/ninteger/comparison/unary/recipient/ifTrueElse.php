<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary\recipient;

use estvoyage\ticTacToe\{ ninteger\comparison, block };

class ifTrueElse extends ifFalseElse
{
	function __construct(block $true, block $false)
	{
		parent::__construct($false, $true);
	}
}
