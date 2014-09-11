<?php include('header.php');?>

<?php if(validation_errors()):?>
<div class="alert alert-danger">
	<a class="close" data-dismiss="alert">&times;</a>
	<?php echo validation_errors();?>
</div>
<?php endif;?>
        <?php
        echo "<input type='hidden' id='id_student' name='id_student' value='".$user_logged->id."'>";       
        if($user_logged->front != "false"){
            $image1     = explode("{", $user_logged->front);
            $image2     = explode(":", $image1[2]);
            $image3     = explode("\"", $image2[1]);
            $frontUrlProfile   = $image3[1];
        }else $frontUrlProfile = '';?>
        <div class="header-coach-image-inside header-profile" style="background-color: #CCC; background-image: url(<?php echo base_url( "uploads/images/full/". (($frontUrlProfile) ? $frontUrlProfile : 'user.png') );?>); background-size: 100% auto; background-position: center;"></div>
        <div class="jumbotron zero-margin content-shadow effect-load fadein" style="z-index: 5;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="well box-profile" align="center">
                            <?php
                            if($user_logged->photo != "false"){
                                $image1     = explode("{", $user_logged->photo);
                                $image2     = explode(":", $image1[2]);
                                $image3     = explode("\"", $image2[1]);
                                $photoUrlProfile   = $image3[1];
                            }else $photoUrlProfile = '';?>
                            
                            <img src="<?php echo base_url( "uploads/images/full/". (($photoUrlProfile) ? $photoUrlProfile : 'user.png') );?>" alt="coach-image" class="img-circle img-responsive border-image-profile">
                            <h3 class="text-bold" title="<?php echo strtoupper($user_logged->firstname);?> <?php echo strtoupper($user_logged->lastname);?>"><?php echo substr(strtoupper($user_logged->firstname), 0, 7);?>. <?php echo substr(strtoupper($user_logged->lastname), 0, 7);?>.</h3>
                            <p class="text-md-small" title="<?php echo ucwords($user_logged->quote);?>"><span class="glyphicon glyphicon-heart text-primary"></span> <?php echo substr(ucwords($user_logged->quote), 0, 46);?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p align="justify" class="text-md-small">
                            <strong>Experiences:</strong> <?php echo substr($user_logged->experiences, 0, 44);?><br>
                            <strong>Education:</strong> <?php echo substr($user_logged->education, 0, 46);?>
                        </p>
                        <p align="justify" class="text-md-small">
                            <?php echo $user_logged->bio;?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="jumbotron zero-margin content-shadow effect-load slide" style="z-index: 4; padding: 1%; padding-bottom: 5%;">
            <div class="container" style="padding-bottom: 2%; padding-top: 2%;">

                <ul class="nav nav-pills nav-stacked all-text-medium nav-coach-profile pull-left" id="myTab">
                    <li class="active">
                        <a href="#courses">
                            <span class="glyphicon glyphicon-calendar"></span>
                            <span class="text-bold" style="font-size: 14px;"> &nbsp; COURSES</span>
                        </a>
                    </li>    
                    <?php 
                    if (isset($cart_contents['customer']['id'])) {
                        if ( $cart_contents['customer']['type'] == 'trainer' ) {      
                        echo "<input type='hidden' id='id_trainer' name='id_trainer' value='".$cart_contents['customer']['id']."'>";                                   
                    ?>
                        <li>
                            <a href="#comments">
                                <span class="glyphicon glyphicon-calendar"></span>
                                <span class="text-bold" style="font-size: 14px;"> &nbsp; COMMENTS FOR TRAINER</span>
                            </a>
                        </li>   
                        <li>
                            <a href="#fitness_assessment">
                                <span class="glyphicon glyphicon-calendar"></span>
                                <span class="text-bold" style="font-size: 14px;"> &nbsp; FITNESS ASSESSMENT</span>
                            </a>
                        </li> 
                    <?php 
                        }
                    }
                    ?>                     
                </ul>

                <div class="tab-content" style="overflow: hidden;">
                    <div class="tab-pane active" id="courses">
                        <h3 align="center"><strong>CLASS SCHEDULE</strong></h3>
                        <?php foreach ($courses_trainer as $i => $course_trainer){?>
                        <div class="jumbotron zero-margin content-shadow effect-load slide" style="z-index: <?php echo $i;?>;padding: 0;">
                            <div class="container">
                                <h4 class="a3w-text-color text-bold">Monthly Subscription</h4>
                                <h5 class="header-underline text-bold"><?php echo $course_trainer->name;?></h5>
                                <p>
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                        <?php
                                        if($course_trainer->images != "false"){
                                            $image1     = explode("{", $course_trainer->images);
                                            $image2     = explode(":", $image1[2]);
                                            $image3     = explode("\"", $image2[1]);
                                            $photoUrl   = $image3[1];
                                        }else $photoUrl = '';?>
                                        <img class="media-object" src="<?php echo base_url('uploads/images/full/'. $photoUrl);?>" alt="Trainer" height="70">
                                        </a>
                                        <div class="media-body text-md-small line-height">
                                            <?php echo $course_trainer->description;?>
                                        </div>
                                    </div>
                                    <span class="break small-height"></span>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="well">
                                                <h5 class="text-bold">Package Details</h5>
                                                <p class="text-small" style="padding-left: 5px;">
                                                    Class credits expire at the end of 30 Days.
                                                    <span class="break small-height"></span>
                                                    12 workout Credits for Private Live & Online Personal Training Session
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="well line-height" align="center">
                                                All for <b>$<?php //echo $course_trainer->price;?></b>
                                                <br>
                                                A <b>$600</b> value. Buy today.
                                                <?php if($cart_contents['customer']['type'] == 'trainer' ){?>
                                                <form action="https://plus.google.com/hangouts/_" method="get" target="_blank">
													<input type="hidden" name="gid" value="39711101729">
													<input type="submit" class="btn btn-success btn-lg" value="Go to class" >
												</form>
                                                <?php }else{?>
                                                <a data-toggle="modal" href="#modal_check_courses" class="btn btn-primary btn-lg" onclick="check_courses_shop_profile(<?php echo $course_trainer->id?>);">Check</a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div class="tab-pane" id="comments">
                        <div class="jumbotron zero-margin content-shadow effect-load slide" style="padding: 0;">
                            <br />
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-9" style="background-color:#E5E5E5; margin: 0 10%; border-radius: 7px">                                    
                                        <h5 class="text-bold">Comment</h5>                                    
                                        <textarea id="comment_description" name="comment_description" row="20" style="width:100%; color: #686868; font-size: 12px; height: 132px; line-height: 14px;  padding: 2px;"></textarea>
                                        <a class="btn btn-success" onclick="save_comment_profile_student()">Publish</a>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="container">                                
                                <div class="row" id="comments_list">
                                    <?php 
                                        $query = $this->db->query("SELECT * FROM comments_profile 
                                                                   INNER JOIN customers ON customers.id = comments_profile.id_trainer
                                                                   WHERE id_student=$user_logged->id
                                                                   ORDER BY date DESC");
                                        foreach ($query->result() as $row){
                                    ?>
                                        <div class="col-md-9" style="margin:0 10% 30px; margin-button:10px; border-radius: 7px; box-shadow: 5px 0 48px -26px rgba(0, 0, 0, 0.8)"> 
                                            <h5 class="header-underline text-bold">
                                                <?php echo $row->firstname." ".$row->lastname;?>
                                                <br />
                                                <i style="font-size:10px;color:gray"><?php echo $row->date ?></i>
                                            </h5>
                                            
                                            <div class="media" style="margin-bottom: 10px;">                                            
                                                <a class="pull-left" style="float:left">
                                                    <?php
                                                        $image1     = explode("{", $row->photo);
                                                        $image2     = explode(":", $image1[2]);
                                                        $image3     = explode("\"", $image2[1]);
                                                        $photoUrl   = $image3[1];
                                                    ?>
                                                    <img class="media-object" src="<?php echo base_url('uploads/images/full/'. $photoUrl);?>" alt="Trainer" width="110">
                                                </a>
                                                <div class="media-body text-md-small line-height" style="font-size: 12px; line-height: 15px;">
                                                    <?php echo $row->description;?>
                                                </div>
                                            </div>
                                        </div> 
                                    <?php 
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="fitness_assessment">
                        <div class="jumbotron zero-margin content-shadow effect-load slide" style="padding: 0;">
                            <br />
                            <div class="container">
                                <div class="row" style="line-height: 20px;">
                                    <fieldset>          
                                          <?php 
                                            $birthdate = "";
                                            $method_of_contact = "";
                                            $method_of_contact_call_day = "";
                                            $height = "";
                                            $current_weight = "";
                                            $ideal_weight = "";
                                            $pant_size = "";
                                            $dress_size = "";
                                            $current_activity = "";
                                            $explain_current_activity = "";
                                            $chest = "";
                                            $arms = "";
                                            $waist = "";
                                            $hips = "";
                                            $thigh = "";
                                            $calf = "";
                                            $neck = "";
                                            $optional_question_health_club = "";
                                            $optional_question_trainner_before = "";
                                            $question_optional3 = "";
                                            $question_optional4 = "";
                                            $question_optional5 = "";
                                            
                                            $query = $this->db->query("SELECT *, 
                                                                       DATE_FORMAT(birthdate, '%d/%m/%Y') AS birthday
                                                                       FROM fitness_assessment_student                                                                        
                                                                       WHERE id_customer=$user_logged->id");
                                            if($query->num_rows() > 0){                                                
                                                $ror_fas = $query->row();   
                                                $birthdate = $ror_fas->birthday;
                                                $method_of_contact = $ror_fas->method_of_contact;
                                                $method_of_contact_call_day = $ror_fas->method_of_contact_call_day;
                                                $height = $ror_fas->height;
                                                $current_weight = $ror_fas->current_weight;
                                                $ideal_weight = $ror_fas->ideal_weight;
                                                $pant_size = $ror_fas->pant_size;
                                                $dress_size = $ror_fas->dress_size;
                                                $current_activity = $ror_fas->current_activity;
                                                $explain_current_activity = $ror_fas->explain_current_activity;
                                                $chest = $ror_fas->chest;
                                                $arms = $ror_fas->arms;
                                                $waist = $ror_fas->waist;
                                                $hips = $ror_fas->hips;
                                                $thigh = $ror_fas->thigh;
                                                $calf = $ror_fas->calf;
                                                $neck = $ror_fas->neck;
                                                $optional_question_health_club = $ror_fas->optional_question_health_club;
                                                $optional_question_trainner_before = $ror_fas->optional_question_trainner_before;
                                                $question_optional3 = $ror_fas->question_optional3;
                                                $question_optional4 = $ror_fas->question_optional4;
                                                $question_optional5 = $ror_fas->question_optional5;
                                            }                      
                                          ?>
                                          <div class="jumbotron zero-margin content-shadow effect-load slideDown" style="z-index: 4;">
                                              <div class="container">
                                                  <div class="row" style="line-height:20px">
                                                      <div style="width:80%;margin: 0 auto;">                         
                                                          <div class="row">  
                                                              <div class="col-md-6 text-md-small">                                
                                                                  <strong>Date of birth</strong>
                                                                  <div class="form-group">
                                                                          <div class='input-group date'>                                           
                                                                              <input type="text" disabled class="form-control" style="border-radius:6px !important" id="birthdate" readonly name="birthdate" value="<?php echo $birthdate;?>">
                                                                          </div>
                                                                      </div>   
                                                              </div> 
                                                          </div>   
                                                          <div class="row">
                                                              <div class="col-md-6 text-md-small">
                                                                  <strong>Preferred method of contact:</strong>
                                                                  <input type="text" disabled class="form-control" name="method_of_contact" id="method_of_contact" value="<?php echo $method_of_contact;?>">                               
                                                              </div>
                                                              <div class="col-md-6 text-md-small">                                
                                                                  <strong>If call, what time of day</strong>
                                                                  <input type="text" disabled class="form-control" name="method_of_contact_call_day" id="method_of_contact_call_day" value="<?php echo $method_of_contact_call_day;?>">                               
                                                              </div> 
                                                          </div>
                                                          <div class="row">                  
                                                              <div class="col-md-4 text-md-small">                                                                                                                                                           
                                                                  <strong>Height</strong>
                                                                  <input type="text" disabled class="form-control" id="height" name="height" value="<?php echo $height;?>" >
                                                              </div> 
                                                              <div class="col-md-4 text-md-small">
                                                                  <strong>Current Weight</strong>
                                                                  <input type="text" disabled class="form-control" id="current_weight" name="current_weight" value="<?php echo $current_weight;?>" >
                                                              </div> 
                                                              <div class="col-md-4 text-md-small">
                                                                  <strong>Ideal Weight</strong>
                                                                  <input type="text" disabled class="form-control" id="ideal_weight" name="ideal_weight" value="<?php echo $ideal_weight;?>" >
                                                              </div> 
                                                          </div>
                                                          <div class="row">
                                                              <div class="col-md-6 text-md-small">
                                                                  <strong>Pants size</strong>
                                                                  <input type="text" disabled class="form-control" id="pant_size" name="pant_size" value="<?php echo $pant_size;?>" >
                                                              </div> 
                                                              <div class="col-md-6 text-md-small">
                                                                  <strong>Dress size (if applicable)</strong>
                                                                  <input type="text" disabled class="form-control" id="dress_size" name="dress_size" value="<?php echo $dress_size;?>" >
                                                              </div>
                                                          </div>
                                                          <div class="row">
                                                              <div class="col-md-12 text-md-small">
                                                                  <strong>Current activity level:</strong>
                                                                  <input type="text" disabled class="form-control" name="current_activity" id="current_activity" value="<?php echo $current_activity;?>">
                                                              </div>
                                                          </div>
                                                          <div class="row">
                                                              <div class="col-md-12 text-md-small">                                
                                                                  <strong>Explain here</strong>
                                                                  <input type="text" disabled class="form-control" name="explain_current_activity" id="explain_current_activity" value="<?php echo $explain_current_activity;?>">                               
                                                              </div> 
                                                          </div>
<!--                                                          <div class="row">
                                                              <div class="col-md-12 text-md-small">                                
                                                                  <strong>Measurements: Today’s date <?php echo date("Y-m-d"); ?></strong>                             
                                                              </div> 
                                                          </div>-->
                                                          <div class="row">
                                                              <div class="col-md-3 text-md-small">
                                                                  <strong>Chest</strong>
                                                                  <input type="text" disabled class="form-control" id="chest" name="chest" value="<?php echo $chest;?>" >
                                                              </div>                                                                                   
                                                              <div class="col-md-3 text-md-small">
                                                                  <strong>Arms</strong>
                                                                  <input type="text" disabled class="form-control" id="arms" name="arms" value="<?php echo $arms;?>" >
                                                              </div>
                                                              <div class="col-md-3 text-md-small">
                                                                  <strong>Waist</strong>
                                                                  <input type="text" disabled class="form-control" id="waist" name="waist" value="<?php echo $waist;?>" >
                                                              </div>
                                                              <div class="col-md-3 text-md-small">
                                                                  <strong>Hips</strong>
                                                                  <input type="text" disabled class="form-control" id="hips" name="hips" value="<?php echo $hips;?>" >
                                                              </div>  
                                                          </div>
                                                          <div class="row">
                                                              <div class="col-md-3 text-md-small">
                                                                  <strong>Thigh</strong>
                                                                  <input type="text" disabled class="form-control" id="thigh" name="thigh" value="<?php echo $thigh;?>" >
                                                              </div>                        
                                                              <div class="col-md-3 text-md-small">
                                                                  <strong>Calf</strong>
                                                                  <input type="text" disabled class="form-control" id="calf" name="calf" value="<?php echo $calf;?>" >
                                                              </div>                        
                                                              <div class="col-md-3 text-md-small">
                                                                  <strong>Neck</strong>
                                                                  <div style="padding-left: 0px;"></div>
                                                                  <input type="text" disabled class="form-control" id="neck" name="neck" value="<?php echo $neck;?>" >
                                                              </div> 
                                                          </div>
                                                          <div class="row">
                                                              <div class="col-md-12 text-md-small">
                                                                  <strong>Are you currently a member of another health club?</strong>
                                                                  <input type="text" disabled class="form-control" name="optional_question_health_club" id="optional_question_health_club" value="<?php echo $optional_question_health_club;?>">
                                                              </div> 
                                                          </div>
                                                          <div class="row">
                                                              <div class="col-md-12 text-md-small">
                                                                  <strong>Have you ever used a personal trainer before?</strong>
                                                                  <input type="text" disabled class="form-control" name="optional_question_trainner_before" id="optional_question_trainner_before" value="<?php echo $optional_question_trainner_before;?>">
                                                              </div>   
                                                          </div>
                                                          <div class="row">
                                                              <div class="col-md-12 text-md-small">                                
                                                                  <strong>What is your biggest struggle in achieving or maintaining a healthy weight or fitness level?</strong>
                                                                  <input type="text" disabled class="form-control" name="question_optional3" id="question_optional3" value="<?php echo $question_optional3;?>">                               
                                                              </div>     
                                                          </div>
                                                          <div class="row">
                                                              <div class="col-md-12 text-md-small">                                
                                                                  <strong>What external factors have derailed you in the past?: Time, Money, No Facility, Procrastination, Lack of
                                                                  Support, Discipline, Accountability, Lack of Expertise, other</strong>
                                                                  <input type="text" disabled class="form-control" name="question_optional4" id="question_optional4" value="<?php echo $question_optional4;?>">                               
                                                              </div>      
                                                          </div>
                                                          <div class="row">
                                                              <div class="col-md-12 text-md-small">                                
                                                                  <strong>Do you have any bad health habits? ie: smoke, drink, drugs, fast food</strong>
                                                                  <input type="text" disabled class="form-control" name="question_optional5" id="question_optional5" value="<?php echo $question_optional5;?>">                               
                                                              </div> 
                                                          </div>  
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>  
                                      </fieldset>
                                </div>
                            </div>
                            <br />                            
                        </div>
                    </div>
                </div>
            </div>

  

        </div>

                    
        <div class="well zero-margin">
            <div class="row">
                <div class="col-md-7">
                    <strong>Enim nibh elementum orci</strong> ut volutpat eros sapien nec sapien suspendisse neque arcu, ultrices commodo, pellentesque sit amet, ultricies ut, ipsum.
                </div>
                <div class="col-md-5"></div>
            </div>
        </div>
    </div>
      
    <footer class="well zero-margin">
        <div class="container page-width">
            <div class="row">
                <div class="col-md-6">
                    <ul class="nav nav-pills">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="blog.html">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3 class="text-right">A3WORKOUT</h3>
                </div>
            </div>
        </div>
    </footer>
    <div align="center" class="well well-sm zero-margin">&copy; A3Workout. All rights reserved. Design by Ilikewebsites</div>
    <!-- Modal Edit Profile -->
    <div class="modal fade" id="modal_check_courses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:70%">
            <div class="modal-content" id="modal_check">            
                <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
        </div>
    </div>

    <script type="text/javascript">
  		window.onload = function(){

  			$('#search_course_category button')
  				.click(function(){
  					var valSelected = ""; 
  					$('#search_course_category select option:selected').each(function(i, selected){
  						valSelected += $(selected).val()+",";
  					});
  					
					$('#categories_course').val(valSelected);
					$('#message_add_category_course').show();
  	  			});
  	  		$('#search_course_category input[type=search]')
  	  			.keyup(function(){
  	  	  			var char 	= $(this).val();

  	  	  			_vivo.arca(cnx, function(response){
  	  	  				response.exec("{{<?php echo Crypt::encode("SELECT * FROM categories WHERE type = 1 AND name LIKE ")?>}}'%"+ char +"%'", function(response){
  	  	  	  				
  	  	  					var data 	= $.parseJSON(Crypt.decode(response));
  	  	  						options = "";
							
  	  	  					for(var iData in data){
  	  	  	  					options 	+= '<option value="'+ data[iData][0] +'">'+ data[iData][2] +'</option>';
  	  	  	  				}

  	  	  	  				$('#search_course_category select').html(options);
  	  	  				});
  	  	  			});
  	  	  		});
  	  		
            $('#myTab a').click(function (e) {
              e.preventDefault()
              $(this).tab('show')
            });

            /******** FILE UPLOAD ********/
            $('#img_course_add').click(function(){
                $('#upload_course_add').click();
            });
            $("#upload_course_add").change(function(){
                readURL({
                  elem: this,
                  preview: '#img_course_add',
                  cover: 'image'//image o background-image
                });
            });
            $('#file_upload_video_add').click(function(){
                $('#upload_file_video_add').click();
            });
            $("#upload_file_video_add").change(function(){
                readURL({
                  elem: this,
                  preview: '#file_upload_video_add',
                  cover: 'image'//image o background-image
                });
            });
            $('#file_upload_course_add').click(function(){
                $('#upload_file_course_add').click();
            });
            $("#upload_file_course_add").change(function(){
                readURL({
                  elem: this,
                  preview: '#file_upload_course_add',
                  cover: 'text'//image o background-image
                });

                $('#upload_digital_contents_add')
                    .prepend(
                        '<div class="media closing" style="background: #E3E3E3; padding: 5px 10px;">'+
                            '<div><button type="button" class="close" aria-hidden="true" onclick="delete_file(this);">&times;</button></div>'+
                            '<a class="pull-left" href="#">'+
                                '<img class="media-object" src="assets/images/file_blank_x128.png" alt="File">'+
                            '</a>'+
                            '<div class="media-body">'+
                                '<h4 class="media-heading">'+ $('#title_digital_content_add').val() +'</h4>'+
                                $('#description_digital_content_add').val() +
                            '</div>'+
                        '</div>'
                    );
            });
            $('#image_profile_click').click(function(){
                $('#upload_profile').click();
            });
            $("#upload_profile").change(function(){
                readURL({
                  elem: this,
                  preview: '#image_profile_click',
                  cover: 'image'//image o background-image
                });
            });//
            $('#image_front_click').click(function(){
                $('#upload_front').click();
            });
            $("#upload_front").change(function(){
                readURL({
                  elem: this,
                  preview: '#image_front_click',
                  cover: 'background-image'//image o background-image
                });
            });
            /******** /FILE UPLOAD ********/
            
            $('.nav-tabs-modal a')
                .click(function(event) {
                    $('.content-tabs-modal').hide();

                    $('.nav-tabs-modal li')
                        .removeClass('active');

                    $(this)
                        .parent('li')
                            .addClass('active');

                    $($(this).attr('href'))
                        .slideDown();

                    return false;
                });
            $('.nav-coach-profile a')
                .click(function(event) {
                    $('.content-tabs')
                        .hide();

                    $('.nav-coach-profile li')
                        .removeClass('active');

                    $(this)
                        .parent('li')
                            .addClass('active');

                    $($(this).attr('href'))
                        .slideDown();
                });

            if(!Modernizr.input.placeholder){
        
                $('[placeholder]')
                    .focus(function() {
                        var input = $(this);
                        if (input.val() == input.attr('placeholder')) {
                            input.val('');
                            input.removeClass('placeholder');
                        }
                    }).blur(function() {
                        var input = $(this);
                        if (input.val() == '' || input.val() == input.attr('placeholder')) {
                            input.addClass('placeholder');
                            input.val(input.attr('placeholder'));
                        }
                    }).blur();

                $('[placeholder]').parents('form').submit(function() {
                    $(this).find('[placeholder]').each(function() {
                        var input = $(this);
                        if (input.val() == input.attr('placeholder')) {
                            input.val('');
                        }
                    })
                });

            }
    	}
        addTag = function(elem){
            var _id = $(elem).parent().attr('id-data'),
                _name = $(elem).text();
			
            if ( ! _name == '' || ! _name == ' ' || ! _name == '&nbsp;') {
                $(elem)
                    .html('')
                    .focus()
                    .parent()
						.find('.content_tags')
                            .each(function(i, elem){
                                $(elem)
                                    .append(
                                        $('<span></span>')
                                            .css({
                                                'margin-right': '5px',
                                                'font-size': '14px',
                                                'font-weight': 'normal'
                                            })
                                            .addClass('label label-primary')
                                            .html(
                                                _name + ' <input type="hidden" name="'+ _id +'" class="tagInput" value="'+ _name +'" /><button type="button" class="close" aria-hidden="true" onclick="$(this).parent().fadeOut(function(){$(this).remove();});" style="float: none; color: #000; vertical-align: middle;">&times;</button>'
                                            )
                                    )

                                if( $('#inp_' + _id).val() ){
                                    $('#inp_' + _id).val(
                                        $('#inp_' + _id).val() + ', -!-' + _name + '-!-'
                                    )
                                }else{
                                    $(elem)
                                        .prepend(
                                            $('<input/>')
                                                .attr({
                                                    id: 'inp_' + _id,
                                                    name: _id,
                                                    type: 'text'
                                                })
                                                .val('-!-' + _name + '-!-')
                                        );
                                }
                            });
                
            }else $(elem).html('&nbsp;');
        };
        $(function(){
        });
    </script>