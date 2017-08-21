<?php namespace estvoyage\ticTacToe\tests\units\ninteger\comparison\binary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;

class lessThan extends units\ninteger\comparison\binary
{
	protected function argumentsProvider()
	{
		return [
			[ rand(PHP_INT_MIN, PHP_INT_MAX - 1), PHP_INT_MAX, true ],
			[ PHP_INT_MAX, rand(PHP_INT_MIN, PHP_INT_MAX - 1), false ],
			[ 0, 0, false ],
			[ PHP_INT_MIN, PHP_INT_MIN, false ],
			[ PHP_INT_MAX, PHP_INT_MAX, false ]
		];
	}
}
