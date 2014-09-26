<?php

class ArrayFunctionsTest extends PHPUnit_Framework_TestCase {

	public function testArrayFlatten() {
		$this->assertEquals(
			array( 1 => 1, 2 => 2, 3 => 3 ),
			array_flatten(array( 1, 2, 3, 3 ))
		);

		$this->assertEquals(
			array( 1, 2, 3, 3 ),
			array_flatten(array( 1, 2, 3, 3 ), true)
		);

		$this->assertEquals(
			array( 1 => 1, 2 => 2, 3 => 3, 4 => 4, 'fish fry' => 'fish fry' ),
			array_flatten(array(
				'bbq' => array(
					'soda' => array( 1, 2, 4, 'fish fry' ),
					3
				)
			))
		);

		$this->assertEquals(
			array( 1, 2, 4, 'fish fry', 3 ),
			array_flatten(array(
				'bbq' => array(
					'soda' => array( 1, 2, 4, 'fish fry' ),
					3
				)
			), true)
		);

	}

	public function testArrayBlend() {
		//@todo: I'm not entirely sure how to test this
	}

	public function testArrayKeyArray() {

	}

	public function testArrayKeysArray() {

	}

	public function testArrayKeyRefill() {

	}


}
 