<?php
App::uses('BlogSetting', 'Blog.Model');

/**
 * BlogSetting Test Case
 *
 */
class BlogSettingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.blog.blog_setting'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BlogSetting = ClassRegistry::init('Blog.BlogSetting');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BlogSetting);

		parent::tearDown();
	}

}
