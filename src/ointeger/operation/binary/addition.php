<?php namespace estvoyage\ticTacToe\ointeger\operation\binary;

use estvoyage\ticTacToe\{ ointeger, block, ninteger };

class addition extends any
{

	function __construct(ointeger $template, block $overflow = null)
	{
		parent::__construct($template, new ninteger\operation\binary\addition($overflow));
	}
}
