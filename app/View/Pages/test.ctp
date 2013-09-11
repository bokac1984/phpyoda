<?php 
echo $this->Html->css('lightbox', null, array('inline' => false));
echo $this->Html->script('/js/lib/jquery.roundabout.min', array('block'=>'scriptBottom')); 
echo $this->Html->script('/js/lib/lightbox/lightbox-2.6.min', array('block'=>'scriptBottom'));
echo $this->Html->script('phpyoda', array('block'=>'scriptBottom')); 
$logged = AuthComponent::user('id') ? 'loggedin' : '';
?>
<ul class="test">
    <li>
        <div class="wrapper row">
            <div class="col-lg-12">
                <div class="row">
                    <p>Project Name: MobileBuilder</p>
                    <p>Preview:</p>
                    <?php 
                        echo $this->Html->link(
                            $this->Html->image('/img/uploads/image-small.jpg', array('alt' => 'Facebook')),
                            '/img/uploads/image.jpg',
                            array(

                                'escape'=> false,
                                'data-lightbox' => 'image2'
                            )
                        );
                    ?>
                    <div class="description">
                        <h4>Description</h4>
                        <p>Some random text here</p>
                    </div>
                    <p>
                        Technologies used:
                    </p>
                    <span class="label label-primary">tagovano</span>
                    <span class="label label-primary">tagovano</span>
                </div>
            </div>
        </div>
    </li>
    <li>
        <div class="wrapper">
            <p>Some text goes here.</p>
            <img src="/img/uploads/149536-10151163312086891-331259467-n-cropped-300x200.jpg?1375803315" class="media-object" alt="">
        </div>
    </li>
    <li>
        <div class="wrapper">
            <p>Some text goes here.</p>
        </div>
    </li>
    <li>
        <div class="wrapper">
            <p>Some text goes here.</p>
        </div>
    </li>
    <li>
        <div class="wrapper">
            <p>Some text goes here.</p>
        </div>
    </li>
</ul>