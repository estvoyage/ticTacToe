<?php namespace estvoyage\ticTacToe\ointeger\comparison;

use estvoyage\ticTacToe\{ condition, ointeger };

interface unary
{
	function recipientOfComparisonWithOIntegerIsCondition(ointeger $ointeger, condition $condition) :void;
}
