<?php namespace estvoyage\ticTacToe\ointeger\operation\unary;

use estvoyage\ticTacToe\{ ointeger, block };

class addition extends any
{
	function __construct(ointeger $template, ointeger $ointeger, block $overflow = null)
	{
		parent::__construct($ointeger, new ointeger\operation\binary\addition($template, $overflow));
	}
}
