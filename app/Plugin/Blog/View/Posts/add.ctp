<?php
echo $this->Html->css('jquery-ui-1.9.2.custom', null, array('inline' => false));
echo $this->Html->css('jquery.tagit', null, array('inline' => false));

echo $this->Html->script('/js/lib/ckeditor/ckeditor', array('block' => 'scriptBottom'));
echo $this->Html->script('/js/lib/jquery-ui-1.9.2.custom.min', array('block' => 'scriptBottom'));
echo $this->Html->script('/js/lib/tag-it.min', array('block' => 'scriptBottom'));
//echo $this->Html->scriptBlock("$('#PostCategoryId').dropdown();");
echo $this->Html->script('phpyoda', array('block' => 'scriptBottom'));
echo $this->Html->script('blog', array('block' => 'scriptBottom'));
?>
<div class="posts form">
  <?php
  echo $this->Form->create('Post', array('id' => 'new-post'));
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
  ?>
  <fieldset>
    <legend><?php echo __('Add Post'); ?></legend>
    <?php
    echo $this->Form->input('user_id', array('div' => 'hidden'));
    echo $this->Form->input(
        'title', array(
            'class' => 'form-control',
            'placeholder' => 'Title',
            'label' => false
        )
    );
    echo $this->Form->input('category_id', array(
        'label' => false,
        'after' => '<button type="button" style="margin-left: 10px;" class="btn btn-primary offset1" data-toggle="modal" data-target="#new-cat">New Category</button>'
    ));
    echo $this->Form->input('body', array('class' => 'ckeditor', 'id' => 'ckeditor', 'label' => false));
    echo $this->Form->input('Tag.tag', array(
        'class' => 'tags-input',
        'type' => 'text',
        'label' => 'Tags'
    ));
    echo $this->Form->button('Save', array(
        'type' => 'submit',
        'class' => 'btn btn-primary',
        'id' => 'save'
            )
    );
    echo $this->Form->button('Publish', array(
        'type' => 'submit',
        'class' => 'btn btn-primary col-lg-offset-1',
        'id' => 'publish'
            )
    );
    ?>
  </fieldset>
  <?php echo $this->Form->end(); ?>
</div>
<!-- Modal -->
<div class="modal fade" id="new-cat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Category Form</h4>
      </div>
        <?php echo $this->Form->create('Category', array(
            'id' => 'new-cat-form',
            'action' => 'add'
            )
        ); ?>
        <?php
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
        ?>
      <div class="modal-body">

        <fieldset>
          <?php
          echo $this->Form->input(
              'name', array(
              'class' => 'form-control',
              'placeholder' => 'Category Name',
              'label' => false
              )
          );
          ?>
        </fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="close-save-modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-cat">Save Category</button>     
      </div>
      <?php echo $this->Form->end(); ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->

</div><!-- /.modal -->