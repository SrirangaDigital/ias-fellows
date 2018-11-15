<ul>
<?php if($viewHelper->isLoggedIn()) { ?>
    <li><a href="<?=BASE_URL?>profile/logout">Logout</a></li>
    <li><a href="#" target="_blank">Edit profile</a></li>
    <li><a href="#" target="_blank">SpringerLink access</a></li>
<?php } else { ?>
    <li><a href="<?=BASE_URL?>profile/login">Login</a></li>
<?php } ?>
</ul>            
