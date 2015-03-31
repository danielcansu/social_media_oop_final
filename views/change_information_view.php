<?php
include('views/menu.php');
?>

<div class="container_holder">
			<form method='POST' action='../user/updateInfo'>

                <div class="cogs">
                    <i class="fa fa-cogs"></i>
                </div>

                <div class="change_information">
                    <div class="panel_header">
                        Change information
                    </div>
                    <div class="panel_info">
                        <select name="situation">
                        <?php echo isset($info['situation']) ? '<option value='.$info['situation'].'>'.$info['situation'].'</option>':''; ?>
                        <?php echo $info['situation'] !='Single' ? '<option value="Single">Single</option>' : ''; ?>
                        <?php echo $info['situation'] !='In a relationship' ? '<option value="In a relationship">In a relationship</option>' : ''; ?>
                        <?php echo $info['situation'] !='Divorced' ? '<option value="Divorced">Divorced</option>' : ''; ?>
                        <?php echo $info['situation'] !='Married' ? '<option value="Married">Married</option>' : ''; ?>
                        </select><br/><br/>
                        <input type='text' name='email' placeholder='Change your email here'>
                        <textarea rows='6' cols='30' name='about' placeholder="Change info about you"></textarea><br/><br/>
                        <input type='submit' value="Change" name='submit'>
                    </div>
            </form>
                </div>





</div> 


</body>
</html>
