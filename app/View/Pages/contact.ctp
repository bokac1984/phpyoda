<?php
echo $this->Html->script('phpyoda', array('block' => 'scriptBottom'));
?>
<div class="row-fluid">
    <div class="span12">
        <p>
            Seen enough? Go ahead, and send your message :)
        </p>
    </div>
</div>
<div class="row-fluid">
    <div class="span5">  
        <div class="contact-form">
            <?php
            echo $this->Form->create('Contact', array(
                'action' => 'add'
            ));
            echo '<h2 class="form-signin-heading">Contact me here</h2>';
            echo $this->Form->input('name', array(
                'class' => 'input-block-level',
                'placeholder' => 'Name',
                'label' => false
            ));
            echo $this->Form->input('email', array(
                'class' => 'input-block-level',
                'placeholder' => 'Email Address',
                'label' => false
            ));
            echo $this->Form->textarea('message', array(
                'class' => 'input-block-level',
                'placeholder' => 'Your message',
                'label' => false
            ));
            echo $this->Form->button('Send message', array(
                'type' => 'submit',
                'class' => 'btn btn-large btn-primary',
                'id' => 'contact-btn'
            ));
            echo $this->Form->end();
            ?>
        </div>
    </div>
    <div class="span1">
        <p style="margin-top: 20px;">OR</p>
    </div>
    <div class="span5">
        <h2>Through social</h2>
        <div class="social-contact">
            <div class="row-fluid">
                <div class="span4">
                    <?php
                        echo $this->Html->image("si/transparent/facebook.png", array(
                            "alt" => "Facebook",
                            'url' => 'https://www.facebook.com/milovanovic.bojan')
                        );
                    ?>
                </div>
                <div class="span4">
                    <?php
                        echo $this->Html->image("si/transparent/googleplus.png", array(
                            "alt" => "Google Plus",
                            'url' => 'https://plus.google.com/108973512907493500741')
                        );
                    ?>
                </div>
                <div class="span4">
                    <?php
                        echo $this->Html->image("si/transparent/linkedin.png", array(
                            "alt" => "Google Plus",
                            'url' => 'http://ba.linkedin.com/pub/bojan-milovanovi%C4%87/3a/2a9/21a')
                        );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>