<?php namespace estvoyage\ticTacToe\mixed\comparison\unary\with\numeric;

use estvoyage\ticTacToe\condition;

class type
{
	function conditionForComparisonWithMixedIs($mixed, condition $condition) :void
	{
		$condition->nbooleanIs(is_numeric($mixed));
	}
}
