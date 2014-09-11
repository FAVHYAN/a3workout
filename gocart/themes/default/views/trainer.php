<?php
$message_info   = $this->session->flashdata('message_info');
$message_error  = $this->session->flashdata('message_error');
?>

<?php if(validation_errors()){ ?>
<div class="alert alert-danger">
    <?php echo validation_errors(); ?>
</div>
<?php } ?>
<?php if($message_info){ ?>
<div class="alert alert-info">
    <?php echo $message_info; ?>
</div>
<?php } ?>
<?php if($message_error){ ?>
<div class="alert alert-danger">
    <?php echo $message_error; ?>
</div>
<?php } ?>
<div class="header-coach-image-inside header-profile" style="background-image: url(<?php echo base_url("assets/images/uploads/".$user_logged[0]->front );?>);"></div>
        <div class="jumbotron zero-margin content-shadow effect-load fadein" style="z-index: 5;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="well box-profile" align="center">
                            <img src="<?php echo base_url("assets/images/uploads/".$user_logged[0]->photo );?>" alt="coach-image" class="img-circle img-responsive border-image-profile">
                            <h3 class="text-bold" title="<?php echo strtoupper($user_logged[0]->first_name);?> <?php echo strtoupper($user_logged[0]->last_name);?>"><?php echo substr(strtoupper($user_logged[0]->first_name), 0, 7);?>. <?php echo substr(strtoupper($user_logged[0]->last_name), 0, 7);?>.</h3>
                            <p class="text-md-small" title="<?php echo ucwords($user_logged[0]->quote);?>"><span class="glyphicon glyphicon-heart text-primary"></span> <?php echo substr(ucwords($user_logged[0]->quote), 0, 46);?></p>
                            <p class="text-md-small"><span class="glyphicon glyphicon-globe text-primary"></span> <?php echo get_row_by_id("cities", $user_logged[0]->city_id)[0]->name;?> - <?php echo get_row_by_id("cities", $user_logged[0]->city_id)[0]->district;?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
						<?php if( ! isset($view_profile)){?>
                        <h5 align="right"><a data-toggle="modal" href="#modal_edit_profile" class="label label-default">Edit Profile</a></h5>
						<?php }?>
						
                        <p align="justify" class="text-md-small">
                            <strong>Experiences:</strong> <?php echo substr($user_logged[0]->experiences, 0, 44);?><br>
                            <strong>Education:</strong> <?php echo substr($user_logged[0]->education, 0, 46);?>
                        </p>
                        <p align="justify" class="text-md-small">
                            <?php echo $user_logged[0]->bio;?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="jumbotron zero-margin content-shadow effect-load slide" style="z-index: 4; padding: 1%; padding-bottom: 5%;">
            <div class="container" style="padding-bottom: 2%; padding-top: 2%;">

                <ul class="nav nav-pills nav-stacked all-text-medium nav-coach-profile pull-left" id="myTab">
                    <li class="active">
                        <a href="#class_schedule">
                            <span class="glyphicon glyphicon-calendar"></span>
                            <span class="text-bold" style="font-size: 14px;"> &nbsp; COURSE SCHEDULE</span>
                        </a>
                    </li>
                    <li>
                        <a href="#videos">
                            <span class="glyphicon glyphicon-facetime-video"></span>
                            <span class="text-bold" style="font-size: 14px;"> &nbsp; VIDEOS</span>
                        </a>
                    </li>
					<?php if( ! isset($view_profile)){?>
                    <li>
                        <a href="#send_message">
                            <span class="glyphicon glyphicon-envelope"></span>
                            <span class="text-bold" style="font-size: 14px;"> &nbsp; SEND A MESSAGE</span>
                        </a>
                    </li>
					<?php }?>
                </ul>

                <div class="tab-content" style="overflow: hidden;">
                    <div class="tab-pane active" id="class_schedule">
						<?php if( ! isset($view_profile)){?>
                        <h5 align="right">
                            <a data-toggle="modal" href="#modal_add_course" class="label label-primary">Add Course</a>
                        </h5>
						<?php }?>
                        <h3 align="center"><strong>COURSE SCHEDULE</strong></h3>

                        <?php foreach ($courses as $course) { ?>
                        <div class="jumbotron zero-margin content-shadow effect-load slide" style="z-index: 0;padding: 0;">
                            <div class="container">
                                <h5 align="right">
                                    <a data-toggle="modal" href="#modal_add_course" class="label label-default">Edit Course</a>
                                </h5>
                                <h4 class="a3w-text-color text-bold"><?php echo $course->name;?></h4>
                                <h5 class="header-underline text-bold">30 minutes blasting friday workout</h5>
                                <p>
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                        <img class="media-object" src="<?php echo base_url('assets/images/uploads/'. $course->photo);?>" alt="Trainer" height="70">
                                        </a>
                                        <div class="media-body text-md-small line-height">
                                            <?php echo $course->description;?>
                                        </div>
                                    </div>
                                    <span class="break small-height"></span>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="well">
                                                <h5 class="text-bold">Activity Schedule</h5>
                                                <ul class="nav nav-pills nav-stacked text-md-small">
                                                    <li class="active">
                                                        <a href="#">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                            &nbsp; Tuesday - October 22/2013
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                            &nbsp; Wednesday - October 23..
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                            &nbsp; Thursday - October 24/2013
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="glyphicon glyphicon-list-alt"></span>
                                                            &nbsp; Request Time
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php
                                            $open_date      = explode(' ', $course->open_date);
                                            $open_date_exp  = explode('-', $open_date[0]);
                                            $open_time_exp  = explode(':', $open_date[1]);
                                        ?>
                                        <div class="col-md-6">
                                            <div class="well line-height text-medium" align="center">
                                                <span class="glyphicon glyphicon-calendar"></span> <b><?php echo get_day_name($open_date_exp[2]."-".$open_date_exp[1]."-".$open_date_exp[0]); ?> - <?php echo get_month_name($open_date_exp[1]);?> <?php echo $open_date_exp[2];?>/<?php echo $open_date_exp[0];?></b>
                                                <br>
                                                <span class="glyphicon glyphicon-time"></span> 5:30pm - 6:30pm COT
                                                <br><br>
                                                <b>USD $<?php echo $course->price;?></b>
                                                <h6><b><?php echo $course->quantity;?> Places available</b></h6>
                                                <button class="btn btn-primary btn-lg">BUY PACKAGE</button>
                                            </div>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                        <?php }?>

                    </div>
                    <div class="tab-pane" id="videos">
                        <h3 align="center"><strong>UPLOAD VIDEO</strong></h3>
                        <form role="form">
                            <div align="center" class="media">
                                <span class="pull-left">
                                    <img class="img-circle" id="file_upload_video_add" src="<?php echo base_url("assets/images/cloud_upload.png");?>" alt="Upload" style="background: #E5E5E5; padding: 1em; cursor: pointer;">
                                    <input type="file" style="display:none;" id="upload_file_video_add" />
                                </span>
                                <div class="media-body" align="left">
                                    <div class="form-group">
                                        <label for="title_digital_content_add">Title</label>
                                        <input type="text" class="form-control" id="title_digital_content_add" name="title_digital_content_add" placeholder="Enter Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="description_digital_content_add">Description</label>
                                        <textarea id="description_digital_content_add" name="description_digital_content_add" class="form-control" placeholder="Enter Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div id="result_upload_video" class="well">
                            <div class="media closing" style="background: #E3E3E3; padding: 5px 10px;">
                                <div><button type="button" class="close" onclick="delete_file(this);" aria-hidden="true">&times;</button></div>
                                <a class="pull-left">
                                    <video class="media-object" width="320" height="240" controls>
                                        <source src="movie.mp4" type="video/mp4">
                                        <source src="movie.ogg" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
                                </a>
                                <div class="media-body text-md-small">
                                    <h4 class="media-heading">Heading</h4>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, cum ipsum alias iusto nam corporis. Ipsa, placeat, cumque minima facilis atque laborum fugit aliquam assumenda est reiciendis excepturi dolores voluptatum?
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="send_message">
                        <h3 align="center"><strong>SEND A MESSAGE</strong></h3>
                        <form role="form">
                            <div align="left" class="text-md-small">
								<div class="form-group">
									<div>
										<label onclick="$('#content_tags-add_course').focus();">
											Contacts
											<span class="text-small">user@example.com</span>
										</label>
										<div class="form-control" id-data="tag-add_course" style="height:auto; overflow: auto; white-space: nowrap;">
											<span class="content_tags"></span>
											<span id="content_tags-add_course" class="input-typeahead" contenteditable style="max-width: 10px;" onblur="addTag(this);">&nbsp;</span>
										</div>
									</div>
								</div>
                                <div class="form-group">
                                    <textarea id="message_body" name="message_body" class="form-control" placeholder="Body" rows="6"></textarea>
                                </div>
                                <div class="form-group" align="right">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>

                <script>
                $(function () {
                    $('#myTab a').click(function (e) {
                      e.preventDefault()
                      $(this).tab('show')
                    });
                })
                </script>
            </div>
        </div>

    <!-- Modal Edit Profile -->
    <div class="modal fade" id="modal_edit_profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title">Edit Profile</h4>

                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs nav-tabs-modal">
                        <li class="active"><a href="#body_edit_profile">Profile</a></li>
                        <li><a href="#body_edit_info">Info</a></li>
                        <li><a href="#body_edit_training_experinces">Training Experinces</a></li>
                        <li><a href="#body_edit_secure">Secure</a></li>
                    </ul>
                    <?php echo form_open_multipart('profile/save/'. $user_logged[0]->id, 'role="form"');?>
                        <div id="body_edit_profile" class="well content-tabs-modal" style="background-color: transparent; border: none;">
                            <div class="row">
                                <div class="col-md-4" align="center">
                                    <img id="image_profile_click" src="<?php echo base_url("assets/images/uploads/". $user_logged[0]->photo);?>" alt="Trainer Photo" class="img-circle img-responsive edit-photo-responsive grises tester" style="cursor: pointer;">
                                    <input type="file" style="visibility:hidden;" name="upload_profile" id="upload_profile" />
                                </div>
                                <div class="col-md-8" align="center">
                                    <div id="image_front_click" class="header-coach-image-inside header-profile grises" style="background-image: url(<?php echo base_url("assets/images/uploads/". $user_logged[0]->front);?>); height: 137px; cursor: pointer;"></div>
                                    <input type="file" style="visibility:hidden;" name="upload_front" id="upload_front" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="quote">Coute Inspirational</label>
                                <input type="text" class="form-control" name="quote" id="quote" value="<?php echo $user_logged[0]->quote;?>" placeholder="Enter quote Inspirational">
                            </div>
                            <div class="form-group">
                                <label for="bio">Biography</label>
                                <textarea name="bio" id="bio" class="form-control" placeholder="Enter biography"><?php echo $user_logged[0]->bio;?></textarea>
                            </div>
                        </div>

                        <div id="body_edit_info" class="well content-tabs-modal" style="background-color: transparent; border: none; display:none;">
                            <div class="form-group" align="center">
                                <div>
                                    <img src="<?php echo base_url("assets/images/man.png");?>" onclick="$('#gender').val(<?php echo get_row_where("genders", array("abbr"=>"male"))[0]->id;?>); $('.genders').addClass('grises-default'); $(this).removeClass('grises-default');" class="<?php echo (get_row_where("genders", array("abbr"=>"male"))[0]->id == $user_logged[0]->gender_id) ? "" : "grises-default";?> pointer genders" title="Male">
                                    <img src="<?php echo base_url("assets/images/woman.png");?>" onclick="$('#gender').val(<?php echo get_row_where("genders", array("abbr"=>"female"))[0]->id;?>); $('.genders').addClass('grises-default'); $(this).removeClass('grises-default');" class="<?php echo (get_row_where("genders", array("abbr"=>"female"))[0]->id == $user_logged[0]->gender_id) ? "" : "grises-default";?> pointer genders" title="Female">
                                    <input name="gender" id="gender" type="hidden" value="<?php echo $user_logged[0]->gender_id;?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $user_logged[0]->email;?>" placeholder="Enter E-mail" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">User Name</label>
                                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $user_logged[0]->user_name;?>" placeholder="Enter User Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $user_logged[0]->first_name;?>" placeholder="Enter First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $user_logged[0]->last_name;?>" placeholder="Enter Last Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="birthday">Birthday</label>
                                        <div class='input-group date' id='birthday'>
                                            <input type='text' class="form-control" name='birthday' value="<?php echo $user_logged[0]->birthday;?>" />
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                        <script type="text/javascript">
                                            $(function () {
                                                $('#birthday').datetimepicker({
                                                    pickTime: false,
                                                    format: "yyyy-MM-dd"
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="f_country_id">Country</label>
                                        <select name="country_id" id="f_country_id" class="form-control">
                                            <option value="223">United States</option>
                                            <option value="38">Canada</option>
                                            <option value="222">United Kingdom</option>
                                            <option value="1">Afghanistan</option>
                                            <option value="2">Albania</option>
                                            <option value="3">Algeria</option>
                                            <option value="4">American Samoa</option>
                                            <option value="5">Andorra</option>
                                            <option value="6">Angola</option>
                                            <option value="7">Anguilla</option>
                                            <option value="8">Antarctica</option>
                                            <option value="9">Antigua and Barbuda</option>
                                            <option value="10">Argentina</option>
                                            <option value="11">Armenia</option>
                                            <option value="12">Aruba</option>
                                            <option value="13">Australia</option>
                                            <option value="14">Austria</option>
                                            <option value="15">Azerbaijan</option>
                                            <option value="16">Bahamas</option>
                                            <option value="17">Bahrain</option>
                                            <option value="18">Bangladesh</option>
                                            <option value="19">Barbados</option>
                                            <option value="20">Belarus</option>
                                            <option value="21">Belgium</option>
                                            <option value="22">Belize</option>
                                            <option value="23">Benin</option>
                                            <option value="24">Bermuda</option>
                                            <option value="25">Bhutan</option>
                                            <option value="26">Bolivia</option>
                                            <option value="27">Bosnia and Herzegowina</option>
                                            <option value="28">Botswana</option>
                                            <option value="29">Bouvet Island</option>
                                            <option value="30">Brazil</option>
                                            <option value="31">British Indian Ocean Territory</option>
                                            <option value="32">Brunei Darussalam</option>
                                            <option value="33">Bulgaria</option>
                                            <option value="34">Burkina Faso</option>
                                            <option value="35">Burundi</option>
                                            <option value="36">Cambodia</option>
                                            <option value="37">Cameroon</option>
                                            <option value="39">Cape Verde</option>
                                            <option value="40">Cayman Islands</option>
                                            <option value="41">Central African Republic</option>
                                            <option value="42">Chad</option>
                                            <option value="43">Chile</option>
                                            <option value="44">China</option>
                                            <option value="45">Christmas Island</option>
                                            <option value="46">Cocos (Keeling) Islands</option>
                                            <option value="47">Colombia</option>
                                            <option value="48">Comoros</option>
                                            <option value="49">Congo</option>
                                            <option value="50">Cook Islands</option>
                                            <option value="51">Costa Rica</option>
                                            <option value="52">Cote D'Ivoire</option>
                                            <option value="53">Croatia</option>
                                            <option value="54">Cuba</option>
                                            <option value="55">Cyprus</option>
                                            <option value="56">Czech Republic</option>
                                            <option value="57">Denmark</option>
                                            <option value="58">Djibouti</option>
                                            <option value="59">Dominica</option>
                                            <option value="60">Dominican Republic</option>
                                            <option value="61">East Timor</option>
                                            <option value="62">Ecuador</option>
                                            <option value="63">Egypt</option>
                                            <option value="64">El Salvador</option>
                                            <option value="65">Equatorial Guinea</option>
                                            <option value="66">Eritrea</option>
                                            <option value="67">Estonia</option>
                                            <option value="68">Ethiopia</option>
                                            <option value="69">Falkland Islands (Malvinas)</option>
                                            <option value="70">Faroe Islands</option>
                                            <option value="71">Fiji</option>
                                            <option value="72">Finland</option>
                                            <option value="73">France</option>
                                            <option value="74">France, Metropolitan</option>
                                            <option value="75">French Guiana</option>
                                            <option value="76">French Polynesia</option>
                                            <option value="77">French Southern Territories</option>
                                            <option value="78">Gabon</option>
                                            <option value="79">Gambia</option>
                                            <option value="80">Georgia</option>
                                            <option value="81">Germany</option>
                                            <option value="82">Ghana</option>
                                            <option value="83">Gibraltar</option>
                                            <option value="84">Greece</option>
                                            <option value="85">Greenland</option>
                                            <option value="86">Grenada</option>
                                            <option value="87">Guadeloupe</option>
                                            <option value="88">Guam</option>
                                            <option value="89">Guatemala</option>
                                            <option value="90">Guinea</option>
                                            <option value="91">Guinea-bissau</option>
                                            <option value="92">Guyana</option>
                                            <option value="93">Haiti</option>
                                            <option value="94">Heard and Mc Donald Islands</option>
                                            <option value="95">Honduras</option>
                                            <option value="96">Hong Kong</option>
                                            <option value="97">Hungary</option>
                                            <option value="98">Iceland</option>
                                            <option value="99">India</option>
                                            <option value="100">Indonesia</option>
                                            <option value="101">Iran (Islamic Republic of)</option>
                                            <option value="102">Iraq</option>
                                            <option value="103">Ireland</option>
                                            <option value="104">Israel</option>
                                            <option value="105">Italy</option>
                                            <option value="106">Jamaica</option>
                                            <option value="107">Japan</option>
                                            <option value="108">Jordan</option>
                                            <option value="109">Kazakhstan</option>
                                            <option value="110">Kenya</option>
                                            <option value="111">Kiribati</option>
                                            <option value="112">North Korea</option>
                                            <option value="113">Korea, Republic of</option>
                                            <option value="114">Kuwait</option>
                                            <option value="115">Kyrgyzstan</option>
                                            <option value="116">Lao People's Democratic Republic</option>
                                            <option value="117">Latvia</option>
                                            <option value="118">Lebanon</option>
                                            <option value="119">Lesotho</option>
                                            <option value="120">Liberia</option>
                                            <option value="121">Libyan Arab Jamahiriya</option>
                                            <option value="122">Liechtenstein</option>
                                            <option value="123">Lithuania</option>
                                            <option value="124">Luxembourg</option>
                                            <option value="125">Macau</option>
                                            <option value="126">Macedonia</option>
                                            <option value="127">Madagascar</option>
                                            <option value="128">Malawi</option>
                                            <option value="129">Malaysia</option>
                                            <option value="130">Maldives</option>
                                            <option value="131">Mali</option>
                                            <option value="132">Malta</option>
                                            <option value="133">Marshall Islands</option>
                                            <option value="134">Martinique</option>
                                            <option value="135">Mauritania</option>
                                            <option value="136">Mauritius</option>
                                            <option value="137">Mayotte</option>
                                            <option value="138">Mexico</option>
                                            <option value="139">Micronesia, Federated States of</option>
                                            <option value="140">Moldova, Republic of</option>
                                            <option value="141">Monaco</option>
                                            <option value="142">Mongolia</option>
                                            <option value="143">Montserrat</option>
                                            <option value="144">Morocco</option>
                                            <option value="145">Mozambique</option>
                                            <option value="146">Myanmar</option>
                                            <option value="147">Namibia</option>
                                            <option value="148">Nauru</option>
                                            <option value="149">Nepal</option>
                                            <option value="150">Netherlands</option>
                                            <option value="151">Netherlands Antilles</option>
                                            <option value="152">New Caledonia</option>
                                            <option value="153">New Zealand</option>
                                            <option value="154">Nicaragua</option>
                                            <option value="155">Niger</option>
                                            <option value="156">Nigeria</option>
                                            <option value="157">Niue</option>
                                            <option value="158">Norfolk Island</option>
                                            <option value="159">Northern Mariana Islands</option>
                                            <option value="160">Norway</option>
                                            <option value="161">Oman</option>
                                            <option value="162">Pakistan</option>
                                            <option value="163">Palau</option>
                                            <option value="164">Panama</option>
                                            <option value="165">Papua New Guinea</option>
                                            <option value="166">Paraguay</option>
                                            <option value="167">Peru</option>
                                            <option value="168">Philippines</option>
                                            <option value="169">Pitcairn</option>
                                            <option value="170">Poland</option>
                                            <option value="171">Portugal</option>
                                            <option value="172">Puerto Rico</option>
                                            <option value="173">Qatar</option>
                                            <option value="174">Reunion</option>
                                            <option value="175">Romania</option>
                                            <option value="176">Russian Federation</option>
                                            <option value="177">Rwanda</option>
                                            <option value="178">Saint Kitts and Nevis</option>
                                            <option value="179">Saint Lucia</option>
                                            <option value="180">Saint Vincent and the Grenadines</option>
                                            <option value="181">Samoa</option>
                                            <option value="182">San Marino</option>
                                            <option value="183">Sao Tome and Principe</option>
                                            <option value="184">Saudi Arabia</option>
                                            <option value="185">Senegal</option>
                                            <option value="186">Seychelles</option>
                                            <option value="187">Sierra Leone</option>
                                            <option value="188">Singapore</option>
                                            <option value="189">Slovak Republic</option>
                                            <option value="190">Slovenia</option>
                                            <option value="191">Solomon Islands</option>
                                            <option value="192">Somalia</option>
                                            <option value="193">South Africa</option>
                                            <option value="194">South Georgia &amp; South Sandwich Islands</option>
                                            <option value="195">Spain</option>
                                            <option value="196">Sri Lanka</option>
                                            <option value="197">St. Helena</option>
                                            <option value="198">St. Pierre and Miquelon</option>
                                            <option value="199">Sudan</option>
                                            <option value="200">Suriname</option>
                                            <option value="201">Svalbard and Jan Mayen Islands</option>
                                            <option value="202">Swaziland</option>
                                            <option value="203">Sweden</option>
                                            <option value="204">Switzerland</option>
                                            <option value="205">Syrian Arab Republic</option>
                                            <option value="206">Taiwan</option>
                                            <option value="207">Tajikistan</option>
                                            <option value="208">Tanzania, United Republic of</option>
                                            <option value="209">Thailand</option>
                                            <option value="210">Togo</option>
                                            <option value="211">Tokelau</option>
                                            <option value="212">Tonga</option>
                                            <option value="213">Trinidad and Tobago</option>
                                            <option value="214">Tunisia</option>
                                            <option value="215">Turkey</option>
                                            <option value="216">Turkmenistan</option>
                                            <option value="217">Turks and Caicos Islands</option>
                                            <option value="218">Tuvalu</option>
                                            <option value="219">Uganda</option>
                                            <option value="220">Ukraine</option>
                                            <option value="221">United Arab Emirates</option>
                                            <option value="224">United States Minor Outlying Islands</option>
                                            <option value="225">Uruguay</option>
                                            <option value="226">Uzbekistan</option>
                                            <option value="227">Vanuatu</option>
                                            <option value="228">Vatican City State (Holy See)</option>
                                            <option value="229">Venezuela</option>
                                            <option value="230">Viet Nam</option>
                                            <option value="231">Virgin Islands (British)</option>
                                            <option value="232">Virgin Islands (U.S.)</option>
                                            <option value="233">Wallis and Futuna Islands</option>
                                            <option value="234">Western Sahara</option>
                                            <option value="235">Yemen</option>
                                            <option value="236">Yugoslavia</option>
                                            <option value="237">Democratic Republic of Congo</option>
                                            <option value="238">Zambia</option>
                                            <option value="239">Zimbabwe</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" name="city" id="city" placeholder="Enter City">
                                    </div>
                                    <div class="form-group">
                                        <label for="zip">Zip Code</label>
                                        <input type="text" class="form-control" name="zip" id="zip" value="<?php echo $user_logged[0]->zip;?>" placeholder="Enter Zip Code">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $user_logged[0]->address;?>" placeholder="Enter Address">
                                    </div>
                                    <div class="form-group">
                                        <label for="cellphone">Cell Phone</label>
                                        <input type="numeric" class="form-control" name="cellphone" id="cellphone" value="<?php echo $user_logged[0]->cell_phone;?>" placeholder="Enter Cell Phone">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="body_edit_training_experinces" class="well content-tabs-modal" style="background-color: transparent; border: none; display:none;">
                            <div class="form-group">
                                <label for="experiences">Experiences</label>
                                <textarea name="experiences" id="experiences" class="form-control" placeholder="Enter Experiences"><?php echo $user_logged[0]->experiences;?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="education">Education</label>
                                <textarea name="education" id="education" class="form-control" placeholder="Enter Education"><?php echo $user_logged[0]->education;?></textarea>
                            </div>
                        </div>
                        
                        <div id="body_edit_secure" class="well content-tabs-modal" style="background-color: transparent; border: none; display:none;">
                            <div class="form-group">
                                <label for="old_password">Old Password</label>
                                <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal ADD COURSE -->
    <div class="modal fade" id="modal_add_course" tabindex="-1" role="dialog" aria-labelledby="Add Course" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Course</h4>
            </div>
            <?php echo form_open_multipart('profile/course', 'role="form"');?>
                <input type="type" name="course_id" id="course_add_id">
                <div class="modal-body">
                    <ul class="nav nav-tabs nav-tabs-modal">
                        <li class="active"><a href="#body_add_info">Info</a></li>
                        <li><a href="#body_add_digital_contents">Digital Contents</a></li>
                        <!--li><a href="#body_add_seo_information">SEO Information</a></li-->
                    </ul>

                    <div id="body_add_info" class="well content-tabs-modal" style="background-color: transparent; border: none;">

                        <div class="form-group">
                            <label for="category_add_course">Category</label>
                            <input type="text" class="form-control" id="category_add_course" name="category_add_course">
                        </div>
                        <div class="media">
                            <span class="pull-left">
                                <img class="media-object" id="img_course_add" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACDUlEQVR4Xu2Yz6/BQBDHpxoEcfTjVBVx4yjEv+/EQdwa14pTE04OBO+92WSavqoXOuFp+u1JY3d29rvfmQ9r7Xa7L8rxY0EAOAAlgB6Q4x5IaIKgACgACoACoECOFQAGgUFgEBgEBnMMAfwZAgaBQWAQGAQGgcEcK6DG4Pl8ptlsRpfLxcjYarVoOBz+knSz2dB6vU78Lkn7V8S8d8YqAa7XK83ncyoUCjQej2m5XNIPVmkwGFC73TZrypjD4fCQAK+I+ZfBVQLwZlerFXU6Her1eonreJ5HQRAQn2qj0TDukHm1Ws0Ix2O2260RrlQqpYqZtopVAoi1y+UyHY9Hk0O32w3FkI06jkO+74cC8Dh2y36/p8lkQovFgqrVqhFDEzONCCoB5OSk7qMl0Gw2w/Lo9/vmVMUBnGi0zi3Loul0SpVKJXRDmphvF0BOS049+n46nW5sHRVAXMAuiTZObcxnRVA5IN4DJHnXdU3dc+OLP/V63Vhd5haLRVM+0jg1MZ/dPI9XCZDUsbmuxc6SkGxKHCDzGJ2j0cj0A/7Mwti2fUOWR2Km2bxagHgt83sUgfcEkN4RLx0phfjvgEdi/psAaRf+lHmqEviUTWjygAC4EcKNEG6EcCOk6aJZnwsKgAKgACgACmS9k2vyBwVAAVAAFAAFNF0063NBAVAAFAAFQIGsd3JN/qBA3inwDTUHcp+19ttaAAAAAElFTkSuQmCC" alt="Course Image" style="width: 64px; height: 64px; cursor: pointer;">
                                <input type="file" style="display:none;" id="upload_course_add" name="upload_course_add" />
                            </span>
                            <div class="media-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control" placeholder="Enter Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <!--div class="form-group">
                            <div>
                                <label onclick="$('#content_tags-add_course').focus();">Tags</label>
                                <div class="form-control" id-data="tag-add_course" style="height:auto; overflow: auto; white-space: nowrap;">
                                	<span class="content_tags"></span>
                                    <span id="content_tags" class="input-typeahead" contenteditable style="max-width: 10px;" onblur="addTag(this);">&nbsp;</span>
                                </div>
                            </div>
                        </div-->

                        <div class="page-header">
                            <h1>Inventory</h1>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Package</label>
                                    &nbsp;
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default" onclick="$('#pack').val(3);">Monthly</button>
                                        <button type="button" class="btn btn-default" onclick="$('#pack').val(2);">Weekly</button>
                                        <button type="button" class="btn btn-default" onclick="$('#pack').val(1);">Daily</button>
                                        <input type="hidden" id="pack" name="pack" value="1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="open_date">Opening Date</label>
                                    <div class='input-group date' id='open_date'>
                                        <input type='text' name="open_date" class="form-control" />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                    <script type="text/javascript">
                                        $(function () {
                                            $('#open_date').datetimepicker({
                                                setStartDate: Date,
                                                format: 'yyyy-MM-dd hh:mm:ss'
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="numeric" class="form-control" id="price" name="price" value="0">
                        </div>
                        <div class="form-group">
                            <label for="places">Places</label>
                            <input type="numeric" class="form-control" id="places" name="places" value="1">
                        </div>

                    </div>

                    <div id="body_add_digital_contents" class="well content-tabs-modal" style="background-color: transparent; border: none; display:none;">
                        <div align="center" class="media">
                            <span class="pull-right">
                                <img class="img-circle" id="file_upload_course_add" src="<?php echo base_url("assets/images/cloud_upload.png");?>" alt="Upload" style="background: #E5E5E5; padding: 1em; cursor: pointer;">
                                <input type="file" style="display:none;" id="upload_file_course_add" />
                            </span>
                            <div class="media-body" align="left">
                                <div class="form-group">
                                    <label for="title_digital_content_add">Title</label>
                                    <input type="text" class="form-control" id="title_digital_content_add" name="title_digital_content_add" placeholder="Enter Title">
                                </div>

                                <div class="form-group">
                                    <label for="description_digital_content_add">Description</label>
                                    <textarea id="description_digital_content_add" name="description_digital_content_add" class="form-control" placeholder="Enter Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="upload_digital_contents_add" class="well">
                            <!--div class="media closing" style="background: #E3E3E3; padding: 5px 10px;">
                                <div><button type="button" class="close" aria-hidden="true">&times;</button></div>
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="assets/images/file_blank_x128.png" alt="File">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">Heading</h4>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, cum ipsum alias iusto nam corporis. Ipsa, placeat, cumque minima facilis atque laborum fugit aliquam assumenda est reiciendis excepturi dolores voluptatum?
                                </div>
                            </div-->
                        </div>
                    </div>

                    <!--div id="body_add_seo_information" class="well content-tabs-modal" style="background-color: transparent; border: none; display:none;">
                        <div class="form-group">
                            <label for="title_tag">Title Tag</label>
                            <input type="text" class="form-control" id="title_tag" name="title_tag" placeholder="Enter Title Tag">
                        </div>
                        <div class="form-group">
                            <label for="description">Meta Tags</label>
                            <textarea id="description" name="description" class="form-control" placeholder="ex. &lt;meta name=&quot;description&quot; content=&quot;We sell products that help you&quot; /&gt;"></textarea>
                        </div>
                    </div-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <script type="text/javascript">
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
    </script>