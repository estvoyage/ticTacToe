<?php namespace estvoyage\ticTacToe\tests\units\data\provider\ninteger;

trait addition
{
	protected function noOverflowProvider()
	{
		return [
			[ 0, 0, 0 ],
			[ 0, 1, 1 ],
			[ 1, 0, 1 ],
			[ 3, 2, 5 ],
			[ 2, 3, 5 ],
			[ -2, 3, 1 ],
			[ 3, -2, 1 ],
			[ -3, -2, -5 ],
			[ -2, -3, -5 ]
		];
	}

	protected function overflowProvider()
	{
		return [
			[ PHP_INT_MAX, 1 ],
			[ PHP_INT_MIN, -1 ]
		];
	}
}
