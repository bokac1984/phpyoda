<?php
App::uses('AppModel', 'Model');
/**
 * Portfolio Model
 *
 * @property Tag $Tag
 */
class Portfolio extends AppModel {
	public $actsAs = array(
		'Uploader.Attachment' => array(
			'screen_shot' => array(
                'nameCallback' => 'changeName',
				'tempDir' => TMP,
				'overwrite' => true,
				'self' => true,
				'uploadDir' => '/img/uploads/',
				'finalPath' => '/img/uploads/',
                'transforms' => array(
                    'imageSmall' => array(
                        'method' => 'crop', // or crop
                        'append' => '-small',
                        'overwrite' => true,
                        'self' => false,
                        'width' => 100,
                        'dbColumn' => 'screen_shot',
                        'height' => 100
                    ),
                    'imageMedium' => array(
                        'method' => 'resize',
                        'append' => '-medium',
                        'width' => 800,
                        'height' => 600,
                        'aspect' => false,
                        'dbColumn' => 'screen_shot'
                    )
                )
			)
		),
		'Uploader.FileValidation' => array(
			'screen_shot' => array(
				'maxWidth' => array(
					'value' => 1800, 
					'error' => 'Width incorrect'
				),
				'maxHeight' => array(
					'value' => 1800, 
					'error' => 'Height incorrect'
				),
				'extension' => array(
					'value' => array('gif', 'jpg', 'png', 'jpeg'),
					'error' => 'Mimetype incorrect',
				),
				'filesize' => array(
					'value' => 1048576,
					'error' => 'Filesize incorrect'
				),
				'required' => array(
					'value' => true,
					'error' => 'Please select one image for the project'
				)
			)
		),
        'Taggable' => array(
			'joinTable' => 'portfolios_tags',
			'foreignKey' => 'portfolio_id',
        )
	);
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'project_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Should not be empty.',
			),
		),
		'technologies' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Should not be empty.',
			),
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Should not be empty.',
			),
		)
	); 
    
    public function changeName($name, $file) {
        debug($this->data);die();
        return sprintf('%s-%s', $name, $file->size());
    }
}
