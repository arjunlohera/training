<?php
if(!isset($_SESSION['role_id']) || $this->session->is_login !== TRUE) {
    redirect('/', 'location');
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Your file was successfully uploaded!</h3>
            <ul>
                <?php foreach ($upload_data as $item => $value):?>
                <li><?php echo $item;?>: <?php echo $value;?></li>
                <?php endforeach; ?>
            </ul>
            <?php 
            $attr = array(
                'class' => 'btn btn-primary',
                'title' => 'Upload New File'
            );
            echo anchor('upload/fileinput', 'Upload Another File!', $attr); 
            ?>
        </div>
    </div>
</div>
