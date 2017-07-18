<?php namespace estvoyage\ticTacToe\ninteger\comparison;

use estvoyage\ticTacToe\condition;

interface unary
{
	function conditionOfComparisonWithNIntegerIs(int $ninteger, condition $condition) :void;
}
