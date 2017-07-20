<?php namespace estvoyage\ticTacToe\matrix\value\container;

use estvoyage\ticTacToe\{ matrix, iterator };

class blackhole
	implements
		matrix\value\container
{
	function payloadForIteratorIs(iterator $iterator, iterator\payload $payload) :void
	{
	}
}
