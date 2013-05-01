<?php
include ("../includes/config.php");
// photos
if ($_POST && $_POST['request']=="photos")
    {
        echo '<script> $(function() {$("#gallery a").lightBox({fixedNavigation:true});});</script>
            <div id="gallery">';
        foreach($xml2->gallery->photo as $photo)
                {
                    echo '<a href="'.$photo->url.'"  title="'.$photo->title.'" ><img src="'.$photo->url.'" class="lightbox_thumb" width="120" height="80" alt="" /></a>';
                }
        echo '</div>';
            
    }  
// Announcements
if ($_POST && $_POST['request']=="announcement")
    {
        foreach($xml1->announcement->announce as $announcement)
                {
                    if ($announcement["id"]==$_POST['announcement_id']) 
                        {   
                            echo '  <article class="featured">
                                        <p><a href="#" class="featuredtitle">'.$announcement->title.'</a>
                                        <br/><br/><p>'.$announcement->body.'</p>';
                            echo '  </article>';        
                        }
                }
    }       
// current courses
if ($_POST && $_POST['request']=="specific_course")
    {
        foreach($xml1->course as $course)
                {
                    if ($course["id"]==$_POST['course_id']) 
                        {   
                            echo '  <article class="featured">
                                        <img src="'.$course->thumbnail.'" alt="" class="featuredthumb" />
                                        <p><a href="#" class="featuredtitle">'.$course->title.'</a>';
                                        if ($course->status=="current" )
                                            {
                                                $order=0;
                                                echo '  <br/><br/>
                                                        <p> يتم تدريس دوره ال'.$course->course_name.' في الوقت الحالي </p>
                                                        <p>تم فتح الدورة في تاريخ '.$course->start.'</p>
                                                        <p>'.$course->note.'</p>
                                                        <p style="font-size:16px; font-weight: bold;"> اسماء الطلاب المسجلين</p>
                                                        <table border="1px" style="float:right; margin-right:0; clear:both;">';              
                                                foreach($course->student->name as $name) 
                                                    {
                                                        $order++;
                                                        echo '<tr><td>'.$order.'</td><td>'.$name.'</td></tr>';
                                                    }
                                                echo '  </table>';
                                                }
                                        if ($course->status=="finished") 
                                            {   
                                                $order=0;
                                                echo '  <br/><br/>
                                                        <p> تم الانتهاء من فعاليات الدورة '.$course->course_name.' </p>
                                                        <p>تم فتح الدورة في تاريخ '.$course->start.'</p>
                                                        <p> تم انهاء الدورة في تاريخ '.$course->end.'</p>
                                                        <p>'.$course->note.'</p>
                                                        <p style="font-size:16px; font-weight: bold;"> اسماء الطلاب الخريجين </p>
                                                        <table border="1px" style=" margin-right:0; clear:left;">';              
                                                        foreach($course->student->name as $name) 
                                                            {
                                                                $order++;
                                                                echo '<tr><td>'.$order.'</td><td>'.$name.'</td></tr>';
                                                            }
                                                echo '  </table>';
                                            }
                                        if ($course->status=="upcoming") 
                                            {
                                                echo '  <br/><p>يسر موقع اكاديمية سيسكو المحلي في جامعة كربلاء ان يعلن عن التحضير لبدء الدورة '.$course->course_name.' في تاريخ '.$course->start.'</p>
                                                        <p> الدورة تقبل '.$course->students_number.' طلاب فقط وسيكون اختيار الاسماء وفقا لاسبقية التسجيل </p>
                                                        <p style="font-size:16px; font-weight: bold;"> معلومات التسجيل </p>';              
                                                foreach($course->registration->info_line as $inf) 
                                                    echo '<p>'.$inf.'</p>';
                                                echo '<p>'.$course->note.'</p>';
                                            }
                            echo '  </article>';        
                        }
                }
    }       
