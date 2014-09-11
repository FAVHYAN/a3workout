<?php include('header.php');
$GLOBALS['option_value_count']		= 0;
?>
<style type="text/css">
	.sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
	.sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; height: 18px; }
	.sortable li>span { position: absolute; margin-left: -1.3em; margin-top:.4em; }
</style>
<script type="text/javascript">

$(document).ready(function(){
	get_best_sellers();
	get_monthly_sales();
	$('input:button').button();
	$('#best_sellers_start').datepicker({ dateFormat: 'mm-dd-yy', altField: '#best_sellers_start_alt', altFormat: 'yy-mm-dd' });
	$('#best_sellers_end').datepicker({ dateFormat: 'mm-dd-yy', altField: '#best_sellers_end_alt', altFormat: 'yy-mm-dd' });
});

function get_best_sellers()
{
	show_animation();
	$.post('<?php echo site_url($this->config->item('admin_folder').'/reports/best_sellers');?>',{start:$('#best_sellers_start').val(), end:$('#best_sellers_end').val()}, function(data){
		$('#best_sellers').html(data);
		setTimeout('hide_animation()', 500);
	});
}

function get_monthly_sales()
{
	show_animation();
	$.post('<?php echo site_url($this->config->item('admin_folder').'/reports/sales');?>',{year:$('#sales_year').val()}, function(data){
		$('#sales_container').html(data);
		setTimeout('hide_animation()', 500);
	});
}

function show_animation()
{
	$('#saving_container').css('display', 'block');
	$('#saving').css('opacity', '.8');
}

function hide_animation()
{
	$('#saving_container').fadeOut();
}

</script>

<div class="row">
	<div class="span12">
		<div class="tabbable">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#product_info" data-toggle="tab">Trainers</a></li>
				<li><a href="#sales" data-toggle="tab"><?php echo lang('sales');?></a></li>
				<li><a href="#product_photos" data-toggle="tab"><?php echo lang('images');?></a></li>
				<li><a href="#product_schedule" data-toggle="tab"><?php echo lang('schedule');?></a></li>
                               <!--  <li><a href="#product_packages" data-toggle="tab">Packages</a></li> -->
			</ul>
		</div>
		<div class="tab-content">
			<div class="tab-pane active" id="product_info">

                 <div class="row">
					<div class="span8">
						<label>Report trainers</label>
						<table class="table"><tr><td>Firstname</td><td>Lastname</td><td>Email</td><td>Username</td><td>Phone</td><td>Cellphone</td><td>Address</td></tr></table>
						<?php
						$query1 = $this->db->query("SELECT * FROM customers where customers.band = '2'");

							?>
							<table  class="table table-hover">
								

							<?php
							foreach ($query1->result_array() as $key ) {
							
							echo '<tr><td>'.$key['firstname'].'</td><td>'.$key['lastname'].'</td><td>'.$key['email'].'</td><td>'.$key['username'].'</td><td>'.$key['phone'].'</td><td>'.$key['cell_phone'].'</td><td>'.$key['address'].'</td><td><a data-toggle="modal" data-id="'.$key['id'].'"  title="Add this item" class="open-AddBookDialog btn btn-primary" href="#modal_description_class" onclick="descriptionClasstudent('.$key['id'].');"><input type="hidden" name="bookId" id="bookId" value="'.$key['id'].'"/>Student\'s detail</a></td><td><a data-toggle="modal" data-id="'.$key['id'].'"  title="Add this item" class="open-AddBookDialog btn btn-warning" href="#modal_description_class" onclick="descriptionClassTrainer('.$key['id'].');"><input type="hidden" name="bookId" id="bookId" value="'.$key['id'].'"/>Trainer\'s detail</a></td></tr>';
								}
							?>
							</table>

							<script type="text/javascript">
                           

                            $(document).on("click", ".open-AddBookDialog", function () {
							     var myBookId = $(this).data('id');
							     $(".modal-body #bookId").val( myBookId );

										});

                           

                            </script>
                     

