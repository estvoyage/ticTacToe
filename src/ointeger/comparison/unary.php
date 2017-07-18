<?php namespace estvoyage\ticTacToe\ointeger\comparison;

use estvoyage\ticTacToe\{ condition, ointeger };

interface unary
{
	function conditionOfComparisonWithOIntegerIs(ointeger $ointeger, condition $condition) :void;
}
