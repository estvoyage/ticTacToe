<?php namespace estvoyage\ticTacToe\tests\units\coordinate\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class indexer extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\coordinate\recipient')
		;
	}

	/**
	 * @dataProvider validLineAndColumProvider
	 */
	function testLineAndColumnOfTicTacToeSymbolIs_withValidLineAndColumn($line, $column, $key, $width, $height)
	{
		$this
			->given(
				$this->newTestedInstance($width, $height, $blockForKey = new mockOfTicTacToe\block, $blockForInvalidLineOrColumn = new mockOfTicTacToe\block)
			)
			->if(
				$this->testedInstance->lineAndColumnOfTicTacToeSymbolIs($line, $column)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($width, $height, $blockForKey, $blockForInvalidLineOrColumn))
				->mock($blockForKey)
					->receive('blockArgumentsAre')
						->withArguments($key)
							->once
				->mock($blockForInvalidLineOrColumn)
					->receive('blockArgumentsAre')
						->never
		;
	}

	/**
	 * @dataProvider invalidLineAndColumnProvider
	 */
	function testLineAndColumnOfTicTacToeSymbolIs_withInvalidLineAndColumn($line, $column, $width, $height)
	{
		$this
			->given(
				$this->newTestedInstance($width, $height, $blockForKey = new mockOfTicTacToe\block, $blockForInvalidLineOrColumn = new mockOfTicTacToe\block)
			)
			->if(
				$this->testedInstance->lineAndColumnOfTicTacToeSymbolIs($line, $column)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($width, $height, $blockForKey, $blockForInvalidLineOrColumn))
				->mock($blockForKey)
					->receive('blockArgumentsAre')
						->never
				->mock($blockForInvalidLineOrColumn)
					->receive('blockArgumentsAre')
						->once
		;
	}

	protected function validLineAndColumProvider()
	{
		return [
			[ 0, 0, 0, 3, 3 ],
			[ 0, 1, 1, 3, 3 ],
			[ 0, 2, 2, 3, 3 ],
			[ 1, 0, 3, 3, 3 ],
			[ 1, 1, 4, 3, 3 ],
			[ 1, 2, 5, 3, 3 ],
			[ 2, 0, 6, 3, 3 ],
			[ 2, 1, 7, 3, 3 ],
			[ 2, 2, 8, 3, 3 ],
			[ 0, 0, 0, 3, 4 ],
			[ 0, 1, 1, 3, 4 ],
			[ 0, 2, 2, 3, 4 ],
			[ 0, 3, 3, 3, 4 ],
			[ 1, 0, 4, 3, 4 ],
			[ 1, 1, 5, 3, 4 ],
			[ 1, 2, 6, 3, 4 ],
			[ 1, 3, 7, 3, 4 ],
			[ 2, 0, 8, 3, 4 ],
			[ 2, 1, 9, 3, 4 ],
			[ 2, 2, 10, 3, 4 ],
			[ 2, 3, 11, 3, 4 ],
		];
	}

	protected function invalidLineAndColumnProvider()
	{
		return [
			[ - rand(1, 2), - rand(1, 2), 3, 3 ],
			[ rand(3, PHP_INT_MAX), rand(3, PHP_INT_MAX), 3, 3 ],
			[ rand(PHP_INT_MIN, -1), rand(PHP_INT_MIN, -1), 3, 3 ],
			[ PHP_INT_MIN, PHP_INT_MIN, 3, 3 ],
			[ PHP_INT_MAX, PHP_INT_MAX, 3, 3 ]
		];
	}
}
