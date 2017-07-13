<?php namespace estvoyage\ticTacToe\block\argument;

use estvoyage\ticTacToe\block;

interface recipient
{
	function argumentForBlockIs(block\argument $argument) :void;
}
