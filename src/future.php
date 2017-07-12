<?php namespace estvoyage\ticTacToe;

interface future
{
	function blockIs(block $block) :void;
	function valueIs($value) :void;
}
