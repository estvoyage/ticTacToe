<?php namespace estvoyage\ticTacToe\iterator;

use estvoyage\ticTacToe\iterator;

interface payload
{
	function currentValueOfIteratorIs(iterator $iterator, $value) :void;
}
