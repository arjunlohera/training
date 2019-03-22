<?php
if(!isset($_SESSION['role_id']) || $this->session->is_login !== TRUE) {
    redirect('/', 'location');
}
?>
<div class="container" style="min-height:30em">
    <div class="row">
        <div class="col-md-4">
            <?php if(isset($error)) {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?php echo $error;?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php }
            $attr = array('class'=>'mt-5');
            ?>
            <h1 class="text-muted">Upload a File</h1>
            <small class="text-muted">Only .php .html and .txt files are allowed.</small>
            <?php echo form_open_multipart('upload/do_upload', $attr);?>

            <!-- <div class="custom-file">
                
                <input type="file" class="custom-file-input" id="customFile" name="userfile" required>
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div> -->

            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                <div class="form-control" data-trigger="fileinput">
                    <span class="fileinput-filename"></span>
                </div>
                <span class="input-group-append">
                    <span class="input-group-text fileinput-exists" data-dismiss="fileinput">
                        Remove
                    </span>

                    <span class="input-group-text btn-file">
                        <span class="fileinput-new">Select file</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="userfile" multiple>
                    </span>
                </span>
            </div>
            <button type="submit" class="btn btn-primary mt-5">Upload</button>
            </form>
        </div>
    </div>
</div>
