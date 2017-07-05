<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary;

use estvoyage\ticTacToe\{ nboolean, ninteger\comparison };

class lessThan extends any
{
	function __construct($ninteger = 0)
	{
		parent::__construct($ninteger, new comparison\binary\lessThan);
	}
}