<!--modal description Student-->
<div class="modal fade" id="modal_description_class" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 60%;"> 
            <div class="modal-content" style="width:166%">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title" style="text-align:center">DESCRIPTION'S TRAINER</h4>
                     </div>


                <div class="modal-body"> 
                    <div id="description_cabecera">
                        <div class="hora">&nbsp;</div>
                    </div><br />
                    <div id="description">

      <script>
      function descriptionClasstudent(valor){
   
    $.ajax({
        type: "POST",
        url: "reports/process_description_student",
        data:{ valor: valor }, 
        success: function(response){
           var json = '';
                    var obj = $.parseJSON(response); 
                    $("#description_cabecera").empty();
                    $(".hora").empty();
                    $("#description").empty();
                    $.each(obj, function() {
                       name_student = this['firstname']+' '+this['lastname'];
                       email_student = this['email'];
                       name_course = this['course_name'];
                       contador = this['contador'];

 $("#description_cabecera").empty();
                       		
                       		$("#description_cabecera").append("<div style='text-align:center;'><span class='text-danger' style='color:red'> "+contador+"</span> Students enrolled in this class.</div><table class='table table-striped'><tr><td style='width: 163px;'>Student's name</td><td style='width: 163px;'>Class name</td><td style='width: 163px;'>Student's email</td><tr></table>");

                            $("#description").append("<table class='table'><tr><td style='width: 163px;'>"+name_student+"</td><td style='width: 163px;'>"+name_course+"</td><td style='width: 163px;'>"+email_student+"</td><tr></table>"); 

                           });  
        }
    });
  }

    function descriptionClassTrainer(valor){
   
    $.ajax({
        type: "POST",
        url: "reports/process_description_trainer",
        data:{ valor: valor }, 
        success: function(response){
           var json = '';
                    var obj = $.parseJSON(response); 
                    $("#description_cabecera").empty();
                    $(".hora").empty();
                    $("#description").empty();
                    $.each(obj, function() {
                       fecha = this['fecha'];
                       course_name = this['course_name'];
   					    var ano = fecha.slice(0,4);
   					    var mes = fecha.slice(5,7);
   					    var dia = fecha.slice(8,10);
   					    var hour = fecha.slice(10,19);
   					    var fecha = mes+'/'+dia+'/'+ano+' '+hour;
                       if(this['tipo'] == 1){
                       	type = "One on one";
                       }else{
                       	type = "Group";
                       }
                       		
                       		 $("#description_cabecera").empty();
                       		
                       		$("#description_cabecera").append("<table class='table table-striped'><tr><td style='width: 163px;'>Date's class</td><td style='width: 163px;'>Class name</td><td style='width: 163px;'>Class Type</td><tr></table>");
                       		
                            $("#description").append("<table class='table'><tr><td style='width: 163px;'>"+fecha+"</td><td style='width: 163px;'>"+course_name+"</td><td style='width: 163px;'>"+type+"</td><tr></table>"); 

                           });  
        }
    });
  }


</script>			
					</div>
                </div>
            </div>
        </div>
</div>

</div>
</div>
	</div>		
			
			<div class="tab-pane" id="sales">
				
								<div class="row">
									<div class="span2" style="text-align:center">
						<div class="row" >
	<div class="span6" style="float:right;width:0px;margin: 0px 169px 0 0;">
		<h3><?php echo lang('sales');?></h3>
	</div>
	<div class="span6" style="float: left;width: 1170px;">
		<form class="form-inline pull-right">
			<select name="year" id="sales_year">
				<?php foreach($years as $y):?>
					<option value="<?php echo $y;?>"><?php echo $y;?></option>
				<?php endforeach;?>
			</select>
			<input class="btn btn-primary" type="button" value="<?php echo lang('get_monthly_sales');?>" onclick="get_monthly_sales()"/>
		</form>
	</div>
</div>

<div class="row">
	<div class="span12" id="sales_container"></div>
