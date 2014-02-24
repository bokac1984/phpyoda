<?php
App::uses('ErrorLog', 'Model');

/**
 * ErrorLog Test Case
 *
 */
class ErrorLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.error_log'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ErrorLog = ClassRegistry::init('ErrorLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ErrorLog);

		parent::tearDown();
	}

}
