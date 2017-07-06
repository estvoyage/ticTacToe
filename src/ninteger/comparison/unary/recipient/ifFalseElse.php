<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary\recipient;

use estvoyage\ticTacToe\{ ninteger, condition, block };

class ifFalseElse extends ninteger\comparison\unary\recipient\condition
	implements
		ninteger\comparison\unary\recipient
{
	function __construct(block $false, block $true)
	{
		parent::__construct(new condition\ifTrueElse($true, $false));
	}
}
