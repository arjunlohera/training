<?php
if(!isset($_SESSION['role_id']) || ($this->session->role_id !== 1 && $this->session->is_login === TRUE)) {
    redirect('/', 'location');
}
?>
<div class="container" style="min-height:30em">
    <div class="row">
        <div class="col-md-4">
            <h1>Admin Home</h1>
        </div>
    </div>
</div>
