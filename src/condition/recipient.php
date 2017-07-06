<?php namespace estvoyage\ticTacToe\condition;

use estvoyage\ticTacToe\condition;

interface recipient
{
	function conditionIs(condition $condition) :void;
}
