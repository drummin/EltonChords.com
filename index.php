<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/_functions/db.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/_functions/functions.php");

$albums = getAlbums();
//print_r($albums);

$albumTitleArray = array();

foreach ($albums as $album) {
	if(!in_array($album['Album'], $albumTitleArray)) {
		$albumTitleArray[] = $album['Album'];
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EltonChords.com : The online catalog for all songs Elton John.</title>
<meta name="description" content="The near complete, and continually growing, reference for Elton John's songs on piano." />

<script type="text/javascript" src="http://use.typekit.com/gat0cus.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>


<style type="text/css">
body { margin: 0px; padding: 0px; font-family: helvetica, arial, sans-serif; } 
.header { margin: 0px auto; width: 100%;}
.mainBody { width: 960px; margin: 0 auto;}
div.album {
	list-style-type: none;
	width: 25%;
	float: left;
}
div.album h1, .misc-album h1 {
	font-size: 22px;
	padding-top: 20px;
	width: 90%;
	line-height: 140%;
}
div.album a, .misc-album a {
	color: #666;
	font-size: 14px;
	padding: 2px;
	display: inline-block;
	line-height: 140%;
	width: 95%;
}
div.album a:hover, .misc-album a:hover {
	background-color: lightgrey;
}
div.album:nth-child(4n+1) {  
  clear: both;
}
.misc-album a {
	list-style-type: none;
	width: 30%;
	float: left;
}

.news {
	line-height: 140%;
}
.advertising {
	background-color: #69f;
	margin: 20px 0px;
	color: white;
	padding: 20px;
	line-height: 140%;
	font-size: 22px;
}
.advertising a {
	color: white;
}

</style>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-77041-8']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</head>

<body>


<div class="mainBody">

	<div class="header">
		<a href="http://www.eltonchords.com">
			<img src="images/header2011.jpg" alt="Header image. Elton standiing in a b/w photo. Text - EltonChords.com. The near complete, and continually growing, reference for Elton John's songs on piano." />
		</a>
	</div>


	<div class="news">
		<p><strong>Update:</strong> Wow. Step away for a while and things really go to heck. I have cleaned up a bit of the site again. The albums are presented in alphabetical order with the miscellaneous songs grouped at the end.</p>
		<p>Also realized that after a few server moves the email address was no longer working. Which would explain the lack of email appearing in my inbox. That has been fixed. You can email me at <a href="mailto:admin@eltonchords.com">admin@eltonchords.com</a>.</p>
		<p>I think we have just about everything for 'The Union', but 'The Diving Board' is still very sparse, so if you have anything, send it in.</p>
	</div>

	 <br clear="all" />   
	    
	<div id="albumArea">

	<?php 

	foreach ($albumTitleArray as $title) {
		if ($title != 'Misc') {	
			echo '<div class="album">';
			echo '<h1>' . $title . '</h1>';

			foreach ($albums as $album) {
				if ($album['Album'] == $title) {	
						echo '<li><a href="/chord_library/'.$album['FileName'].'">' . $album['SongTitle'] . '</a></li>';
				}
			}
			echo '</div>';
		}
	}
	?>
	</div>
</div>

<br clear="all" />


	<div class="advertising">
	<div class="mainBody">

		No one likes to see ads on the sites they visit, and I would like to keep the site advertising free. Saying that, it would be great if you could support this site by <a href="http://www.amazon.com/?tag=eltonchords-20" target="_blank">shopping at Amazon.com through this affiliate link.</a> It's the only income that this site generates.
	</div>
	</div>


<div class="mainBody">

	<div class="misc-album">
		<h1>Miscellaneous Tracks</h1>
		<?php 

		foreach ($albums as $album) {
			if($album['Album'] == 'Misc') {
						echo '<a href="/chord_library/'.$album['FileName'].'">' . $album['SongTitle'] . '</a>';
			}	
		}
		
		?>
	</div>

</div>

</div>

<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />

</body>
</html>
