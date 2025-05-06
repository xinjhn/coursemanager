<html>
    <head>
        <title>Course Manager</title>
    </head>
    
    <body>
        <div class="container-fluid">
            <h1>Course Manager</h1>
            <h5>Keep track of academic courses</h5>
            
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php $attributes = ['class' => 'nav-link'] ?>
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <li><?php echo anchor('user', 'User', $attributes) ?></li>
                  </li>
                  <li class="nav-item">
                    <li><?php echo anchor('course', 'Course List', $attributes) ?></li>
                  </li>
                  <li class="nav-item">
                    <li><?php echo anchor('grade', 'Grading Policy', $attributes) ?></li>
                  </li>
                  <li>
                      <?php if($this->ion_auth->logged_in()): ?>
                      <?php echo anchor('auth/logout', 'Logout', $attributes) ?>
                      <?php else: ?>
                      <?php echo anchor('auth/login', 'Login', $attributes) ?>
                      <?php endif ?>
                  </li>
                </ul>
              </div>
            </nav>
            <br/>
            <?php $msg = $this->session->flashdata('msg') ?>
            <?php if(strlen($msg) > 0): ?>
            <div class="alert alert-warning" role = "alert"><?php echo $msg ?></div>
            <?php endif ?>
            
            <div><?php $this->load->view($content) ?></div>
            <br/>
            <div class="alert alert-info" role="alert">&copy; <?php echo date('Y') ?></div>
        </div>
        
        <?php echo css('assets/css/bootstrap.min.css') ?>
        <?php //echo css('assets/css/custom.css') ?>
        <?php echo js('assets/js/jquery-3.3.1.min.js') ?>
        <?php echo js('assets/js/bootstrap.min.js') ?>
    </body>
</html>