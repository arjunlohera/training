<?php
if(!isset($_SESSION['role_id']) || ($this->session->role_id !== 2 && $this->session->is_login === FALSE)) {
    redirect('/', 'location');
}
?>
<div class="container" style="min-height:30em">
    <div class="row">
        <div class="col-md-4">
            <h1>User Home</h1>
        </div>
    </div>
</div>