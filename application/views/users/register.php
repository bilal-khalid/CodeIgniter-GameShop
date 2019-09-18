<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
<form method="post" action="<?php echo site_url('users/register'); ?>">
    <div class="form-group">
        <label>First Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="first_name" value="<?= set_value('first_name'); ?>" required>
    </div>
    <div class="form-group">
        <label>Last Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="last_name" value="<?= set_value('last_name'); ?>" required>
    </div>
    <div class="form-group">
        <label>Email Address <span class="text-danger">*</span></label>
        <input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>" required>
    </div>
    <div class="form-group">
        <label>Username <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="username" value="<?= set_value('username'); ?>" required>
    </div>
    <div class="form-group">
        <label>Password <span class="text-danger">*</span></label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div class="form-group">
        <label>Confirm Password <span class="text-danger">*</span></label>
        <input type="password" class="form-control" name="password2" required>
    </div>

    <button name="submit" type="submit" class="btn btn-success">Register</button>
</form>
