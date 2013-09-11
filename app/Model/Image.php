<?php
App::uses('AppModel', 'Model');
/**
 * Image Model
 *
 * @property Portfolio $Portfolio
 */
class Image extends AppModel {
	public $actsAs = array(
		'Uploader.Attachment' => array(
			'uploaded' => array(
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
                        'dbColumn' => 'thumbnail',
                        'height' => 100
                    ),
                    'imageMedium' => array(
                        'method' => 'resize',
                        'append' => '-medium',
                        'width' => 300,
                        'height' => 200,
                        'aspect' => false,
                        'dbColumn' => 'medium'
                    )
                ),
                'dbColumn' => 'uploaded'
			)
		),
		'Uploader.FileValidation' => array(
			'uploaded' => array(
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
    );
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Portfolio' => array(
			'className' => 'Portfolio',
			'foreignKey' => 'portfolio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
