<?php ?>
<div class="row">
  <!-- left column -->
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Add Photos</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
<?php 
        echo $this->Form->create('Picture', array('type' => 'file')); 

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
        echo $this->Form->input('album_id', array(
            'label' => false,
            'empty' => 'Choose Album'
        ));
        echo $this->Form->input('Picture..location', array(
            'type' => 'file', 
            'multiple' => 'multiple',
            'label' => false,
            'after' => '<p class="help-block">Example block-level help text here.</p>'
            )
        );
        
        echo $this->Form->button('Save Images', array(
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
</div>

