<?php
App::uses('ModelBehavior', 'Model');

/**
 * Description of TaggableBehaviour
 *
 * @author bokac
 */
class TaggableBehavior extends ModelBehavior {
    
    public $settings = array();
    
/**
 * Default settings
 *
 * tagAlias              	- model alias for Tag model
 * field                 	- the fieldname that contains the raw tags as string
 * foreignKey            	- foreignKey used in the HABTM association
 * associationForeignKey 	- associationForeignKey used in the HABTM association
 *
 * @var array
 */
	protected $_defaults = array(
		'tagAlias' => 'Tag',
        'field' => 'tag',
        'joinTable' => 'join_table',
		'foreignKey' => 'foreign_key',
		'associationForeignKey' => 'tag_id'
	);
    
    public function setup(Model $model, $config = array()) {
        parent::setup($model, $config);
        
        if (!isset($this->settings[$model->alias])) {
            $this->settings[$model->alias] = $this->_defaults;
        }
        
        $this->settings[$model->alias] = array_merge($this->settings[$model->alias], $config);
        extract($this->settings[$model->alias]);
        
        $model->bindModel(
            array(
                'hasAndBelongsToMany' => array(
                    $tagAlias => array(
                        'className' => $tagAlias,
                        'join_table' => $joinTable,
                        'foreignKey' => $foreignKey,
                        'associationForeignKey' => $associationForeignKey,
                        'unique' => 'keepExisting',
                    )
                )
            )
        );
    }
    
    public function beforeSave(Model $model) {
        extract($this->settings[$model->alias]);
        $model->data[$tagAlias][$tagAlias] = $this->prepareTags($model, $tagAlias, $associationForeignKey, $model->data[$tagAlias][$field]);
        unset($model->data[$tagAlias][$field]);
    }
    
    /**
     * Validate Tag model data in this callback
     * 
     * @param Model $model
     */
    public function beforeValidate(Model $model) {
        foreach($model->hasAndBelongsToMany as $k=>$v) { 
            if(isset($model->data[$k])) 
            { 
                $data[$k] = $model->data[$k];
                $model->{$k}->set($data);
                
                $model->{$k}->validates($data);
            } 
        }
    }
    
    /**
     * This method prepares tags for saving, and calls Tag->saveTags method to save tags
     * 
     * @param Model $model
     * @param string $tagModel
     * @param string $fKey
     * @param string $tagString
     * @return array of keys of saved or existing keys from tags table
     */
    public function prepareTags(Model $model, $tagModel, $fKey, $tagString) {
        $tmp = array();
        if (isset($tagString) && $tagString != '') {
            $tags = explode(",", $tagString);
            
            foreach($tags as $k => $v){
                $tmp[] = $v;
            }
        }
        return $model->{$tagModel}->saveTags($tmp);
    }
}

?>
