<?php
include('views/menu.php');
?>

<div class="container_holder">
<h3>Messages</h3>

    <div class="send_message">
    <div class="panel_header">
        Send a message
    </div>
        <div class="message">
            <form method='POST' action='../message/newMessage'>
                <input type="text" name="username_receiver" placeholder="Recepient"><br/>
                <textarea rows='6' cols='30' id="messages" name='body_message'></textarea><br/><br/>
                <input type="submit" value='Send' name='submit'>
            </form>
        </div>
    </div>

    <div class="my_messages">
        <div class="panel_header">
            My messages
        </div>
        <div class="message2">
	<?php

	foreach ($recovers as $recover) { ?>

        <div class="idiot">
                From :
                <?php echo $recover['username_sender']?><br>

                 To :
                <?php echo $recover['username_receiver']?><br/>

        </div>
        <div class="body_message">
                <?php echo $recover['body_message']?><br/>
                <span id="sent">Sent: <?php echo $recover['date_message'] ?></span>
        </div>


	<?php }?>
            </div>
</div>