if ($_POST && $_POST['request']=="current_course")
    {
        $st=0;
        foreach($xml1->course as $course)
                {
                    if ($course->status=="current") 
                        {   
                            $st=1;
                            $order=0;
                            echo '  <article class="featured">
                                        <img src="'.$course->thumbnail.'" alt="" class="featuredthumb" />
                                        <p><a href="#" class="featuredtitle">'.$course->title.'</a>
                                        <br/><br/>
                                        <p> يتم تدريس دوره ال'.$course->course_name.' في الوقت الحالي </p>
                                        <p>تم فتح الدورة في تاريخ '.$course->start.'</p>
                                        <p>'.$course->note.'</p>
                                        <p style="font-size:16px; font-weight: bold;"> اسماء الطلاب المسجلين</p>
                                        <table border="1px" style="float:right; margin-right:0; clear:both;">';              
                                         foreach($course->student->name as $name) 
                                            {
                                                $order++;
                                                echo '<tr><td>'.$order.'</td><td>'.$name.'</td></tr>';
                                            }
                            echo '      </table>';
                            echo '  </article>';  
                        }
                }  
      if ($st==0) 
          echo '    <article class="featured">
                        <img src="images/exclamation_mark.png" alt="" class="featuredthumb" />
                        <p href="#" class="featuredtitle">لا توجد دورات حاليا </p>
                        <br/><br/><br/><p>   لاتوجد اي دورة مفتوحة في الوقت الحالي ,لمعرفة المزيد حول الدورات القادمة , يرجى زيارة صفحة الدورات القادمة, نشكر تواصلكم.</p>
                    </article>';
    }
if ($_POST && $_POST['request']=="last_courses")
    {
        $st=0;
        foreach($xml1->course as $course)
            {
                if ($course->status=="finished") 
                    {   
                        $st=1;
                        $order=0;
                        echo '  <article class="featured">
                                    <img src="'.$course->thumbnail.'" alt="" class="featuredthumb" />
                                    <p><a href="#" class="featuredtitle">'.$course->title.'</a>
                                    <br/><br/>
                                    <p> تم الانتهاء من فعاليات الدورة '.$course->course_name.' </p>
                                    <p>تم فتح الدورة في تاريخ '.$course->start.'</p>
                                    <p> تم انهاء الدورة في تاريخ '.$course->end.'</p>
                                    <p>'.$course->note.'</p>
                                    <p style="font-size:16px; font-weight: bold;"> اسماء الطلاب الخريجين </p>
                                    <table border="1px" style=" margin-right:0; clear:left;">';              
                                        foreach($course->student->name as $name) 
                                            {
                                                $order++;
                                                echo '<tr><td>'.$order.'</td><td>'.$name.'</td></tr>';
                                            }
                        echo '      </table>
                                    <p>'.$course->note.'</p>
                                    </article>';
                    }
            }  
        if ($st==0) 
            echo '  <article class="featured">
                        <img src="images/exclamation_mark.png" alt="" class="featuredthumb" />
                        <p href="#" class="featuredtitle"> لا توجد دورة منتهية </p>
                        <br/><br/><br/><p>   لاتوجد اي دورة منتهية في الوقت الحالي ,لمعرفة المزيد حول الدورات القادمة , يرجى زيارة صفحة الدورات القادمة, نشكر تواصلكم. </p>
                    </article>';
    }
