<?php namespace estvoyage\ticTacToe\tests\units\iterator;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class fifo extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\iterator')
		;
	}

	function testValuesForIteratorPayloadAre()
	{
		$this
			->given(
				$this->newTestedInstance,
				$values = range(0, 2),
				$payload = new mockOfTicTacToe\iterator\payload,
				$this->calling($payload)->currentValueOfIteratorIs = function($iterator, $value) use (& $valuesFromIterator) {
					$valuesFromIterator[] = $value;
				}
			)
			->if(
				$this->testedInstance->valuesForIteratorPayloadAre($payload, $values)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->array($valuesFromIterator)
					->isEqualTo($values)

			->given(
				$valuesFromIterator = null,
				$this->calling($payload)->currentValueOfIteratorIs = function($iterator, $value) use (& $valuesFromIterator) {
					$valuesFromIterator[] = $value;

					if ($value == 1)
					{
						$iterator->nextValuesAreUselessForIteratorPayload();
					}
				}
			)
			->if(
				$this->testedInstance->valuesForIteratorPayloadAre($payload, $values)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->array($valuesFromIterator)
					->isEqualTo([ 0, 1 ])
		;
	}
}
