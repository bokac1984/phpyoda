<?php
echo $this->Html->script('phpyoda', array('block' => 'scriptBottom'));
?>
<div class="row">
    <div class="col-lg-12">
        <p>
            Seen enough? Go ahead, and send your message :)
        </p>
    </div>
</div>
<div class="row">
    <div class="col-lg-5">  
        <div class="contact-form">
            <?php
            
            echo $this->Form->create('Contact', array(
                'action' => 'add'
            ));
            $this->Form->inputDefaults(array(
                    'div' => 'form-group'
                )
            );
            echo '<h2 class="form-signin-heading">Contact me here</h2>';
            echo $this->Form->input('name', array(
                'class' => 'form-control',
                'placeholder' => 'Name',
                'label' => false
            ));
            echo $this->Form->input('website', array(
                'class' => 'form-control',
                'placeholder' => 'Website',
                'label' => false
            ));
            echo $this->Form->input('email', array(
                'class' => 'form-control',
                'placeholder' => 'Email Address',
                'label' => false
            ));
            ?><div class="form-group"><?php 
            echo $this->Form->textarea('message', array(
                'class' => 'form-control',
                'placeholder' => 'Your message',
                'label' => false
            ));
            ?></div><?php
            echo $this->Form->button('Send message', array(
                'type' => 'submit',
                'class' => 'btn btn-default btn-primary',
                'id' => 'contact-btn'
            ));
            echo $this->Form->end();
            ?>
        </div>
    </div>
    <div class="col-lg-1">
        <p style="margin-top: 20px;">OR</p>
    </div>
    <div class="col-lg-5">
        <h2>Through social</h2>
        <div class="social-contact">
            <div class="row">
                <div class="col-lg-4">
                    <?php
                        echo $this->Html->link(
                            $this->Html->image('si/transparent/facebook.png', array('alt' => 'Facebook')),
                            'https://www.facebook.com/milovanovic.bojan',
                            array(
                                'target'=>'_blank',
                                'escape'=>false
                            )
                        );
                    ?>
                </div>
                <div class="col-lg-4">
                    <?php
                        echo $this->Html->link(
                            $this->Html->image('si/transparent/googleplus.png', array('alt' => 'Google Plus')),
                            'https://plus.google.com/108973512907493500741',
                            array(
                                'target'=>'_blank',
                                'escape'=>false
                            )
                        );
                    ?>
                </div>
                <div class="col-lg-4">
                    <?php
                        echo $this->Html->link(
                            $this->Html->image('si/transparent/linkedin.png', array('alt' => 'Linkedin')),
                            'http://ba.linkedin.com/pub/bojan-milovanovi%C4%87/3a/2a9/21a',
                            array(
                                'target'=>'_blank',
                                'escape'=>false
                            )
                        );
                    ?>            
                </div>
            </div>
        </div>
    </div>
</div>