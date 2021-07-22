<nav class="top-nav">
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/index">Home</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/about">About</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/projects">Projects</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/blog">Blog</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/contact">Contact</a>
        </li>
        <li class="btn-login">
            <?php if(isset($_SESSION['user_id'])) { ?>
                <a href="<?php echo URLROOT; ?>/users/login">Logout</a>
            <?php } else { ?>
                <a href="<?php echo URLROOT; ?>/users/login">Login</a>
            <?php } ?>
        </li>
    </ul>
</nav>