<?php namespace estvoyage\ticTacToe;

interface stack
{
	function recipientOfStackWithValueIs($value, stack\recipient $recipient) :void;
	function recipientOfValueInStackIs(stack\value\recipient $recipient) :void;
	function blockIs(block $block) :void;
}
