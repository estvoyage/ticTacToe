<?php namespace estvoyage\ticTacToe\ninteger\operation\unary;

use estvoyage\ticTacToe\{ ninteger, block };

class multiplication extends any
{
	function __construct(int $ninteger1, block $overflow = null)
	{
		parent::__construct($ninteger1, new ninteger\operation\binary\multiplication($overflow));
	}
}