</div>
						        
				</div>
			</div>	
	</div>			
			<div class="tab-pane" id="product_photos">
				<div class="row">
					<iframe id="iframe_uploader" src="<?php echo site_url($this->config->item('admin_folder').'/courses/course_image_form');?>" class="span8" style="height:75px; border:0px;"></iframe>
				</div>
				<div class="row">
					<div class="span8">
						
						<div id="gc_photos">
							
						<?php
						foreach($images as $photo_id=>$photo_obj)
						{
							if(!empty($photo_obj))
							{
								$photo = (array)$photo_obj;
								add_image($photo_id, $photo['filename'], $photo['alt'], $photo['caption'], isset($photo['primary']));
							}

						}
						?>
						</div>
					</div>
				</div>
			</div>
                       
                            <div class="tab-pane" id="product_schedule">				
				<div class="row">
					<div class="span8">
                                            <div class="row">
                                                    <div class="span2">
                                                            
                                                            <input type="hidden" name="name_course" value="<?php echo $name?>">
                                                            <label><?php echo lang('date') ?></label>
                                                            <?php
                                                            $data = array('placeholder'=>'1999-01-31', 'style'=>'text-align:center;width:90px', 'onchange' => "this.style.border='1px solid #CCCCCC'",'name'=>'date_schedule',  'class'=>'span2');
                                                            echo form_input($data);
                                                            ?>
                                                    </div>                                                    
                                                    <div class="span2">
                                                            <label><?php echo lang('places') ?></label>
                                                            <?php
                                                            $data = array('placeholder'=>lang('places'), 'name'=>'places_schedule', 'onchange' => "this.style.border='1px solid #CCCCCC'",  'class'=>'span1');
                                                            echo form_input($data);
                                                            ?>
                                                    </div>
                                            </div> 
                                            <div class="row">
                                                    <div class="span2">
                                                            <label><?php echo lang('starttime') ?></label>
                                                            <?php
                                                            $data = array('placeholder'=>'00', 'style'=>'text-align:center;width:20px','name'=>'starttime_1_schedule', 'onchange' => "this.style.border='1px solid #CCCCCC'",  'class'=>'span1');
                                                            echo form_input($data).':';
                                                            $data = array('placeholder'=>'00', 'style'=>'text-align:center;width:20px','name'=>'starttime_2_schedule', 'onchange' => "this.style.border='1px solid #CCCCCC'",  'class'=>'span1');
                                                            echo form_input($data);
                                                            ?>
                                                    </div>
                                                    <div class="span2">
                                                            <label><?php echo lang('finishtime') ?></label>
                                                            <?php
                                                            $data = array('placeholder'=>'00', 'style'=>'text-align:center;width:20px','name'=>'finishtime_1_schedule', 'onchange' => "this.style.border='1px solid #CCCCCC'",  'class'=>'span1');
                                                            echo form_input($data).':';
                                                            $data = array('placeholder'=>'00', 'style'=>'text-align:center;width:20px','name'=>'finishtime_2_schedule', 'onchange' => "this.style.border='1px solid #CCCCCC'",  'class'=>'span1');
                                                            echo form_input($data);
                                                            ?>
                                                    </div>
                                            </div> 
                                            <div class="row">
                                                    <div class="span2">
                                                            <label><?php echo lang('price') ?></label>
                                                            <?php
                                                            $data = array('placeholder'=>lang('price'), 'style'=>'text-align:right;width:90px', 'name'=>'price_schedule', 'onchange' => "this.style.border='1px solid #CCCCCC'",  'class'=>'span2');
                                                            echo form_input($data);
                                                            ?>
                                                    </div>
                                                    <div class="span2">
                                                            <label><?php echo lang('saleprice') ?></label>
                                                            <?php
                                                            $data = array('placeholder'=>lang('saleprice'), 'style'=>'text-align:right;width:90px', 'name'=>'saleprice_schedule', 'onchange' => "this.style.border='1px solid #CCCCCC'",  'class'=>'span2');
                                                            echo form_input($data);
                                                            ?>
                                                    </div>
                                            </div> 
                                            <div class="row">
                                                    <div class="span8">
                                                            <button type="button" onclick="save_schedule_admin()" class="btn btn-primary"><?php echo lang('upload');?></button>
                                                    </div>
                                            </div> 
                                            
					</div>
                                </div>
                                <br /><br /><br />
                                <div class="span7">
                                        <table class="table table-striped" style="margin-left: 50px !important; width: 100% !important;">
                                            <thead>
                                                    <tr>
                                                            <th><?php echo lang('date')?></th>
                                                            <th><?php echo lang('places')?></th>
                                                            <th><?php echo lang('starttime')?></th>
                                                            <th><?php echo lang('finishtime')?></th>
                                                            <th><?php echo lang('price')?></th>
                                                            <th><?php echo lang('saleprice')?></th>
                                                            <th></th>
                                                    </tr>
                                            </thead>
                                            <tbody id="list_schedule">      
                                            <?php foreach($schedule as $she){  ?>
                                                    <tr id="tr_list_schedule<?php echo $she->id?>">
                                                        <td><?php echo form_decode($she->date);?></td>
                                                        <td><?php echo form_decode($she->quantity);?></td>
                                                        <td><?php echo form_decode($she->start_time);?></td>
                                                        <td><?php echo form_decode($she->finish_time);?></td>
                                                        <td><?php echo form_decode($she->price);?></td>
                                                        <td><?php echo form_decode($she->saleprice);?></td>
                                                        <td><a class="btn btn-danger" onclick="delete_schedule_admin(<?php echo $she->id?>);"><i class="icon-trash icon-white"></i> <?php echo lang('delete');?></a></td>
                                                    </tr>    
                                            <?php } ?>
                                            </tbody>
                                        </table>    
                                </div>  
                            </div>
                            <div class="tab-pane span9" id="product_packages">				
				<!-- <div class="row">
                                    <div class="span8">
                                        <div class="panel panel-primary" style="border-color: #B7B8B9;">
                                            <div class="panel-heading" style="background-color: #DDDDDD;border-color: #B7B8B9;color:#0088cc;font-weight: normal">
                                              <h3 class="panel-title">New package</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <div class="span9">
                                                            <div class="span2" style="width:12%">
                                                                <label>Time</label>
                                                            </div>
                                                            <div class="span7">
                                                                <select name="time_package" id="time_package">
                                                                    <option value="3">3 Months</option>
                                                                    <option value="6">6 Months</option>
                                                                    <option value="12">1 Year</option>
                                                                </select>
                                                            </div>
                                                        </div>    
                                                    </div> 
                                                    <div class="row">
                                                        <div class="span9">
                                                            <div class="span2" style="width:12%">
                                                                <label>Weekly session</label>
                                                            </div>
                                                            <div class="span7">
                                                              <input type="text" name="weekly_session" id="weekly_session" onchange="this.style.border='1px solid #CCCCCC'">
                                                            </div>
                                                        </div>    
                                                    </div>
                                                    <div class="row">
                                                        <div class="span9">
                                                            <div class="span2" style="width:12%">
                                                                <label>Price per month</label>
                                                            </div>
                                                            <div class="span7">
                                                              <input type="text" name="price_per_month" id="price_per_month" onchange="this.style.border='1px solid #CCCCCC'">
                                                            </div>
                                                        </div>    
                                                    </div>
                                                    <div class="row">
                                                        <div class="span9">
                                                            <div class="span2" style="width:12%">
                                                                <label>Total session</label>
                                                            </div>
                                                            <div class="span7">
                                                              11
                                                            </div>
                                                        </div>    
                                                    </div>
                                                    <div class="row">
                                                        <div class="span9">
                                                            <div class="span2" style="width:12%">
                                                                <label>Total Price</label>
                                                            </div>
                                                            <div class="span7">
                                                              00
                                                            </div>
                                                        </div>    
                                                    </div>                                                    
                                                    <div class="row">
                                                        <div class="span9">
                                                            <div class="span2" style="width:12%">
                                                                <label>Description</label>
                                                            </div>
                                                            <div class="span7">
                                                                <textarea name="description1" id="description1"></textarea>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                           
                                        <div class="row">
                                            <div class="span8">
                                                <button type="button" onclick="save_packages_admin()" class="btn btn-primary"><?php echo lang('upload');?></button>
                                            </div>
                                        </div>                                             
                                    </div>
                                </div> -->
                                <br /><br /><br />
                                <div class="row">
                                        <table class="table table-striped" style="margin-left: 50px !important; width: 100% !important;">
                                            <thead>
                                                <tr>
                                                    <th style="width:10%">Time</th>
                                                    <th style="width:15%">Weekly session</th>
                                                    <th style="width:15%">Price per month</th>
                                                    <th style="width:45%">Description</th>
                                                    <th style="width:15%"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="list_packages">      
                                            <?php foreach($schedule as $pkg){  ?>
                                                    <tr id="tr_list_schedule<?php echo $pkg->id?>">
                                                        <td><?php echo form_decode($pkg->type_package)." Months";?></td>
                                                        <td><?php echo form_decode($pkg->weekly_session);?></td>
                                                        <td><?php echo form_decode($pkg->price);?></td>
                                                        <td><?php echo form_decode($pkg->description1);?></td>
                                                         
                                                    </tr>    
                                            <?php } ?>
                                            </tbody>
                                        </table>    
                                </div>  
                            </div>
		</div>			
	</div>
