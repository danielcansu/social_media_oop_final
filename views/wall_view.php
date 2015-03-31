<?php
include('views/menu.php');
?>

    <div class="container_holder">

        <h3>Status Feed</h3>


        <div id="write_post">
            <form method="POST" action="../status/addStatus">
                <textarea class="text_box" id="status" name="status_content"></textarea>
                <br>
                <input class="button create" type="submit" name="submit_post" value="Post">
            </form>
        </div>
        <br>

        <div class="message2">

        <?php foreach($result as $row) { ?>

            <div class="idiot">

                <?php echo $row['status_username'] ?>
                <br>
                 <?php echo $row['created_at'] ?>
            </div>

            <div class="body_message">
                <?php echo $row['status_content'] ?>
            </div>






        <?php } ?>

    </div>


