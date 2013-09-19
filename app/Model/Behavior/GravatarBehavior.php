<?php
App::uses('ModelBehavior', 'Model');

/**
 * Description of GravatarBehavior
 *
 * @author bokac
 */
class GravatarBehavior extends ModelBehavior {
    
    public $settings = array();
    
    public $_defaults = array(
        'rating' => 'g',
        'size' => '80',
        'default' => '',
        'url' => 'http://www.gravatar.com/avatar/'
    );
    
    public function setup(Model $model, $config = array()) {
        parent::setup($model, $config);
        
        if (!isset($this->settings[$model->alias])) {
            $this->settings[$model->alias] = $this->_defaults;
        }
        
        $this->settings[$model->alias] = array_merge($this->settings[$model->alias], $config);
    }
    
    public function beforeSave(Model $model) {
        parent::beforeSave($model);
        $model->data[$model->alias]['email'] = strtolower( trim( $model->data[$model->alias]['email'] ) );
        
        if ($model->data[$model->alias]['gravatar']) {
            $model->data[$model->alias]['gravatar'] ;
        }
        
        
    }
    
    private function prepareURL(Model $model, $email) {
        extract($this->settings[$model->alias]);
        
        $imageURL = $url.md5($email)."?".key($this->settings[$model->alias]['rating'])."=";
    }
}

?>