</div>




<?php
function add_image($photo_id, $filename, $alt, $caption, $primary=false)
{

	ob_start();
	?>
	<div class="row gc_photo" id="gc_photo_<?php echo $photo_id;?>" style="background-color:#fff; border-bottom:1px solid #ddd; padding-bottom:20px; margin-bottom:20px;">
		<div class="span2">
			<input type="hidden" name="images[<?php echo $photo_id;?>][filename]" value="<?php echo $filename;?>"/>
			<img class="gc_thumbnail" src="<?php echo base_url('uploads/images/thumbnails/'.$filename);?>" style="padding:5px; border:1px solid #ddd"/>
		</div>
		<div class="span6">
			<div class="row">
				<div class="span2">
					<input name="images[<?php echo $photo_id;?>][alt]" value="<?php echo $alt;?>" class="span2" placeholder="<?php echo lang('alt_tag');?>"/>
				</div>
				<div class="span2">
					<input type="radio" name="primary_image" value="<?php echo $photo_id;?>" <?php if($primary) echo 'checked="checked"';?>/> <?php echo lang('primary');?>
				</div>
				<div class="span2">
					<a onclick="return remove_image($(this));" rel="<?php echo $photo_id;?>" class="btn btn-danger" style="float:right; font-size:9px;"><i class="icon-trash icon-white"></i> <?php echo lang('remove');?></a>
				</div>
			</div>
			<div class="row">
				<div class="span6">
					<label><?php echo lang('caption');?></label>
					<textarea name="images[<?php echo $photo_id;?>][caption]" class="span6" rows="3"><?php echo $caption;?></textarea>
				</div>
			</div>
		</div>
	</div>

	<?php
	$stuff = ob_get_contents();

	ob_end_clean();
	
	echo replace_newline($stuff);
}


