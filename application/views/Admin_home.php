<?php
if(!isset($_SESSION['role_id']) || $this->session->role_id !== 1) {
    redirect('http://localhost/Training/', 'location');
}
?>
<div class="container">
    <div class="row">
        <h1>Admin Home</h1>
    </div>
</div>
