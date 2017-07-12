<?php namespace estvoyage\ticTacToe\tests\units\matrix;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\{ tests\units, matrix };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix')
		;
	}

	function testRecipientOfDimensionOfMatrixIs()
	{
		$this
			->given(
				$this->newTestedInstance($dimension = new mockOfTicTacToe\matrix\dimension),
				$recipient = new mockOfTicTacToe\matrix\dimension\recipient
			)
			->if(
				$this->testedInstance->recipientOfDimensionOfMatrixIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($dimension))
				->mock($recipient)
					->receive('matrixHasDimension')
						->withArguments($dimension)
							->once
		;
	}

	function testRecipientOfMatrixWithValueAtCoordinateIs()
	{
		$this
			->given(
				$otherValue = 'bar',

				$coordinate = new mockOfTicTacToe\matrix\coordinate,
				$this->calling($coordinate)->recipientOfRowInMatrixIs = function($recipient) {
					$recipient->rowInMatrixIs(new matrix\coordinate\distance\any(0));
				},
				$this->calling($coordinate)->recipientOfColumnInMatrixIs = function($recipient) {
					$recipient->columnInMatrixIs(new matrix\coordinate\distance\any(0));
				},

				$recipient = new mockOfTicTacToe\matrix\recipient,

				$dimension = new mockOfTicTacToe\matrix\dimension,
				$this->calling($dimension)->recipientOfMatrixSizeIs = function($size, $recipient) {
					$recipient->matrixSizeIs(new matrix\size\any(9));
				},
				$this->calling($dimension)->recipientOfNumberOfRowsInMatrixIs = function($recipient) {
					$recipient->numberOfRowsInMatrixIs(new matrix\dimension\side\any(3));
				},
				$this->calling($dimension)->recipientOfNumberOfColumnsInMatrixIs = function($recipient) {
					$recipient->numberOfColumnsInMatrixIs(new matrix\dimension\side\any(3));
				},

				$this->newTestedInstance($dimension, $value = 'foo')
			)
			->if(
				$this->testedInstance->recipientOfMatrixWithValueAtCoordinateIs($otherValue, $coordinate, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($dimension, $value))
				->mock($recipient)
					->receive('matrixIs')
						->withArguments($this->newTestedInstance($dimension, $otherValue))
							->once
		;
	}

	function testRecipientOfMatrixValueAtCoordinateIs()
	{
		$this
			->given(
				$coordinate = new mockOfTicTacToe\matrix\coordinate,
				$this->calling($coordinate)->recipientOfRowInMatrixIs = function($recipient) {
					$recipient->rowInMatrixIs(new matrix\coordinate\distance\any(0));
				},
				$this->calling($coordinate)->recipientOfColumnInMatrixIs = function($recipient) {
					$recipient->columnInMatrixIs(new matrix\coordinate\distance\any(0));
				},

				$recipient = new mockOfTicTacToe\matrix\value\recipient,

				$dimension = new mockOfTicTacToe\matrix\dimension,
				$this->calling($dimension)->recipientOfMatrixSizeIs = function($size, $recipient) {
					$recipient->matrixSizeIs(new matrix\size\any(9));
				},
				$this->calling($dimension)->recipientOfNumberOfRowsInMatrixIs = function($recipient) {
					$recipient->numberOfRowsInMatrixIs(new matrix\dimension\side\any(3));
				},
				$this->calling($dimension)->recipientOfNumberOfColumnsInMatrixIs = function($recipient) {
					$recipient->numberOfColumnsInMatrixIs(new matrix\dimension\side\any(3));
				},

				$this->newTestedInstance($dimension)
			)
			->if(
				$this->testedInstance->recipientOfMatrixValueAtCoordinateIs($coordinate, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($dimension))
				->mock($recipient)
					->receive('matrixValueIs')
						->never

			->given(
				$this->newTestedInstance($dimension, $value = uniqid())
			)
			->if(
				$this->testedInstance->recipientOfMatrixValueAtCoordinateIs($coordinate, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($dimension, $value))
				->mock($recipient)
					->receive('matrixValueIs')
						->withArguments($value)
							->once
		;
	}
}
