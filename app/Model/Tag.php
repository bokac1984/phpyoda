<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 * @property Portfolio $Portfolio
 * @property Portfolio $Portfolio
 */
class Tag extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'tag';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'tag' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'There needs to be at least one tag added here.',
				//'allowEmpty' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

    /**
     * Ajax needed method
     * 
     * @param type $s Search string
     * @return type
     */
    public function getTags($s) {
		$params = array(
			'conditions' => array("Tag.tag LIKE " => "%$s%"),
            'recursive' => -1, //int
			'fields' => array("Tag.tag")              
		);
        
        $tags = $this->find('all', $params);
        $tmp = array();
        $tmp['choices'] = array();
        
        foreach($tags as $tag) {
            $tmp['choices'][] = $tag['Tag']['tag'];
        }
        return $tmp;
    }
    
    /**
     * If some tag exists get it's key else save it and get it's key
     * 
     * @param array $data Array of tag values to save
     * @return array Containes id's of saved tags
     */
    public function saveTags($data) {  
        $tags = $this->find('list', array('fields'=> array('Tag.id', 'Tag.tag')));
        $ids = array();
        if (is_array($tags)) {
            foreach($tags as $k=>$v) {
                if (in_array($v, $data) && count($data) > 0) {
                    $ids[] = (string)$k;
                    if(($key = array_search($v, $data)) !== false) {
                        unset($data[$key]);
                    }
                    unset($tags[$k]);
                }
            }
        }
        
        if (count($data) > 0) {
            foreach ($data as $tag) {
                $this->create();
                $d = array(
                    'Tag' => array(
                        'tag' => $tag
                    )
                );
                
                if ($this->save($d) ){
                    $ids[] = (string)$this->getLastInsertID();
                }
            }
        }
        return $ids;
    }
}
