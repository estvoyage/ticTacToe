<?php namespace estvoyage\ticTacToe\block;

use estvoyage\ticTacToe\block;

interface argument
{
	function blockIs(block $block) :void;
	function recipientOfBlockArgumentWithValueIs($value, argument\recipient $recipient) :void;
}
