<?php
 include ("includes/config.php");
?>
<!doctype html>
<link rel="stylesheet" href="js/development-bundle/themes/redmond/jquery-ui-1.8.19.custom.css">
<link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="print.css" media="print" />
<link rel="stylesheet" href="js/jquery_validation/css/validationEngine.jquery.rtl.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/lightbox.css" media="screen" />
<script type="text/javascript" src="js/development-bundle/jquery-1.7.1.js"></script>
<script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.button.js"></script> 
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.tabs.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.accordion.js"></script>
<script type="text/javascript" src="js/jquery_validation/js/jquery.validationEngine.js" charset="utf-8"></script>
<script type="text/javascript"  src="js/simpletabs.js"></script> 
<script type="text/javascript" src="js/jquery_validation/js/languages/jquery.validationEngine-arabic.js" charset="utf-8"></script>
<script type="text/javascript" >
$(document).ready(function(){
$.post('pages/post.php', { request: "main" },function(data){$("#content").html(data);});                      
jQuery("#contact_us").validationEngine();
});
$(function() {
        //$('a[@rel*=lightbox]').lightBox(); // Select all links that contains lightbox in the attribute rel        
	 $( "#main_page" ).click(function() {$(".formError").remove();
			  $.post('pages/post.php', { request: "main" }, function(data){$("#content").html(data);});
               });
        $( "li[name^='announcement']" ).click(function() {$(".formError").remove();
			$.post('pages/post.php', { request: "announcement", announcement_id:document.getElementById(this.id).value }, function(data){$("#content").html(data);});
               });
        $( "li[name^='specific_course']" ).click(function() {$(".formError").remove();
			$.post('pages/post.php', { request: "specific_course", course_id:document.getElementById(this.id).value }, function(data){$("#content").html(data);});
               });
        $( "#photos" ).click(function() {$(".formError").remove();
			  $.post('pages/post.php', { request: "photos" }, function(data){$("#content").html(data);});
               });
        $( "#current_courses" ).click(function() {$(".formError").remove();
			  $.post('pages/post.php', { request: "current_course" }, function(data){$("#content").html(data);});
               });
        $( "#last_courses" ).click(function() {$(".formError").remove();
			  $.post('pages/post.php', { request: "last_courses" }, function(data){$("#content").html(data);});
               });
       $( "#upcoming_courses" ).click(function() {$(".formError").remove();
			  $.post('pages/post.php', { request: "upcoming_courses" }, function(data){$("#content").html(data);});
               });
       $( "#courses_details" ).click(function() {$(".formError").remove();
			  $.post('pages/post.php', { request: "courses_details" }, function(data){$("#content").html(data);});
               });
       $( "#license" ).click(function() {$(".formError").remove();
			  $.post('pages/post.php', { request: "license" }, function(data){$("#content").html(data);});
               });
       $( "#team" ).click(function() {$(".formError").remove();
			  $.post('pages/post.php', { request: "team" }, function(data){$("#content").html(data);});
               });
       $( "#FAQ" ).click(function() {$(".formError").remove();
			  $.post('pages/post.php', { request: "FAQ" }, function(data){$("#content").html(data);});
               });
       $( "#contact" ).click(function() {$(".formError").remove();
			  $.post('pages/post.php', { request: "contact" }, function(data){$("#content").html(data);$('.contact_us_div button').button();jQuery("#contact_us").validationEngine();});
               });
      $( "#send" ).button({icons: {secondary: "ui-icon-transfer-e-w"}}).live("click",function() { 
       if(jQuery("#contact_us").validationEngine('validate')) $.post('pages/post.php', $("#contact_us").serialize(), function(data){$("#content").html(data);$('.contact_us_div button').button();});})
     $( "#cancel" ).button({icons: {secondary: "ui-icon-home"}})       .live("click",function() { $(".formError").remove(); $.post('pages/post.php', { request: "main" }, function(data){$("#content").html(data);});});
      });		
</script>
<style>
		.toggler { width: 600px; position: relative; padding-bottom: 10px;}
		#button { padding: .4em 1em; text-decoration: none; }
		#effect { width: 600px; padding: 0.4em; position: relative;}
		#effect h3 { margin: 0; padding: 0.4em; text-align: center; font-size: 20px;}
		.ui-effects-transfer { border: 2px dotted gray; } 
                #toolbar {padding: 10px 4px;}	
</style>
<head>
	<meta charset="utf-8" />
