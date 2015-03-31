<?php
include('views/menu.php');
?>

<div class="container_holder">
	<h3>Member List</h3>


	<?php

	foreach ($users as $userZ) { ?>
<div class="grid_list">
        <div class="panel_header">
		<p><?php echo $userZ['username']?><br/>
        </div>

		<img src="<?php echo $userZ['avatar']; ?>" height='200px' width='200px' alt='avatar'></p>

        <div class="friend_req">
		<?php if($userZ["friend_status"] == 0){ ?>
		<a href="../member/makeFriend?friend_username=<?php echo $userZ['username']?>">Send friend request</a>
		<?php } else { ?>	<p><i class="fa fa-check-square-o"></i></p>
            </div>
            </div>

		<?php }

	}
	?>


</div>
