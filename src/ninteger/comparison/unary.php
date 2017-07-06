<?php namespace estvoyage\ticTacToe\ninteger\comparison;

use estvoyage\ticTacToe\condition;

interface unary
{
	function recipientOfComparisonWithNIntegerIs(int $ninteger, unary\recipient $recipient) :void;
	function recipientOfComparisonWithNIntegerIsCondition(int $ninteger, condition $condition) :void;
}