function add_option($po, $count)
{
	ob_start();
	?>
	<tr id="option-<?php echo $count;?>">
		<td>
			<a class="handle btn btn-mini"><i class="icon-align-justify"></i></a>
			<strong><a class="option_title" href="#option-form-<?php echo $count;?>"><?php echo $po->type;?> <?php echo (!empty($po->name))?' : '.$po->name:'';?></a></strong>
			<button type="button" class="btn btn-mini btn-danger pull-right" onclick="remove_option(<?php echo $count ?>);"><i class="icon-trash icon-white"></i></button>
			<input type="hidden" name="option[<?php echo $count;?>][type]" value="<?php echo $po->type;?>" />
			<div class="option-form" id="option-form-<?php echo $count;?>">
				<div class="row-fluid">
				
					<div class="span10">
						<input type="text" class="span10" placeholder="<?php echo lang('option_name');?>" name="option[<?php echo $count;?>][name]" value="<?php echo $po->name;?>"/>
					</div>
					
					<div class="span2" style="text-align:right;">
						<input class="checkbox" type="checkbox" name="option[<?php echo $count;?>][required]" value="1" <?php echo ($po->required)?'checked="checked"':'';?>/> <?php echo lang('required');?>
					</div>
				</div>
				<?php if($po->type!='textarea' && $po->type!='textfield'):?>
				<div class="row-fluid">
					<div class="span12">
						<a class="btn" onclick="add_option_value(<?php echo $count;?>);"><?php echo lang('add_item');?></a>
					</div>
				</div>
				<?php endif;?>
				<div style="margin-top:10px;">

					<div class="row-fluid">
						<?php if($po->type!='textarea' && $po->type!='textfield'):?>
						<div class="span1">&nbsp;</div>
						<?php endif;?>
						<div class="span3"><strong>&nbsp;&nbsp;<?php echo lang('name');?></strong></div>
						<div class="span2"><strong>&nbsp;<?php echo lang('value');?></strong></div>
						<div class="span2"><strong>&nbsp;<?php echo lang('weight');?></strong></div>
						<div class="span2"><strong>&nbsp;<?php echo lang('price');?></strong></div>
						<div class="span2"><strong>&nbsp;<?php echo ($po->type=='textfield')?lang('limit'):'';?></strong></div>
					</div>
					<div class="option-items" id="option-items-<?php echo $count;?>">
					<?php if($po->values):?>
						<?php
						foreach($po->values as $value)
						{
							$value = (object)$value;
							add_option_value($po, $count, $GLOBALS['option_value_count'], $value);
							$GLOBALS['option_value_count']++;
						}?>
					<?php endif;?>
					</div>
				</div>
			</div>
		</td>
	</tr>
	
	<?php
	$stuff = ob_get_contents();

	ob_end_clean();
	
	echo replace_newline($stuff);
}

