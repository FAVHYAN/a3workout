<?php

$additional_header_info = '<style type="text/css">#gc_page_title {text-align:center;}</style>';
include('header.php'); 

$first    = array('id'=>'bill_firstname', 'class'=>'span3', 'name'=>'firstname', 'value'=> set_value('firstname'));
$last   = array('id'=>'bill_lastname', 'class'=>'span3', 'name'=>'lastname', 'value'=> set_value('lastname'));
$email    = array('id'=>'bill_email', 'class'=>'span3', 'name'=>'email', 'value'=>set_value('email'));
$phone    = array('id'=>'bill_phone', 'class'=>'span3', 'name'=>'phone', 'value'=> set_value('phone'));
//campos adicionales
$address  = array('id'=>'bill_address', 'class'=>'span3', 'name'=>'address', 'value'=> set_value('address'));
$city   = array('id'=>'bill_city', 'class'=>'span3', 'name'=>'city', 'value'=> set_value('city'));

$opciones_genders = array(  '1' => 'Male', '0' => 'Female' );
$gender= 'id="gender" class="span3"';
?>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
</script>

<div class="row" style="margin-top:50px;">
    <div class="span6 offset2">
        <div class="page-header">
                <h1>Trainers</h1>
        </div>
        <?php echo form_open('secure/register'); ?>
                <input type="hidden" name="submitted" value="submitted" />
                
                <fieldset>
                        <div class="row"> 
                                <div class="span3">
                                        <label for="account_firstname"><?php echo lang('account_firstname');?></label>
                                        <?php echo form_input($first);?>
                                </div>

                                <div class="span3">
                                        <label for="account_lastname"><?php echo lang('account_lastname');?></label>
                                        <?php echo form_input($last);?>
                                </div>
                        </div> 
                        <input type="submit" value="Next Step" class="btn btn-primary" />
                </fieldset>
        </form>

        <div style="text-align:center;">
                <a href="<?php echo site_url('secure/login'); ?>"><?php echo lang('go_to_login');?></a>
        </div>
    </div>
</div>
<?php include('footer.php');