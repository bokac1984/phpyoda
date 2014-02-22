<?php 
$this->startIfEmpty('maintitle');
echo $this->element('titles', array('maintitle' => 'Albums', 'subtitle' => 'Add photos to Album'));
$this->end();
?>

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header">
      </div><!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
      <?php
        echo $this->Form->create('Album', array('type' => 'file')); 

        $this->Form->inputDefaults(array(
                'error' => array(
                        'attributes' => array(
                            'wrap' => 'div',
                            'class' => 'label label-warning'
                        )
                    ),
                    'div' => 'form-group'
            )
        );
        echo $this->Form->input('id');
        echo $this->Form->input('Picture..location', array(
            'type' => 'file', 
            'multiple' => 'multiple',
            'label' => false,
            'after' => '<p class="help-block">Select as much images as you want</p>'
            )
        );
        
        echo $this->Form->button('Upload Images', array(
            'type' => 'submit', 
            'class' => 'btn btn-primary margint20',
            'id' => 'save-images'
        ));

        echo $this->Form->end(); 
?>
      </div>
    </div><!-- /.box -->
  </div><!--/.col (left) -->
  <!-- right column -->
<!--  <div class="col-md-6">
     general form elements disabled 
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title">General Elements</h3>
      </div> /.box-header 
      <div class="box-body">
        
      </div> /.box-body 
    </div> /.box 
  </div>/.col (right) -->
</div>

