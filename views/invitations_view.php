<?php
include('views/menu.php');
?>

<div class="container_holder">
<h3>Friend requests</h3>

    <div class="cogs">
        <i class="fa fa-user-plus"></i>
    </div>

<div class="invitations" >
    <div class="panel_header">
        Pending friend requests
    </div>
    <div class="panel_info">
        <?php

        if($recovers == true)
        {

            foreach($recovers as $recover)
            {
                if($recover['active'] == 0)
                {

                    ?>
                    <img src='<?php echo $recover['avatar'];?>' alt='avatar'>
                    <div class='error'>
                        <?php echo $recover['username_sender']; ?> wanted to add you as a friend <br/>
                        <a href="../member/acceptFriend?username_sender=<?php echo $recover['username_sender'] ?>">Accept </a>|<a href="../member/declineFriend?username=<?php echo $recover['username_sender']?>"> Decline</a>
                    </div>
                    <br>
                <?php
                }else{
                    ?>

                    <div class='success'>You are now friends with <?php echo $recover['username_sender']; ?></div>

                <?php
                }
            }

        }else if($recovers == true ){
            foreach($recovers as $recover)
            {

                ?>


                <div class='success'><?php echo $recover['username_receiver']; ?> has accepted your request</div>

            <?php
            }

        }
        else{
            ?>

            <div class="error">You don't have any requests</div>

        <?php
        }


        ?>


    </div>
</div>