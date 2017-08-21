<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\place\comparison\unary\ointeger;

require __DIR__ . '/../../../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;

class lessThanOrEqualTo extends units\matrix\coordinate\place\comparison\unary\ointeger
{
	protected function dataProvider()
	{
		return [
			[ $ointegerValue = rand(1, PHP_INT_MAX), $ointegerValue, true ],
			[ rand(PHP_INT_MIN, PHP_INT_MAX - 1), PHP_INT_MAX, true ],
			[ PHP_INT_MAX, rand(1, PHP_INT_MAX - 1), false ]
		];
	}
}
