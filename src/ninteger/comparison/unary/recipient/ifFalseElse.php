<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary\recipient;

use estvoyage\ticTacToe\{ ninteger, nboolean, block };

class ifFalseElse extends ninteger\comparison\unary\recipient\condition
	implements
		ninteger\comparison\unary\recipient
{
	function __construct(block $false, block $true)
	{
		parent::__construct(new nboolean\recipient\ifTrueElse($true, $false));
	}
}