// show upcoming courses
if ($_POST && $_POST['request']=="upcoming_courses"){
    $st=0;
     foreach($xml1->course as $course)
                        {
                          if ($course->status=="upcoming") 
                                     {
                              echo '
                                <article class="featured">
                                    <img src="'.$course->thumbnail.'" alt="" class="featuredthumb" />
                                    <p><a href="#" class="featuredtitle">'.$course->title.'</a>';
                                       echo ' <br/><p>يسر موقع اكاديمية سيسكو المحلي في جامعة كربلاء ان يعلن عن التحضير لبدء الدورة '.$course->course_name.' في تاريخ '.$course->start.'</p>
                                                <p> الدورة تقبل '.$course->students_number.' طلاب فقط وسيكون اختيار الاسماء وفقا لاسبقية التسجيل </p>
                                                <p style="font-size:16px; font-weight: bold;"> معلومات التسجيل </p>';              
                                          foreach($course->registration->info_line as $inf) 
                                                 echo '<p>'.$inf.'</p>';
                                          echo '<p>'.$course->note.'</p>';
                                     $st=1;
                                     }
                          echo '</article>';  
                         }  
    
    if ($st==0) echo '
        <article class="featured">
            <img src="images/exclamation_mark.png" alt="" class="featuredthumb" />
            <p href="#" class="featuredtitle"> لا توجد دورة معلنة </p>
            <br/><br/><br/><p>  التسجيل مغلق لاي دورة في الوقت الحالي, سوف يتم نشر اعلان الدورة القادمة في اقرب وقت ممكن, نشكر تواصلكم.</p>
        </article>
       ';
}
// show courses details
if ($_POST && $_POST['request']=="courses_details"){
    $st=0;
     foreach($xml2->courses_details->course as $course)
                        {
                              $st=1;
                               echo '
                                <article class="featured">
                                    <img src="'.$course->thumbnail.'" alt="" class="featuredthumb" />
                                    <p><a href="#" class="featuredtitle">'.$course->title.'</a>';
                                       echo ' <br/><p>'.$course->details.'</p>';
                          echo '</article>';  
                        }
    if ($st==0) echo '
        <article class="featured">
            <img src="images/exclamation_mark.png" alt="" class="featuredthumb" />
            <p href="#" class="featuredtitle"> لا يوجد شرح متوفر </p>
            <br/><br/><br/><p> سيتم نشر شرح عن الدورات في القريب العاجل </p>
        </article>
       ';
}
//
if ($_POST && $_POST['request']=="license"){
  echo'
       <article class="featured">
            <img src="images/cisco-logo.png" alt="" class="featuredthumb" />
            <p href="#" class="featuredtitle">'.$xml2->academy_name.'</p>
            <p class="featuredstory">'.$xml2->about->license.'</p>
        </article>
';
}
//
if ($_POST && $_POST['request']=="FAQ"){
  echo'
       <article class="featured">
            <p href="#" class="featuredtitle">الاسئلة المتكررة</p>
            <script>$(function() {$( "#accordion" ).accordion({ header: "h3",autoHeight:false,animated: false});});</script>
            <div id="accordion">';
       foreach($xml2->faq->question as $question)
       {
       echo'<h3><a href="#">'.$question->ask.'</a></h3>
	<div>
		<p>'.$question->answer.'</p>
	</div>';
       }
   echo'</div></article>';
   
}
if ($_POST && $_POST['request']=="team"){
    foreach($xml2->about->team->member as $member)
                {
                    echo '  <article class="featured">
                            <img src="'.$member->photo.'" alt="" class="featuredthumb_contact" style="width:140px; height:auto;"/>
                            <p class="featuredtitle"> '.$member->name.' </p>
                            <br><br><br>
                            <table>
                                <tr>
                                    <td>
                                        <p style="font-size: 10px; float: right;"> &nbsp; '.$member->role.' </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="images/email_icon.png" style="float: right;"/>
                                        <p style="font-size: 10px; float: right;" > &nbsp; '.$member->email.' </p>
                                    </td>
                                </tr>
                                ';
                    if (trim($member->skype)!="")            
                           echo'<tr>
                                    <td>
                                        <img src="images/skype-small-icon.png" style="float: right;"/>
                                        <p style="font-size: 10px; float: right;"> &nbsp; '.$member->skype.' </p>
                                    </td>
                                </tr>';
                    if (trim($member->phone)!="")            
                           echo'
                                <tr>
                                    <td>
                                        <img src="images/telephone-blue.png" style="float: right;"/>
                                        <p style="font-size: 10px; float: right;"> &nbsp; '.$member->phone.' </p>
                                    </td>
                                <tr>';
                    echo    '</table>  
                        </article>';
                }
}
//
if ($_POST && $_POST['request']=="contact"){
  echo ' 
      <div>
      <article class="featured">
            <img src="images/cisco-logo.png" alt="" class="featuredthumb" />
            <p class="featuredtitle">العنوان</p>
            <p class="featuredstory">'.$xml2->academy_name.' </p>
            <p class="featuredstory">'.$xml2->address->academy_location.' </p>
            <p class="featuredstory">'.$xml2->address->city.'-'.$xml2->address->country.' </p>';
            if (trim($xml2->address->email)!="") echo '<p class="featuredstory">البريد الالكتروني: '.$xml2->address->email.' </p>';
            if (trim($xml2->address->phone)!="") echo '<p class="featuredstory">الهاتف : '.$xml2->address->phone.' </p>';
            if (trim($xml2->address->fax)!="") echo '<p class="featuredstory">الفاكس : '.$xml2->address->fax.' </p>';
  echo'</article>
       </div> <br>
       <div class="toggler" style=" padding-bottom: 15px; float:right; clear:right;">
        <div id="effect" class="ui-widget-content ui-corner-all">
            <h5 class="ui-widget-header ui-corner-all" style="padding-right: 5px;padding-left: 5px;">اتصل بنا</h5>
                <form id="contact_us"  name="contact_usn" method="post" enctype="multipart/form-data" action="pages/post.php">
                <br>
                    <table  width="50">
                        <tr>
                            <td>
                                <label>الاسم</label>
                                <input name="c_name" id="c_name" type="text" class="validate[required,minSize[2],maxSize[35]] text-input" size="35"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label>البريد الالكتروني</label>
                            <input name="c_email" id="c_email" type="text" class="validate[required,custom[email]] text-input" size="35" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>الموضوع</label>
                                <input name="c_subject" id="c_subject" type="text" class="validate[required,minSize[4],maxSize[64]] text-input" size="35" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>الرساله</label>
                                    <textarea name="c_body" id="c_body" type="text" class="validate[required,minSize[8],maxSize[1024]] text-input" cols="50" rows="6" ></textarea>
                            </td>
                        </tr>
                     </table>
                     <input name="request" type="hidden"  value="contact_us"/>
               </form>
             </div>
         </div>
         <div class="contact_us_div">
            <button id="send">ارسال </button>
            <button id="cancel">الغاء</button>
         </div>'; 
}
if ($_POST && $_POST['request']=="contact_us"){
    $data= array(
    "c_name" => $_POST['c_name'],
    "c_email" => $_POST['c_email'],
    "c_subject" => $_POST['c_subject'],
    "c_body" => $_POST['c_body'],
    );
   // echo $data['c_name'].'<br>'.$data['c_email'].'<br>'.$data['c_subject'].'<br>'.$data['c_body'].'<br>';
   echo ' <div class="toggler" style=" padding-bottom: 15px;">
            <div id="effect" class="ui-widget-content ui-corner-all">
                <h5 class="ui-widget-header ui-corner-all" style="padding-right: 5px;padding-left: 5px;"> شكرا للتواصل </h5>';
                $cisco->contact_us($data,$xml2->address->contact_form_email);
   echo '   </div>
        </div>
            <div class="contact_us_div">
                <br>
                <br>
                <button id="cancel">الرئيسية</button>
            </div>';
}
if ($_POST && $_POST['request']=="main"){
    echo'
       
			<section id="lightboxthumbs">
			</section> 
                        	<article class="featured">
					<img src="'.$xml2->main->main_article->thumbnail.'" alt="" class="featuredthumb" />
					<p class="featuredtitle">'.$xml2->main->main_article->title.'</p>
                                        <p class="featuredstory">'.$xml2->main->main_article->body.'</p> 
				</article>';
                        $x=1;        
                        foreach($xml2->main->articles->article as $article)
                                        {
                                            echo '<article class="';if($x==1) {$x=2;echo'odd';}else{$x=1;echo'even';}echo'">
                                                        <img src="'.$article->thumbnail.'" alt="" class="thumb" />
                                                        <p class="title">'.$article->title.'</p>
                                                        <p class="story">'.$article->body.'</p>
                                                </article>';
                                        }
                                        echo '<br/><hr/>';
}
?>