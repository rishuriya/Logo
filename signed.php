<?php
include('security.php');
?>

<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/signed.css">
  </head>
 <body>
<header>
    <a href="#" class='logo'>LOGO</a>
    <ul>
      <li><a href="#" >Dashboard</a></li>
      <li><a href="#">About</a></li>
      <li><a href="Community.php">Community</a></li>
      <li><a href="post.php">Post</a></li>
      <li><img src='img/undraw_profile.svg' id="profile_photo">
            </li>
    </ul>

  </header>

  <section>
    <div class='title'>
        <h1 id='text1'><a href='#'>Welcome <?php echo $_SESSION['username'];?></a></h1>
    </div>
    <script type="text/javascript" src="css/anime.js"></script>
  </section>
  <div class="sec" id='sec'>
    <h2>Recent Blogs</h2>
    <p> Recovering from Covid for those affected in the second wave has not been easy. Apart from the unfortunate many who have either died or suffered terribly before eventually emerging from the illness, the pandemic in its second coming has left deep and enduring psychological scars on virtually everyone else.<br>
      <br>
When we finally put 2020 behind us, the world had heaved a collective sigh of relief. For it seemed that the anxiety stemming from being confronted by a threat of a kind most of us had never encountered before would abate. Even if the virus re-surfaced, we would be more aware of what to do and what to avoid, better prepared in terms of infrastructure, more experienced in treating those affected by the disease. And most importantly, vaccination was finally becoming a reality. As if to encourage such positive ideas, the Indian caseload dropped significantly and with vaccination around the corner, we were getting ready to embrace a post-Covid world, full of hugs and shopping sprees. Indeed, many started behaving as if the pandemic was behind us.</p>

  </div>
</body>
</html>