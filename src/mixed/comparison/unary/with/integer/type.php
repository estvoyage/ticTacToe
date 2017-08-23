<?php namespace estvoyage\ticTacToe\mixed\comparison\unary\with\integer;

use estvoyage\ticTacToe\{ condition, mixed, block };

class type extends mixed\comparison\unary\with\numeric\type
{
	function conditionForComparisonWithMixedIs($mixed, condition $condition) :void
	{
		parent::conditionForComparisonWithMixedIs(
			$mixed,
			new condition\not(
				new condition\ifTrueElse(
					new block\functor(
						function() use ($condition)
						{
							$condition->nbooleanIs(false);
						}
					),
					new block\functor(
						function() use ($mixed, $condition)
						{
							$condition->nbooleanIs((int) $mixed == $mixed);
						}
					)
				)
			)
		);
	}
}
