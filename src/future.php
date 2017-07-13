<?php namespace estvoyage\ticTacToe;

interface future
{
	function futureForblockIs(block $block, block $future) :void;
	function valueForFutureIs($value) :void;
}
