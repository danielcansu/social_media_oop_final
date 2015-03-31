<!DOCTYPE html>
<html>
	<head>
        <link href="../views/css/restart.css" rel="stylesheet" type="text/css"/>
        <link href="../views/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../views/css/style2.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 0px) and (max-width: 400px)" >
        <script type="text/javascript" src="js/js.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	</head>
<body>

<script type='text/javascript'>
    //<![CDATA[
    $(document).ready(function(){
        $("#nav-mobile").html($("#nav-main").html());
        $("#nav-trigger span").click(function(){
            if ($("nav#nav-mobile ul").hasClass("expanded")) {
                $("nav#nav-mobile ul.expanded").removeClass("expanded").slideUp(250);
                $(this).removeClass("open");
            } else {
                $("nav#nav-mobile ul").addClass("expanded").slideDown(250);
                $(this).addClass("open");
            }
        });
    });
    //]]>
</script>


     <nav id="nav-main">
        <ul>
            <li><a href="../user/member">Welcome</a></li>
            <li><a href="../member/view">Members</a></li>
            <li><a href="../member/friends">Friends</a></li>
            <li><a href="../member/invitations">Invitations</a></li>
            <li><a href="../message/messages">Messages</a></li>
            <li><a href="../status/showStatus">Status Wall</a></li>
            <li><a href="../start/logout">Log out</a></li>
        </ul>
    </nav>
    <div id='nav-trigger'>
        <span><i class="fa fa-bars"></i></span>
    </div>
    <nav id='nav-mobile'>

    </nav>



	
