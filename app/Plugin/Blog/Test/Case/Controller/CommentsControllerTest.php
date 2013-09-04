<?php
App::uses('CommentsController', 'Blog.Controller');

/**
 * CommentsController Test Case
 *
 */
class CommentsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.blog.comment',
		'plugin.blog.post',
		'plugin.blog.user',
		'plugin.blog.group'
	);

}