<title><?php echo $xml2->academy_name; ?></title>
</head>
<body>
<div id="wrapper"><!-- #wrapper -->

	<header><!-- header -->
		<a href="<?php echo $xml2->local_logo_link; ?>"><img class="logo" src="<?php echo $xml2->local_logo_thumb; ?>" width="80" height="102" alt="" ></a>
                <a href="<?php echo $xml2->cisco_logo_link; ?>"><img class="logo" src="<?php echo $xml2->cisco_logo_thumb; ?>" width="110" height="58" alt="" style="padding-top: 40px;"></a>
		<h1><a href="#"><?php echo $xml2->logo_text; ?></a></h1>
		<h2><?php echo $xml2->sub_logo_text; ?></h2>
	</header><!-- end of header -->
	
	<nav><!-- top nav -->
		<div class="menu">
			<ul>
				<li id="main_page"><a href="#">ألرئيسية</a></li>
				<li><a href="#">الدورات</a>
					<ul>
						<li id="current_courses"><a  href="#">المقامة حاليا</a></li>
						<li id="last_courses"><a href="#">الدورات المنتهية</a></li>
						<li id="upcoming_courses"><a href="#">الدورات القادمة</a></li>
						<li id="courses_details"><a href="#">قائمة الدورات</a></li>
					</ul>
				</li>
					<li id="FAQ"><a href="#">الاسئلة المتكررة</a></li>
                                        <li id="photos"><a href="#">معرض الصور</a></li>
                                        <li><a href="#">حول الاكاديمية</a>
			    <ul>
   					<li id="license"><a href="#">الترخيص&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
   					<li id="team"><a href="#">فريق العمل</a></li>
                            </ul>
  			</li>
				<li id="contact"><a href="#">اتصل بنا</a></li>
			</ul>
		</div>
	</nav><!-- end of top nav -->
	
	<section id="main"><!-- #main content and sidebar area -->
            <section id="content"><!-- #content -->
            </section><!-- end of #content -->

            <aside id="sidebar"><!-- sidebar -->
                <a href="https://www.netacad.com/"><img src="images/student.png" width="200" height="44" alt="" ></a>
                <br><br><br>
                <div class="tabwidget"> 
                    <ul class="tabs"> 
                        <li><a href="#tab1">اعلانات مهمة</a></li>
                        <li><a href="#tab2">الدورات </a></li>
                        <li><a href="#tab3">كلمة الاكاديمية</a></li>
                    </ul> 
                    <div class="tab_container"> 
                        <div id="tab1" class="tab_content"> 
                            <h3>اعلانات عامة</h3> 
                            <ul>
                                <?php
                                    foreach($xml1->announcement->announce as $announcement)
                                      {
                                          echo '<li id="announcement'.$announcement["id"].'" name="announcement'.$announcement["id"].'" value="'.$announcement["id"].'" style="text-align:right; float:right;"><a href="#">'.$announcement->title.'</a></li>';
                                      }
                                ?> 
                            </ul>
                            <br/><br/><br/>
                        </div> 
                        <div id="tab2" class="tab_content"> 
                            <h3>اعلان الدورات</h3> 
                            <ul>
                                <!--<li id="courses2"><a href="#">CCNA Exploration 3-6-2012</a></li>-->
                                <?php
                                    foreach($xml1->course as $course)
                                        {
                                             echo '<li id="specific_course'.$course["id"].'" name="specific_course'.$course["id"].'" value="'.$course["id"].'" style="text-align:left; float:left;"><a href="#">'.$course->title;if($course->status=="upcoming") echo'<img src="images/new.png" style="float: right; border:0px;"/>'; echo'</a></li>';
                                        }
                                ?> 
                            </ul>
                            <br/><br/><br/>
                        </div> 
                        <div id="tab3" class="tab_content"> 
                            <h3> <?php echo $xml2-> main->lmc_statement->title; ?> </h3> 
                            <img src="<?php echo $xml2-> main->lmc_statement->thumbnail; ?>" alt="" /><p><?php echo $xml2-> main->lmc_statement->body; ?></p>
                        </div>
                    </div>
                </div>
  	    
                <div class="standard">
        	<!--<h3>Things To Do</h3>
					<ul>
						<li><a href="#">Create</a></li>
						<li><a href="#">Have Fun</a></li>
						<li><a href="#">Share With Friends</a></li>
						<li><a href="#">Play Games</a></li>
						<li><a href="#">Upload</a></li>
						<li><a href="#">Download</a></li>
					</ul>

					
				<h3>Sponsors</h3>
					<img src="images/ad180.png" alt="" /><br /><br />

				<h3>Connect With Us</h3>
					<ul>
						<li><a href="#">Twitter</a></li>
						<li><a href="#">Facebook</a></li>
						<li><a href="#">LinkedIn</a></li>
						<li><a href="#">Flickr</a></li>
					</ul>-->
			</div>

		</aside><!-- end of sidebar -->

	</section><!-- end of #main content and sidebar-->
	
		<footer>
		<section id="footer-area">

			<section id="footer-outer-block">
					<?php
                                        foreach($xml2->footer_links->title as $title)
                                            {
                                             echo '<aside class="footer-segment">
                                                        <h4>'.$title.'</h4>
                                                            <ul>';
                                            foreach($title->link as $link)
                                                {
                                                    echo'       <li><a href="'.$link->url.'">'.$link->sub_title.'</a></li>';
                                                }
                                            echo '          </ul></aside>';
                                            }
                                        ?>
                                        <!-- end of links footer segment -->
                       </section><!-- end of footer-outer-block -->
               </section><!-- end of footer-area -->
	</footer>
</div><!-- #wrapper -->
<?php echo $cisco->data; ?><!-- Please don't remove this line -->
</body>
</html>