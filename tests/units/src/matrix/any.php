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

	function testRecipientOfMatrixWithValueAtCoordinateIs()
	{
		$this
			->given(
				$maxCoordinate = new mockOfTicTacToe\matrix\coordinate,
				$this->calling($maxCoordinate)->recipientOfDistanceInMatrixRowIs = function($recipient) {
					$recipient->distanceInMatrixIs(new matrix\coordinate\distance\any(3));
				},
				$this->calling($maxCoordinate)->recipientOfDistanceInMatrixColumnIs = function($recipient) {
					$recipient->distanceInMatrixIs(new matrix\coordinate\distance\any(3));
				},

				$coordinate = new mockOfTicTacToe\matrix\coordinate,

				$row = rand(1, 3),
				$this->calling($coordinate)->recipientOfDistanceInMatrixRowIs = function($recipient) use ($row) {
					$recipient->distanceInMatrixIs(new matrix\coordinate\distance\any($row));
				},

				$column = rand(1, 3),
				$this->calling($coordinate)->recipientOfDistanceInMatrixColumnIs = function($recipient) use ($column) {
					$recipient->distanceInMatrixIs(new matrix\coordinate\distance\any($column));
				},

				$value = new mockOfTicTacToe\matrix\value,
				$this->calling($value)->recipientOfMatrixCoordinateIs = function($recipient) use ($coordinate) {
					$recipient->matrixCoordinateIs($coordinate);
				},
				$this->calling($value)->recipientOfMatrixValueIs = function($recipient) {
					$recipient->matrixValueIs('foo');
				},

				$this->newTestedInstance($maxCoordinate, $value),

				$otherValue = 'bar',

				$recipient = new mockOfTicTacToe\matrix\recipient
			)
			->if(
				$this->testedInstance->recipientOfMatrixWithValueAtCoordinateIs($otherValue, $coordinate, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($maxCoordinate, $value))
				->mock($recipient)
					->receive('matrixIs')
						->withArguments($this->newTestedInstance($maxCoordinate, new matrix\value\any($otherValue, $coordinate)))
							->once

			->given(
				$row = rand(4, PHP_INT_MAX),
				$this->calling($coordinate)->recipientOfDistanceInMatrixRowIs = function($recipient) use ($row) {
					$recipient->distanceInMatrixIs(new matrix\coordinate\distance\any($row));
				},

				$column = rand(4, PHP_INT_MAX),
				$this->calling($coordinate)->recipientOfDistanceInMatrixColumnIs = function($recipient) use ($column) {
					$recipient->distanceInMatrixIs(new matrix\coordinate\distance\any($column));
				},

				$value = new mockOfTicTacToe\matrix\value,
				$this->calling($value)->recipientOfMatrixCoordinateIs = function($recipient) use ($coordinate) {
					$recipient->matrixCoordinateIs($coordinate);
				},
				$this->calling($value)->recipientOfMatrixValueIs = function($recipient) {
					$recipient->matrixValueIs('foo');
				},

				$this->newTestedInstance($maxCoordinate, $value),

				$recipient = new mockOfTicTacToe\matrix\recipient
			)
			->if(
				$this->testedInstance->recipientOfMatrixWithValueAtCoordinateIs($otherValue, $coordinate, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($maxCoordinate, $value))
				->mock($recipient)
					->receive('matrixIs')
						->withArguments($this->newTestedInstance($maxCoordinate, new matrix\value\any($otherValue, $coordinate)))
							->never
		;
	}

	function testRecipientOfValueInMatrixAtCoordinateIs()
	{
		$this
			->given(
				$maxCoordinate = new mockOfTicTacToe\matrix\coordinate,
				$this->calling($maxCoordinate)->recipientOfDistanceInMatrixRowIs = function($recipient) {
					$recipient->distanceInMatrixIs(new matrix\coordinate\distance\any(3));
				},
				$this->calling($maxCoordinate)->recipientOfDistanceInMatrixColumnIs = function($recipient) {
					$recipient->distanceInMatrixIs(new matrix\coordinate\distance\any(3));
				},

				$this->newTestedInstance($maxCoordinate),

				$coordinate = new mockOfTicTacToe\matrix\coordinate,

				$row = rand(1, 3),
				$this->calling($coordinate)->recipientOfDistanceInMatrixRowIs = function($recipient) use ($row) {
					$recipient->distanceInMatrixIs(new matrix\coordinate\distance\any($row));
				},

				$column = rand(1, 3),
				$this->calling($coordinate)->recipientOfDistanceInMatrixColumnIs = function($recipient) use ($column) {
					$recipient->distanceInMatrixIs(new matrix\coordinate\distance\any($column));
				},

				$recipient = new mockOfTicTacToe\matrix\value\recipient
			)
			->if(
				$this->testedInstance->recipientOfValueInMatrixAtCoordinateIs($coordinate, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($maxCoordinate))
				->mock($recipient)
					->receive('matrixValueIs')
						->never

			->given(
				$value = new mockOfTicTacToe\matrix\value,
				$this->calling($value)->recipientOfMatrixCoordinateIs = function($recipient) use ($coordinate) {
					$recipient->matrixCoordinateIs($coordinate);
				},
				$this->calling($value)->recipientOfMatrixValueIs = function($recipient) {
					$recipient->matrixValueIs('foo');
				},

				$this->newTestedInstance($maxCoordinate, $value)
			)
			->if(
				$this->testedInstance->recipientOfValueInMatrixAtCoordinateIs($coordinate, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($maxCoordinate, $value))
				->mock($recipient)
					->receive('matrixValueIs')
						->withArguments('foo')
							->once
		;
	}
}
