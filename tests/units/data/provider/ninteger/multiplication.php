<?php namespace estvoyage\ticTacToe\tests\units\data\provider\ninteger;

trait multiplication
{
	protected function noOverflowProvider()
	{
		return [
			[ 0, 0, 0 ],
			[ 0, 1, 0 ],
			[ 1, 0, 0 ],
			[ 3, 2, 6 ],
			[ 2, 3, 6 ],
			[ -2, 3, -6 ],
			[ 3, -2, -6 ],
			[ -3, -2, 6 ],
			[ -2, -3, 6 ]
		];
	}

	protected function overflowProvider()
	{
		return [
			[ PHP_INT_MIN, PHP_INT_MAX ],
			[ PHP_INT_MAX, PHP_INT_MIN ],
			[ PHP_INT_MAX, PHP_INT_MAX ],
			[ PHP_INT_MIN, PHP_INT_MIN ]
		];
	}
}
