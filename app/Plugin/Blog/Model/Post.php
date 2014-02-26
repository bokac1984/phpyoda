<?php
App::uses('BlogAppModel', 'Blog.Model');
/**
 * Post Model
 *
 * @property User $User
 * @property Comment $Comment
 */
class Post extends BlogAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'category_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Where is the category?',
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Where is the title?',
			),
            'unique' => array(
                'rule' => 'isUnique',
                'required' => 'create',
                'message' => 'The title of the post must be unique.',
                'on' => 'create'
                )
            )  
        );

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'post_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
    
    public  $actsAs = array(
        'Blog.Sluggable' => array(
            'label'=> 'title',
            'slug'=> 'slug',
            'separator'=> '-',
            'overwrite'=> true,
            'mode' => 'ascii',
            'run' => 'beforeSave',
            'case' => 'low'
        ),
        'Taggable' => array(
			'joinTable' => 'posts_tags',
			'foreignKey' => 'post_id',
        ),
        'Containable'
    );

    public function extractTags($data){
        if (is_array($data) && !empty($data)) {
            $tmp = '';
            foreach ($data as $tag) {
                $tmp .= ", ".$tag['tag'];
            }
            return $tmp;
        } else {
            return array();
        }
    }
    
    /**
     * Update views
     * 
     * @param int $id
     * @param int $views
     */
    public function updateViews($id, $views) {
      $this->id = $id;
      $this->Behaviors->unload('Taggable');
      $this->saveField('views', (int)++$views);
    }
    
    /**
     * This method is used by dashboard action of users Controller
     * @return type
     */
    public function getTotalViews() {
      $this->recursive = -1;
      $result = $this->find('all',
                array(
                  'fields' =>  array(
                      'SUM(Post.views) AS total'
                  )
                )
              );
      return $result[0][0]['total'];
    }
}
