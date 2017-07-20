<?php namespace estvoyage\ticTacToe;

interface iterator
{
	function valuesForIteratorPayloadAre(iterator\payload $payload, array $values): void;
	function nextValuesAreUselessForIteratorPayload() :void;
}
