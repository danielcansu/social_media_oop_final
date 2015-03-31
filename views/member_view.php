<?php
include('views/menu.php');
?>

<div class="container">
    <div class="container_holder">

        <div id="profile_image_member">
            <img src="<?php echo $info['avatar'];?>" alt='avatar'>
            <?php echo $info['username']; ?><br>
            <a href="../start/logout">Log out</a>
        </div>

        <div class="change_information">
            <div class="panel_header">
                Your information
            </div>
            <div class="panel_info">
                <table>
                    <tr>
                         <td><strong>Your email: </strong> </td><td><?php echo $info['email'];?></td>
                    </tr>
                    <tr>
                        <td> <strong>Gender: </strong> </td><td> <?php echo $info['sex'];?></td>
                    </tr>
                    <tr>
                        <td> <strong>Situation: </strong> </td><td><?php echo $info['situation'];?></td>
                    </tr>
                </table>
                <a href="../user/updateInfoWay">Change your information</a>
            </div>
        </div>
        <div class="change_information">
            <div class="panel_header">
                About you
            </div>
            <div class="panel_info">
                <?php echo $info['about']; ?><br><br>
                <a href="../user/updateInfoWay">Change your information</a>
            </div>
        </div>

        <div class="change_information full_width" >
            <div class="panel_header">
                Change profile picture
            </div>
            <div class="panel_info">
                <form method='POST' action="../user/picture" enctype='multipart/form-data'>
                    <input type="text" name="avatar">
                    <input type="submit" id="change" value="Change" name="submit">
                </form>
            </div>
        </div>

    </div>
</div>





