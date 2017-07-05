<?php namespace estvoyage\ticTacToe\ninteger\comparison;

use estvoyage\ticTacToe\nboolean;

interface unary
{
	function recipientOfComparisonWithNIntegerIs(int $ninteger, unary\recipient $recipient) :void;
	function recipientOfComparisonWithNIntegerIsNBooleanRecipient(int $ninteger, nboolean\recipient $recipient) :void;
}
