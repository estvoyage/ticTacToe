<?php namespace estvoyage\ticTacToe\exception\catcher\error;

use estvoyage\ticTacToe\php;

class type extends any
{
	function __construct(\error $error)
	{
		parent::__construct($error, new php\classname\any('typeError'));
	}
}
