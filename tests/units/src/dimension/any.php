<?php namespace estvoyage\ticTacToe\tests\units\dimension;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\dimension')
		;
	}

	/**
	 * @dataProvider firstArgumentIsInvalidrovider
	 */
	function test__construct_withInvalidFirstArgument($width, $height)
	{
		$this
			->exception(
				function() use ($width, $height) {
					$this->newTestedInstance($width, $height);
				}
			)
				->isInstanceOf('typeError')
				->hasMessage('First argument must be an integer greater than or equal to 0')
		;
	}

	/**
	 * @dataProvider secondArgumentIsInvalidrovider
	 */
	function test__construct_withInvalidSecondArgument($width, $height)
	{
		$this
			->exception(
				function() use ($width, $height) {
					$this->newTestedInstance($width, $height);
				}
			)
				->isInstanceOf('typeError')
				->hasMessage('Second argument must be an integer greater than or equal to 0')
		;
	}

	protected function firstArgumentIsInvalidrovider()
	{
		return [
			[ rand(PHP_INT_MIN, -1), rand(0, PHP_INT_MAX) ]
		];
	}

	protected function secondArgumentIsInvalidrovider()
	{
		return [
			[ rand(0, PHP_INT_MAX), rand(PHP_INT_MIN, -1) ]
		];
	}
}
