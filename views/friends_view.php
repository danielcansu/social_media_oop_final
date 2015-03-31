<?php
include('views/menu.php');
?>


<div class="container_holder">

	<h3>My friends</h3>
	<?php

	foreach($recovers as $recover){

		if($recover["username_receiver"] == $_SESSION["username"]){
			?>

            <table >
            <tr>
			<td class="list_friends"><p><?php echo $recover['username_sender']; ?></p></td>

			<!--<img src="<?php echo $recover['avatar']; ?>" height='200' width='200' alt='avatar'>-->

			<td class="list_friends"><a href="../member/declineFriend?username=<?php echo $recover['username_sender']?>">Remove friend</a></td>
            </tr>
            </table>
		<?php
		} else { ?>
    <table>
            <tr>
                <td class="list_friends"><p><?php echo $recover['username_receiver']; ?></p></td>

			<!--<img src="<?php echo $recover['avatar']; ?>" height='200' width='200' alt='avatar'>-->

			<td class="list_friends"><a href="../member/declineFriend?username=<?php echo $recover['username_receiver']?>">Remove friend</a></td>
    </table>




		<?php }


	}

	if(empty($recover))
	{
		?>

		<div class='error'>You have no friends</div>

		<?php

	}

	?>
</div>


</div>