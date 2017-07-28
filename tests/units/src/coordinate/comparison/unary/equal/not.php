<?php namespace estvoyage\ticTacToe\tests\units\coordinate\comparison\unary\equal;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class not extends units\test
{
	function testConditionForComparisonWithTicTacToeCoordinateIs_withNoMessageFromReferenceAndCoordinate()
	{
		$this
			->given(
				$this->newTestedInstance($reference = new mockOfTicTacToe\coordinate),
				$coordinate = new mockOfTicTacToe\coordinate,
				$condition = new mockOfTicTacToe\condition
			)
			->if(
				$this->testedInstance->conditionForComparisonWithTicTacToeCoordinateIs($coordinate, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($reference))
				->mock($condition)
					->receive('nbooleanIs')
						->never
		;
	}

	/**
	 * @dataProvider dataProvider
	 */
	function testConditionForComparisonWithTicTacToeCoordinateIs_withNIntegers($referenceRowValue, $referenceColumnValue, $coordinateRowValue, $coordinateColumnValue, $nboolean)
	{
		$this
			->given(
				$this->newTestedInstance($reference = new mockOfTicTacToe\coordinate),

				$condition = new mockOfTicTacToe\condition,

				$referenceRow = new mockOfTicTacToe\coordinate\place,
				$this->calling($referenceRow)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($referenceRowValue) {
					$recipient->nintegerIs($referenceRowValue);
				},

				$referenceColumn = new mockOfTicTacToe\coordinate\place,
				$this->calling($referenceColumn)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($referenceColumnValue) {
					$recipient->nintegerIs($referenceColumnValue);
				},

				$this->calling($reference)->recipientOfPlaceInTicTacToeBoardRowsIs = function($recipient) use ($referenceRow) {
					$recipient->placeInTicTacToeBoardIs($referenceRow);
				},
				$this->calling($reference)->recipientOfPlaceInTicTacToeBoardColumnsIs = function($recipient) use ($referenceColumn) {
					$recipient->placeInTicTacToeBoardIs($referenceColumn);
				},

				$coordinateRow = new mockOfTicTacToe\coordinate\place,
				$this->calling($coordinateRow)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($coordinateRowValue) {
					$recipient->nintegerIs($coordinateRowValue);
				},

				$coordinateColumn = new mockOfTicTacToe\coordinate\place,
				$this->calling($coordinateColumn)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($coordinateColumnValue) {
					$recipient->nintegerIs($coordinateColumnValue);
				},

				$coordinate = new mockOfTicTacToe\coordinate,
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardColumnsIs = function($recipient) use ($coordinateColumn) {
					$recipient->placeInTicTacToeBoardIs($coordinateColumn);
				},
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardRowsIs = function($recipient) use ($coordinateRow) {
					$recipient->placeInTicTacToeBoardIs($coordinateRow);
				}
			)
			->if(
				$this->testedInstance->conditionForComparisonWithTicTacToeCoordinateIs($coordinate, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($reference))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments($nboolean)
							->once
		;
	}

	protected function dataProvider()
	{
		return [
			[ 2, 2, 1, 1, true ],
			[ 2, 1, 1, 1, true ],
			[ 1, 2, 1, 1, true ],
			[ 1, 1, 1, 1, false ],
			[ 1, 1, 1, 2, true ],
			[ 1, 1, 2, 1, true ],
			[ 1, 1, 2, 2, true ]
		];
	}
}
