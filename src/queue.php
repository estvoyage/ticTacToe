<?php namespace estvoyage\ticTacToe;

interface queue
{
	function recipientOfQueueWithValueIs($value, queue\recipient $recipient) :void;
	function recipientOfValueInQueueIs(queue\value\recipient $recipient) :void;
	function blockIs(block $block) :void;
}
