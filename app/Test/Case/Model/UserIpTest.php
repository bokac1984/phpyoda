<?php
App::uses('UserIp', 'Model');

/**
 * UserIp Test Case
 *
 */
class UserIpTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_ip',
		'app.user',
		'app.group',
		'app.post',
		'app.category',
		'app.comment',
		'app.tag',
		'app.posts_tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserIp = ClassRegistry::init('UserIp');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserIp);

		parent::tearDown();
	}

}