function add_option_value($po, $count, $valcount, $value)
{
	ob_start();
	?>
	<div class="option-values-form">
		<div class="row-fluid">
			<?php if($po->type!='textarea' && $po->type!='textfield'):?><div class="span1"><a class="handle btn btn-mini" style="float:left;"><i class="icon-align-justify"></i></a></div><?php endif;?>
			<div class="span3"><input type="text" class="span12" name="option[<?php echo $count;?>][values][<?php echo $valcount ?>][name]" value="<?php echo $value->name ?>" /></div>
			<div class="span2"><input type="text" class="span12" name="option[<?php echo $count;?>][values][<?php echo $valcount ?>][value]" value="<?php echo $value->value ?>" /></div>
			<div class="span2"><input type="text" class="span12" name="option[<?php echo $count;?>][values][<?php echo $valcount ?>][weight]" value="<?php echo $value->weight ?>" /></div>
			<div class="span2"><input type="text" class="span12" name="option[<?php echo $count;?>][values][<?php echo $valcount ?>][price]" value="<?php echo $value->price ?>" /></div>
			<div class="span2">
			<?php if($po->type=='textfield'):?><input class="span12" type="text" name="option[<?php echo $count;?>][values][<?php echo $valcount ?>][limit]" value="<?php echo $value->limit ?>" />
			<?php elseif($po->type!='textarea' && $po->type!='textfield'):?>
				<a class="delete-option-value btn btn-danger btn-mini pull-right"><i class="icon-trash icon-white"></i></a>
			<?php endif;?>
			</div>
		</div>
	</div>
	<?php
	$stuff = ob_get_contents();

	ob_end_clean();

	echo replace_newline($stuff);
}
//this makes it easy to use the same code for initial generation of the form as well as javascript additions
function replace_newline($string) {
  return trim((string)str_replace(array("\r", "\r\n", "\n", "\t"), ' ', $string));
}
?>
<script type="text/javascript">
//<![CDATA[
var option_count = <?php echo $counter?>;
var option_value_count = <?php echo $GLOBALS['option_value_count'];?>

function add_related_product()
{
	//if the related product is not already a related product, add it
	if($('#related_product_'+$('#product_list').val()).length == 0 && $('#product_list').val() != null)
	{
		<?php $new_item	 = str_replace(array("\n", "\t", "\r"),'',related_items("'+$('#product_list').val()+'", "'+$('#product_item_'+$('#product_list').val()).html()+'"));?>
		var related_product = '<?php echo $new_item;?>';
		$('#product_items_container').append(related_product);
		run_category_query();
	}
	else
	{
		if($('#product_list').val() == null)
		{
			alert('<?php echo lang('alert_select_product');?>');
		}
		else
		{
			alert('<?php echo lang('alert_product_related');?>');
		}
	}
}

function add_category()
{
	//if the related product is not already a related product, add it
	if($('#categories_'+$('#category_list').val()).length == 0 && $('#category_list').val() != null)
	{
		<?php $new_item	 = str_replace(array("\n", "\t", "\r"),'',category("'+$('#category_list').val()+'", "'+$('#category_item_'+$('#category_list').val()).html()+'"));?>
		var category = '<?php echo $new_item;?>';
		$('#categories_container').append(category);
		run_category_query();
	}
}


function remove_related_product(id)
{
	if(confirm('<?php echo lang('confirm_remove_related');?>'))
	{
		$('#related_product_'+id).remove();
		run_category_query();
	}
}

function remove_category(id)
{
	if(confirm('<?php echo lang('confirm_remove_category');?>'))
	{
		$('#category_'+id).remove();
		run_category_query();
	}
}

function photos_sortable()
{
	$('#gc_photos').sortable({	
		handle : '.gc_thumbnail',
		items: '.gc_photo',
		axis: 'y',
		scroll: true
	});
}
//]]>
</script>
<?php
function related_items($id, $name) {
	return '
			<tr id="related_product_'.$id.'">
				<td>
					<input type="hidden" name="related_products[]" value="'.$id.'"/>
					'.$name.'</td>
				<td>
					<a class="btn btn-danger pull-right btn-mini" href="#" onclick="remove_related_product('.$id.'); return false;"><i class="icon-trash icon-white"></i> '.lang('remove').'</a>
				</td>
			</tr>
		';
}

function category($id, $name) {
	return '
			<tr id="category_'.$id.'">
				<td>
					<input type="hidden" name="categories[]" value="'.$id.'"/>
					'.$name.'</td>
				<td>
					<a class="btn btn-danger pull-right btn-mini" href="#" onclick="remove_category('.$id.'); return false;"><i class="icon-trash icon-white"></i> '.lang('remove').'</a>
				</td>
			</tr>
		';
}

include('footer.php'); ?>
<?php include('footer.php'); ?>