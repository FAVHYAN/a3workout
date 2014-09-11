<?php include('header.php'); 

$attributes['id'] = 'form';

if(validation_errors()):
?>
<div class="alert alert-danger">
	<a class="close" data-dismiss="alert">&times;</a>
	<?php echo validation_errors();?>
</div>
<?php endif; ?>
<div class="row">
  <div class="span6 offset2">
    <div class="page-header">
      <h1>FITNESS ASSESSMENT QUESTIONNAIRE</h1>
    </div>

    <fieldset>
      <?php echo form_open_multipart('secure/step2_form/' . $id, $attributes);?>
        <div class="jumbotron zero-margin content-shadow effect-load slideDown" style="z-index: 4;">
            <div class="container">
                <!--div class="span3" align="center">
                    <br /><br /><br />
                    <div>
                        <span id="photo_preview" style="padding: 3.5em 4em; background-image:url(<?php echo $this->config->item('base_url');?>assets/img/user.png); background-position: center center; background-repeat: no-repeat; background-size: auto 130px; border-radius: 6em;"></span>
                    </div>
                    <br /><br /><br />
                    <div style="width: 140px; overflow: hidden;"><input type="file" id="account_input_image" name="account_input_image"></div>
                    <br />
                </div-->
               
                <div class="row">
                    <div class="col-md-12" align="center">
                        <?php $photoUrlEditProfile = 'user.png';?>
                        <img id="image_profile_click" src="<?php echo base_url("uploads/images/full/". (($photoUrlEditProfile) ? $photoUrlEditProfile : 'user.png'));?>" alt="Trainer Photo" class="img-circle img-responsive edit-photo-responsive grises tester" style="cursor: pointer;">
                        <label class="text-medium">Profile picture</label>
                        <input type="file" style="visibility:hidden;" name="upload_profile" id="upload_profile" />
                    </div>
                </div>
                <div class="row">
                    <div style="width:80%;margin: 0 auto;">                         
                        <div class="row">  
                            <div class="col-md-12">                                
                                <label class="text-medium">Date of birth<span class="text-danger">*</span></label>
                                <div class="form-group">
                                        <div class='input-group date'>                                           
                                            <input type="text" class="form-control" style="border-radius:6px !important;margin: 0px 0px 14px 222px;width: 42%;" id="birthdate" readonly name="birthdate" placeholder="Select date of birth" >
                                        </div>
                                        <script type="text/javascript">
                                            $(function () {
                                                $('#birthdate').datetimepicker({
                                                    pickTime: false,
                                                    format: "yyyy-MM-dd"
                                                });
                                            });
                                        </script>
                                    </div>   
                            </div> 
                        </div> 
                          <div class="row">
                            <div class="col-md-12">
                                <label class="text-medium">Preferred method of contact:<span class="text-danger">*</span></label>
                                <div class="col-md-12" style="padding-left: 0px">
                                    <label>
                                      <input type="radio" name="method_of_contact" id="method_of_contact1" value="Email" checked>
                                      <label class="text-medium">Email</label>
                                    </label>
                                    &nbsp;&nbsp;
                                    <label>
                                      <input type="radio" name="method_of_contact" id="method_of_contact2" value="Tex">
                                      <label class="text-medium">Text</label>
                                    </label>
                                    &nbsp;&nbsp;
                                    <label>
                                      <input type="radio" name="method_of_contact" id="method_of_contact3" value="Call">
                                      <label class="text-medium">Call</label>
                                    </label>
                                </div> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">                                
                                <label class="text-medium">If call, what time of day</label>
                                <input type="text" class="form-control" name="method_of_contact_call_day" id="method_of_contact_call_day" >                               
                            </div> 
                        </div>

                             <div class="row">
                            <div class="col-md-12">
                                <label class="text-medium">Are you currently a member of another health club?<span class="text-danger">*</span></label>
                                <div class="col-md-12" style="padding-left: 0px">
                                    <label>
                                      <input type="radio" name="optional_question_health_club" id="optional_question_health_club1" value="Yes" checked>
                                      <label class="text-medium">Yes</label>
                                    </label>
                                    &nbsp;&nbsp;
                                    <label>
                                      <input type="radio" name="optional_question_health_club" id="optional_question_health_club2" value="No">
                                      <label class="text-medium">No</label>
                                    </label>
                                </div>
                            </div> 
                        </div>
                            <div class="row">
                            <div class="col-md-12">
                                <label class="text-medium">Have you ever used a personal trainer before?<span class="text-danger">*</span></label>
                                <div class="col-md-12" style="padding-left: 0px">
                                    <label>
                                      <input type="radio" name="optional_question_trainner_before" id="optional_question_trainner_before1" value="Yes" checked>
                                      <label class="text-medium">Yes</label>
                                    </label>
                                    &nbsp;&nbsp;
                                    <label>
                                      <input type="radio" name="optional_question_trainner_before" id="optional_question_trainner_before2" value="No">
                                      <label class="text-medium">No</label>
                                    </label>
                                </div>
                            </div>   
                        </div>

                        <div class="row">
                            <div class="col-md-12">                                
                                <label class="text-medium">What is your biggest struggle in achieving or maintaining a healthy weight or fitness level?<span class="text-danger">*</span></label>
                                 <input type="text"  class="form-control" name="question_optional3" id="question_optional3">                               
                            </div>     
                        </div>
                        <div class="row">
                            <div class="col-md-12">                                
                                <label class="text-medium">What external factors have derailed you in the past?: Time, Money, No Facility, Procrastination, Lack of
                                Support, Discipline, Accountability, Lack of Expertise, other<span class="text-danger">*</span></label>
                               <input type="text"  class="form-control" name="question_optional4" id="question_optional4">                                 
                            </div>      
                        </div>
                        <div class="row">
                            <div class="col-md-12">                                
                                <label class="text-medium">Do you have any bad health habits? ie: smoke, drink, drugs, fast food<span class="text-danger">*</span></label>
                                 <input type="text"  class="form-control" name="question_optional5" id="question_optional5" >    
                            </div> 
                        </div>  
                               


                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-medium">choose a membership?<span class="text-danger">*</span></label>
                                   <div class="col-md-12" style="padding-left: 0px">
                                    <label>
                                      <input type="radio" name="radio" id="optional_question_trainner_before1" value="1" checked>
                                      <label class="text-medium">one time membership fee</label>
                                    </label>
                                    &nbsp;&nbsp;
                                    <label>
                                      <input type="radio" name="radio" id="optional_question_trainner_before2" value="2">
                                      <label class="text-medium">Lifetime membership</label>
                                    </label>
                                </div>
                                    </div>
                                    </div> 

                        <div class="row">
                            <div class="col-md-12">                                
                                <label class="text-medium">
                                    Release and waiver of liability
                                </label><br/>
                                <div style="text-align: justify; font-size: 12px; height: 200px; overflow: auto">   
                                    <p>
                                    MEMBERS ACKNOWLEDGEMENT AND ASSUMPTION OF RISK AND FULL RELEASE FROM LIABILITY OF A3WORKOUT: 
                                    Member acknowledges that the Personal Training/Fitness Assessment herewith includes participation in strenuous physical activities, 
                                    including but not limited to, aerobic dance, weight training, interval and strength training and 
                                    various nutritional programs offered by A3Workout (the “Physical Activities”).  Member acknowledges that these 
                                    Physical Activities involve inherent risk of physical injuries or other damages, including but not limited to, heart 
                                    attacks, muscle strains, pulls or tears, broken bones, shin splints, heel prostration, knee/lower back/ foot injuries 
                                    and other illness, soreness, or injury however caused, occurring during or after the Members participation in the 
                                    Physical Activities.  Member further acknowledges that such risks include but are not limited to, injuries caused by 
                                    the negligence of an instructor or other person, defective or improperly used equipment, over exertion of a 
                                    Member, slip and fall by Member, or an unknown health problem of Member.  Member agrees to assume all risk 
                                    and responsibility involved with participation in Physical Activities.  Member acknowledges that participation will 
                                    be physically and mentally challenging, and Member agrees that it is the responsibility of the Member to seek 
                                    competent medical or other professional advice, regarding any concerns involved with the ability of the Member 
                                    to take part in A3Workout Physical Activities. By signing this Agreement, Member asserts that he or she is capable 
                                    of participating in the Physical Activities.  Member agrees to assume all risk and responsibility for not exceeding his 
                                    or her own physical limits.  Member, on behalf of Member his or her heirs, assigns and next of kin, agrees to fully 
                                    release A3Workout (as well as any of its owners, employees or other authorized agents, including independent 
                                    contractors) from any and all liability, claims and/or litigation actions that Member may have for injuries, disability 
                                    or death or other damages of any kind, including but not limited o punitive damages, arising out of participation in 
                                    A3Workout Activities, including but not limited to the Personal Training/Nutrition Programs and the Physical 
                                    Activities, even if caused by the negligence, gross negligence, intentional acts or omissions and/or any other type 
                                    of fault of A3Workout, its owners, employees or other authorized agents, including independent contractors.
                                    </p>
                                </div>
                                
                                <input type="checkbox" name="waiver" id="waiver"><label class="text-medium">&nbsp;I agree.</label>                              
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" id="btnext" onclick="buton();">Next</button> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <input type="hidden" name="account_typeuser" id="account_typeuser" value="student">
      </form>
    </fieldset>
  </div> 
</div>
<script type="text/javascript">
    $('#account_bio').wysihtml5();
</script>
<script type="text/javascript">
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
</script>

<?php include('footer.php'); ?>