<?php namespace estvoyage\ticTacToe;

interface condition
{
	function nbooleanIs(bool $boolean) :void;
	function recipientOfConditionWithArgumentsIs(array $arguments, condition\recipient $recipient) :void;
}
