<?php
App::uses('UserMessage', 'Model');

/**
 * UserMessage Test Case
 *
 */
class UserMessageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_message'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserMessage = ClassRegistry::init('UserMessage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserMessage);

		parent::tearDown();
	}

}
