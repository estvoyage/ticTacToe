<?php namespace estvoyage\ticTacToe\matrix\value;

use estvoyage\ticTacToe\iterator;

interface container
{
	function payloadForIteratorIs(iterator $iterator, iterator\payload $payload) :void;
}
