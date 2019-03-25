<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div id="notice" class="alert alert-danger" role="alert" style="display:none">
                <strong>Invalid! Login Credentials</strong>
            </div>
            <form id="login_form">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                        placeholder="Enter email" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" value="Ab!12345" required>
                </div>
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                <button class="btn btn-primary" type="submit">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Login
                </button>
            </form>
        </div>
    </div>
</div>
