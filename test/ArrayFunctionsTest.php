<?php

class ArrayFunctionsTest extends \PHPUnit\Framework\TestCase {

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
					3,
				),
			))
		);

		$this->assertEquals(
			array( 1, 2, 4, 'fish fry', 3 ),
			array_flatten(array(
				'bbq' => array(
					'soda' => array( 1, 2, 4, 'fish fry' ),
					3,
				),
			), true)
		);
	}

	public function testArrayBlend() {
		// Test blending arrays without specifying keys
		$arrays = array(
			'fruits'     => array( 'apple', 'banana', 'cherry' ),
			'vegetables' => array( 'carrot', 'broccoli', 'spinach' ),
			'meats'      => array( 'chicken', 'beef', 'pork' ),
		);

		$expected = array( 'apple', 'banana', 'cherry', 'carrot', 'broccoli', 'spinach', 'chicken', 'beef', 'pork' );
		$this->assertEquals($expected, array_blend($arrays));

		// Test blending arrays with specific keys
		$keys     = array( 'fruits', 'meats' );
		$expected = array( 'apple', 'banana', 'cherry', 'chicken', 'beef', 'pork' );
		$this->assertEquals($expected, array_blend($arrays, $keys));

		// Test with empty arrays
		$arrays = array(
			'fruits'     => array(),
			'vegetables' => array( 'carrot', 'broccoli' ),
			'empty'      => array(),
		);

		$expected = array( 'carrot', 'broccoli' );
		$this->assertEquals($expected, array_blend($arrays));

		// Test with non-array values (should be skipped)
		$arrays = array(
			'fruits'     => array( 'apple', 'banana' ),
			'number'     => 42,
			'vegetables' => array( 'carrot' ),
		);

		$expected = array( 'apple', 'banana', 'carrot' );
		$this->assertEquals($expected, array_blend($arrays));
	}

	public function testArrayKeyArray() {
		// Test with numeric keys
		$arrays = array(
			array( 'id' => 1, 'name' => 'John', 'role' => 'Developer' ),
			array( 'id' => 2, 'name' => 'Jane', 'role' => 'Designer' ),
			array( 'id' => 3, 'name' => 'Bob', 'role' => 'Manager' ),
		);

		$expected = array( 1, 2, 3 );
		$this->assertEquals($expected, array_key_array($arrays, 'id'));

		// Test with string keys
		$expected = array( 'John', 'Jane', 'Bob' );
		$this->assertEquals($expected, array_key_array($arrays, 'name'));

		// Test with associative array keys
		$arrays = array(
			'user1' => array( 'id' => 101, 'name' => 'Alice' ),
			'user2' => array( 'id' => 102, 'name' => 'Charlie' ),
			'user3' => array( 'id' => 103, 'name' => 'Dave' ),
		);

		$expected = array( 'user1' => 101, 'user2' => 102, 'user3' => 103 );
		$this->assertEquals($expected, array_key_array($arrays, 'id'));

		// Test with mixed content
		$arrays = array(
			array( 'id' => 201, 'data' => 'value1' ),
			array( 'id' => 202, 'data' => array( 'nested' => 'value2' ) ),
			array( 'id' => 203, 'data' => 42 ),
		);

		$expected = array( 'value1', array( 'nested' => 'value2' ), 42 );
		$this->assertEquals($expected, array_key_array($arrays, 'data'));
	}

	public function testArrayKeysArray() {
		// Test with multiple keys
		$arrays = array(
			array( 'id' => 1, 'name' => 'John', 'role' => 'Developer', 'age' => 30 ),
			array( 'id' => 2, 'name' => 'Jane', 'role' => 'Designer', 'age' => 28 ),
			array( 'id' => 3, 'name' => 'Bob', 'role' => 'Manager', 'age' => 35 ),
		);

		$keys     = array( 'id', 'name' );
		$expected = array(
			array( 'id' => 1, 'name' => 'John' ),
			array( 'id' => 2, 'name' => 'Jane' ),
			array( 'id' => 3, 'name' => 'Bob' ),
		);
		$this->assertEquals($expected, array_keys_array($arrays, $keys));

		// Test with a single key (passed as string)
		$expected = array(
			array( 'id' => 1 ),
			array( 'id' => 2 ),
			array( 'id' => 3 ),
		);
		$this->assertEquals($expected, array_keys_array($arrays, 'id'));

		// Test with a single key (passed as array)
		$this->assertEquals($expected, array_keys_array($arrays, array( 'id' )));

		// Test with associative array keys
		$arrays = array(
			'user1' => array( 'id' => 101, 'name' => 'Alice', 'dept' => 'Engineering' ),
			'user2' => array( 'id' => 102, 'name' => 'Charlie', 'dept' => 'Marketing' ),
			'user3' => array( 'id' => 103, 'name' => 'Dave', 'dept' => 'Sales' ),
		);

		$keys     = array( 'id', 'dept' );
		$expected = array(
			'user1' => array( 'id' => 101, 'dept' => 'Engineering' ),
			'user2' => array( 'id' => 102, 'dept' => 'Marketing' ),
			'user3' => array( 'id' => 103, 'dept' => 'Sales' ),
		);
		$this->assertEquals($expected, array_keys_array($arrays, $keys));
	}

	public function testArrayKeyRefill() {
		// Test with missing keys and default empty array fill
		$array = array(
			'key1' => 'value1',
			'key3' => 'value3',
		);

		$keys     = array( 'key1', 'key2', 'key3', 'key4' );
		$expected = array(
			'key1' => 'value1',
			'key2' => array(),
			'key3' => 'value3',
			'key4' => array(),
		);

		$this->assertEquals($expected, array_key_refill($array, $keys));

		// Test with custom fill value (string)
		$expected = array(
			'key1' => 'value1',
			'key2' => 'default',
			'key3' => 'value3',
			'key4' => 'default',
		);

		$this->assertEquals($expected, array_key_refill($array, $keys, 'default'));

		// Test with custom fill value (number)
		$expected = array(
			'key1' => 'value1',
			'key2' => 0,
			'key3' => 'value3',
			'key4' => 0,
		);

		$this->assertEquals($expected, array_key_refill($array, $keys, 0));

		// Test with custom fill value (array)
		$fillArray = array( 'status' => 'empty' );
		$expected  = array(
			'key1' => 'value1',
			'key2' => $fillArray,
			'key3' => 'value3',
			'key4' => $fillArray,
		);

		$this->assertEquals($expected, array_key_refill($array, $keys, $fillArray));

		// Test with no missing keys
		$array = array(
			'a' => 1,
			'b' => 2,
			'c' => 3,
		);

		$keys = array( 'a', 'b', 'c' );
		$this->assertEquals($array, array_key_refill($array, $keys, 'unused'));
	}


}
