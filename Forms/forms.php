<?php
class forms{
    private function submit_button($value, $name){
        ?>
        <button type="submit" class="btn btn-primary" name="<?php echo $name; ?>"><?php echo $value; ?></button> <?php
    }

    public function signup(){
        ?>
        <h2>Sign Up</h2>
<form action="" method="post" autocomplete="off">
  <div class="mb-3">
    <label for="fullname" class="form-label">Fullname</label>
    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your fullname" maxlength="50" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" maxlength="100" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text"></div>
</div>
<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
    <div id="emailHelp" class="form-text"></div>
  </div>
    <?php $this->submit_button('Sign Up', 'signup'); ?> <a href="signin.php">Already have an account? Log in</a>
</form>
        <?php
    }

    public function signin(){
        ?>
        <h2>Signin Form</h2>
        <form action='submit_login.php' method='post'>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
            <?php $this->submit_button('Sign In', 'signin'); ?> <a href="signup.php">Don't have an account? Sign up</a>
        </form>
        <?php
    }
}