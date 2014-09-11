<?php include('header.php'); 
$cart_contents = $this->session->userdata('cart_contents');
?>

<?php if(validation_errors()):?>
<div class="alert alert-danger">
	<a class="close" data-dismiss="alert">&times;</a>
	<?php echo validation_errors();?>
</div>
<?php endif;?>
<style>
    #calendario_cabecera{
        width: 97.5%;
        text-align: center;margin: 0 0 25px 60px;
    }
    #calendario{
        /*border: 1px solid red;*/
        width: 100%;
        height: 500px;
        overflow: auto;
        text-align: center;
    }
    .dia{
        float: left;
        width: 13%;
    }
    .hora{
        float: left;
        width: 60px;
    }
    .cabecera_calendario{
        background-color: #e32322;
        color: white;
        font-family:  verdana;
        font-size: 12px;
        font-weight: bold;
        height: 43px;
        padding-top: 10px;
        line-height: 9px;
        border-right: 2px solid white;
    }
    .contenido_horario{
        background-color: #D1D2D4;
        color: white;
        font-family:  verdana;
        font-size: 10px;
        border-right: 2px solid white;
        border-bottom: 1px solid white;
        height: 33px;
        padding-top: 7px;
    }
	
	.content_class{
		width: 100%;	
		margin-bottom: 20px;
		padding: 1px;
	}
	span.date{
			color: #0a374a;
			background: #f5f5f5;
			height: 20px;
			padding: 7px;
	}
    b{
        cursor: pointer;
    }
    .busy{
        margin:1px;
        border-radius: 5px;
        background-color: #C71120;
        color: white;
        font-weight: bold;
        margin: -7px 0;        
        height: 31px;
        padding-top: 6px;
    }
    .group_class{
        margin:1px;
        border-radius: 5px;
        background-color: #5EBDFF;
        color: white;
        font-weight: bold;
        margin: -7px 0;        
        height: 31px;
        padding-top: 6px;
        cursor: pointer;
    }
    .popover {
        max-width: 200px;
        width: auto;
    }
	#result_upload_video > div {display:block!important;}
</style>
<script  type="text/javascript">
    // Horario disponible
    var horarioDisponible="05:00-20:00";    // Formato del horario – HH:MM-HH:MM
    // Intervalos de tiempo
    var periodo=15;    // Tiempo de los intervalos en minutos
    // Comparamos las horas
    function compararHora(hora1, hora2){
        auxHora1=hora1.split(":");
        auxHora2=hora2.split(":");
        var h1 = parseInt(auxHora1[0], 10);
        var m1 = parseInt(auxHora1[1], 10);
        var h2 = parseInt(auxHora2[0], 10);
        var m2 = parseInt(auxHora2[1], 10);
        if (h1<h2 || (h1==h2 && m1<m2))
        return true;
        else
        return false;
    }
    // Obtenemos los intervalos de tiempo de cada dia
    function verHorario(horario, intervalo, verHorario, fecha,id_trainer2){
        var auxHorario=horario.split("-");
        var horaApertura=auxHorario[0].split(":");
        var horaCierre=auxHorario[1].split(":");
        var id_trainer = id_trainer2;
        var id_student = $("#customer_id").val();
        var hora=new Date();
        hora.setHours(horaApertura[0], horaApertura[1], 0);
        var intervalos="";
        while(compararHora(hora.getHours()+":"+hora.getMinutes(), auxHorario[1])){            
            var hours = new String(hora.getHours()); 
            if (hours.length == 1) hours = "0" + hours;
            var Minutes = new String(hora.getMinutes()); 
            if (Minutes.length == 1) Minutes = "0" + Minutes;
            var Mes = new String(fecha.getMonth()); 
            Mes = parseInt(Mes)+1;
            var horario = (fecha.getYear()+1900)+"_"+Mes+"_"+fecha.getDate()+"_"+hours+"_"+Minutes+"_00";              
            var date = (fecha.getYear()+1900)+"-"+Mes+"-"+fecha.getDate()+" "+hours+":"+Minutes+":00"; 
            if(verHorario) intervalos+="<div class='contenido_horario'>";
            else  intervalos+="<div class='contenido_horario' id='"+horario+"'>";
            
            if(verHorario){       
                intervalos+="<b style='color:black;'>"+hours+":"+Minutes+"</b>";
            } else{                
                var diaReserva=fecha.getDate()+"/"+Mes+"/"+(fecha.getYear()+1900);
                var horaReserva=hora.getHours()+":"+hora.getMinutes();
                //intervalos+="<a onClick='alert('')'>"+horaReserva+"<br>"+diaReserva+"</a>";
                intervalos+="<b  onclick=\"inscription_class(this,"+id_trainer+","+id_student+",'"+date+"',1,'"+horario+"')\">AVAILABLE</b>";
              
            }
            intervalos+="</div>";
            hora.setHours(hora.getHours(), hora.getMinutes()+intervalo, 0);
            
        }
    return intervalos;
    }
        function cargar_datos(fecha,id_trainer2){
  
     
        var Mes = new String(fecha.getMonth()); 
        Mes = parseInt(Mes)+1;
        var horario = (fecha.getYear()+1900)+"-"+Mes+"-"+fecha.getDate(); 
        var id_trainer = $("#id_trainer").val(); 

        $('.dia').remove();
        
        var id_trainerString = id_trainer.split(",");
        for (var i in id_trainerString) {
            id_trainerString = id_trainerString[i];
           }

           id_trainer2 = id_trainer2;
      var id_student = $("#customer_id").val();
      var name_student = $("#name_student").val();
        $.ajax({
                data:  {id_trainer:id_trainer,horario:horario,id_student:id_student},
                url:   'secure/charge_student_class1',
                type:  'post',
                success:  function (response) { 
                    var obj = $.parseJSON(response);
                   
                    $.each(obj, function() { 


                        if(this['band'] == 1){

                            if(this['type'] == 3){
                            
                           $("#"+this['fecha']).html("<div class='busy' style='background-color: #0a374a;'>BUSY</div>"); 
                        }
                         else if(this['type'] == 2){   

                           var fecha = this['fecha'];
                            var date = this['date'];  
                            var name_campo = "group_"+fecha;
                            $("#"+fecha).html("<div class='group_class' id='"+name_campo+"' class='btn btn-lg btn-danger' data-toggle='popover'>GROUP CLASS</div>");
                            
                            $("#"+fecha).html("<div  class='group_class' id='"+name_campo+" 'onclick=\"go_to_class_group('"+this['id_trainer']+"','"+id_student+"','"+name_campo+"','"+name_student+"');\">GROUP CLASS</div>");
                            
                        } 

                        }else{
                            if(this['type'] == 1){
                            
                           $("#"+this['fecha']).html("<div class='busy'>BUSY</div>"); 
                        } else if(this['type'] == 2){   

                            var fecha = this['fecha'] ;
                            var date = this['date'] ;
                            var band = this['band'];
                            $.ajax({
                               data:  {id_trainer:id_trainer,horario:this['fecha'],band:band},
                               url:   'secure/num_spots',
                               type:  'post',
                               success:  function (spots_avaliable){

                                        if(spots_avaliable > 0){

                            
                                             var name_campo = "group_"+fecha;
                                             $("#"+fecha).html("<div class='group_class' id='"+name_campo+"' onclick=\"inscription_class(this,"+id_trainer+","+id_student+",'"+date+"','"+band+"','"+fecha+"');mostrar_popover('"+name_campo+"',"+spots_avaliable+")\" class='btn btn-lg btn-danger' data-toggle='popover'>GROUP CLASS</div>");
                                              

                                        } else {
                                            $("#"+fecha).html("<div class='busy'>BUSY</div>");
                                        }                            
                               }   
                            });
                            
                        } 
                        }
                                                 
                    });                       
                }
            });    
    }
    function inscription_class(element,id_trainer,id_student,date,type,fecha,band){
        var induction = $("#class_induction").val();
        var variables = $("#id_trainer").val();

        if(confirm("Would you like to sign up for the following class?: "+date)){
            var variables = {
                               id_trainer : id_trainer,
                               id_student : id_student,
                               date : date,
                               variables : variables,
                               band : band,
                               type : type,
                               induction : induction
                            };
            $.ajax({
                   data:  variables,
                   url:   'secure/inscription_class',
                   type:  'post',
                   success:  function (response){
                            if(response == "existe_induccion"){
                               alert("You have scheduled your induction.");
                            } else if(response == "exi_t"){
                               alert("This time is already has already been booked. Please select a different time and date.");//dos clases en el dia
                            } else if(response == "warning1"){
                               alert("You cannot schedule more classes today.");//dos clases en el dia
                            } else if(response == "warning2"){
                               alert("If you want to schedule more classes, you can buy a pack.");//no ha comprado un paquete
                            } else if(response){
                               alert("you have successfully signed for this class, please check your calendar ");
                               $("#"+fecha).html("<div class='busy'>BUSY</div>");
                               // location.reload();
                            } else {
                                alert("We are currently experiencing difficulties. Please try again later.");
                            }                            
                   }   
                });
        } 
    }
        function go_to_class(id_trainer,id_student,fecha,name){
        var r = fecha+id_trainer;
        $("#trainer_id").val(id_trainer);
        $("#studen_id").val(id_student);
        $("#username").val(name);
        $("#r").val(r);
        $("#form1").submit();


    }
    
    function go_to_class_group(id_trainer,id_student,fecha,name){
      
        var r = fecha+id_trainer;
        $("#studen_id1").val(id_trainer);
        $("#trainer_id1").val(id_student);
        $("#username1").val(name);
        $("#r1").val(r);
        $("#form2").submit();
    }
    
    function go_to_class_group1(){
        alert('entro');
    }
    
    
    function mostrar_popover(name_campo,spots_avaliable){
        var btn2 = $('#'+name_campo);
        btn2.popover({
           trigger : 'hover',
           placement : 'bottom', //placement of the popover. also can use top, bottom, left or right
           title     : '<div style="color:black">Spots avaliable</div>', //this is the top title bar of the popover. add some basic css
           html      : 'true', //needed to show html of course
           content   : '<div id="popOverBox" style="color: green;font-size:14px;font-weight:bold">'+spots_avaliable+'</div>' //this is the content of the html box. add the image here or anything you want really.
         });
    }
    // Visualizamos la cabecera con el nombre del dia, la fecha y los intervalos de tiempo
    function verDia(fecha){
        var diasSemana=["SUNDAY", "MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY", "SATURDAY"];
        var Mes = new String(fecha.getMonth()); 
        Mes = parseInt(Mes)+1;
        var fechaDia = fecha.getDate()+"/"+Mes+"/"+(fecha.getYear()+1900);  
        
        //var fechaDia=fecha.getDate()+"/"+fecha.getMonth()+"/"+(fecha.getYear()+1900);
        //var dia="<div class='dia'><div>"+diasSemana[fecha.getUTCDay()]+"<br>"+fechaDia+"</div>";
        var dia="<div class='dia'><div class='cabecera_calendario'>"+diasSemana[fecha.getUTCDay()]+"<br/><b style='font-size:10px'>"+fechaDia+"</b></div>";
        //dia+=verHorario(horarioDisponible, periodo, false, fecha);
        dia+="</div>";
        document.getElementById("calendario_cabecera").innerHTML+=dia;
    }
  // Visualizamos los 7 dias siguientes al actual
    function verSemana(id_trainer2){    
        var fecha=new Date();
        $('.hora').remove();
        //document.getElementById("calendario").innerHTML+="<div class='dia'><div>HORARIO<br>"+horarioDisponible+"</div>"+verHorario(horarioDisponible, periodo, true, fecha)+"</div>";
        document.getElementById("calendario").innerHTML+="<div class='hora'>"+verHorario(horarioDisponible, periodo, true, fecha)+"</div>";
        cargar_datos(fecha,id_trainer2);
        for(var i=0; i<7; i++){

            verDia(fecha,id_trainer2);
            document.getElementById("calendario").innerHTML+="<div class='dia'>"+verHorario(horarioDisponible, periodo, false, fecha)+"</div>";        
            fecha.setDate(fecha.getDate()+1);

            
        }
    }


        $(document).on("click", ".btn-success", function () {

                                                             var myBookId = $(this).data('id');
                                                             $(" #id_trainer").val( myBookId );
                                                        });



    function two(valor,valor2,valor3,valor4){

                              var type = valor;
                              var date = valor2;
                              var id_trainer = valor3;
                              var id_course = valor4;





                              param(type,date,id_trainer,id_course);
                              verSemana(id_trainer);
                            }
                    function param(valor,valor2,valor3,valor4){

                              var type = valor;
                              var date = valor2;
                              var id_trainer = valor3;
                              var id_course = valor4;
                              var banderin = 6;
                              var id_student = $("#customer_id").val();
                              var induction =$('#class_induction').val();
                                
                               if(valor==2){

                                
                                     $.ajax({
                data:  {type:type,date:date,banderin:banderin,id_trainer:id_trainer,id_course:id_course,id_student:id_student,induction:induction},
                                            url:   'secure/inscription_class',
                                            type:  'POST',
                                                beforeSend: function () {
                                                    $("#resultado").html("Processing, please wait...");
                                            },
                                            success:  function (response) {
                                                    is_number = isNaN(response);
                   if(is_number == false){


                              var elem = date.split('-');
                              ano = elem[0];
                              mes = elem[1];
                              dia = elem[2];
                              var elem2 = dia.split('.');

                              dia = elem2[0];
                              hour = elem2[1];

                              date = mes+'-'+dia+'-'+ano+' '+hour;
                              
                    if(confirm('If you want to register a class, it will appear marked on your calendar? '+date+'')){
                    alert("you have successfully signed for this class, please check your calendar ");
                    // location.reload();
                   }
               }else{

                   }
                            }
                   

                          
                        }); 

                                 }
                            }
</script>

<input type="hidden" id="class_induction" name="class_induction" value="<?php echo $cart_contents['customer']['induction'];?>"> 
        <?php
        echo "<input type='hidden' id='id_trainer' name='id_trainer' value='".$user_logged->id."'>";        
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

<?php
    if( $user_logged->band == 2){

                ?><ul class="nav nav-pills nav-stacked all-text-medium nav-coach-profile pull-left" id="myTab" style="width: 22%;">
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
                    <?php 
//                    echo $cart_contents['customer']['id'];
                    if (isset($cart_contents['customer']['id'])) {
                        if ( $cart_contents['customer']['type'] == 'student' ) {                                       
                    ?>
                    <li>
                        <a href="#class_timetable">
                            <span class="glyphicon glyphicon-calendar"></span>
                            <span class="text-bold" style="font-size: 14px;"> &nbsp;CLASS TIMETABLE</span>
                        </a>
                    </li>
                    <?php 
                            }
                    }
                    ?>
                    <li>
                        <a href="#send_message">
                            <span class="glyphicon glyphicon-envelope"></span>
                            <span class="text-bold" style="font-size: 14px;"> &nbsp; SEND A MESSAGE</span>
                        </a>
                    </li>
                    <li>
                        <div class="well well-sm zero-padding" style="border-radius: 8px 8px 5px 5px; overflow: hidden;">
            <div align="center" class="container " style="background-color: #e32322; color: #ffffff; padding: 10px; font-size: 1.2em;">
                <div class="glyphicon glyphicon-shopping-cart" align="center"> <strong style="font-family: 'Yanone Kaffeesatz', sans-serif;font-size: 20px;">MY PURCHASES</strong></div>
            </div>

            <!--guia de compra-->
            <div align="center" id="container_my_purchase" style="background-color: #ffffff; padding: 10px;">

                    <a href="<?php echo site_url('cart/view_cart');?>">
                        <?php
                        if ($this->go_cart->total_items()==0)
                        {
                                echo lang('empty_cart');
                        }
                        else
                        {
                                if($this->go_cart->total_items() > 1)
                                {
                                        echo sprintf (lang('multiple_items'), $this->go_cart->total_items());
                                }
                                else
                                {
                                        echo sprintf (lang('single_item'), $this->go_cart->total_items());
                                }
                        }
                        ?>
                    </a>
            </div>
        </div>


                    </li>
                </ul>


       <?php 
}else{
    ?>

<ul class="nav nav-pills nav-stacked all-text-medium nav-coach-profile pull-left" id="myTab" style="width: 22%;">
                   
                             
                    <?php 

                    if (isset($cart_contents['customer']['id'])) {
                        if ( $cart_contents['customer']['type'] == 'student' ) {                                       
                    ?>
                     <li class="active">
                        <a href="#class_timetable">
                            <span class="glyphicon glyphicon-calendar"></span>
                            <span class="text-bold" style="font-size: 14px;"> &nbsp;CLASS TIMETABLE</span>
                        </a>
                    </li>
                    <?php 
                            }
                    }
                    ?>
                    <li>
                        <a href="#send_message">
                            <span class="glyphicon glyphicon-envelope"></span>
                            <span class="text-bold" style="font-size: 14px;"> &nbsp; SEND A MESSAGE</span>
                        </a>
                    </li>
                    <li>
                        <div class="well well-sm zero-padding" style="border-radius: 8px 8px 5px 5px; overflow: hidden;">
            <div align="center" class="container" style="background-color: #e32322; color: #ffffff; padding: 10px; font-size: 1.2em;">
                <div class="glyphicon glyphicon-shopping-cart" align="center"> <strong style="font-family: 'Yanone Kaffeesatz', sans-serif;font-size: 20px;">MY PURCHASES</strong></div>
            </div>

            <!--guia de compra-->
            <div align="center" id="container_my_purchase" style="background-color: #ffffff; padding: 10px;">

                    <a href="<?php echo site_url('cart/view_cart');?>">
                        <?php
                        if ($this->go_cart->total_items()==0)
                        {
                                echo lang('empty_cart');
                        }
                        else
                        {
                                if($this->go_cart->total_items() > 1)
                                {
                                        echo sprintf (lang('multiple_items'), $this->go_cart->total_items());
                                }
                                else
                                {
                                        echo sprintf (lang('single_item'), $this->go_cart->total_items());
                                }
                        }
                        ?>
                    </a>
            </div>
        </div>


                    </li>
                </ul>

    <?php
}
$id = $cart_contents['customer']['id'];


 $query = $this->db->query("SELECT COUNT(student_packages.id) as pack from student_packages where student_packages.id_customer='".$id."'");

 foreach ($query->result() as $key) {   
 $key;
    }
    if( $user_logged->band == 2){

                ?>  
                   <div class="tab-content" style="overflow: hidden;">
                    
                    <div class="tab-pane active" id="class_schedule">
					
                        <h3 align="center"><strong>CLASS SCHEDULE</strong></h3>
													
													<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
							  <li class="active nav-pills"><a href="#group" role="tab" data-toggle="tab">GROUP CLASSES</a></li>
							  <li><a href="#one" role="tab" data-toggle="tab">1 to 1 AVAILABILITY</a></li>

							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
							  <div class="tab-pane active" id="group" style="padding:20px;">
							   
							  <?php
							  foreach ($courses_trainer as $i => $course_trainer){


							  //Capturamos tipo y asignamos valores
						       $tipo_curso=$course_trainer->type;
							  //formato fecha de la clase.
							   $date_group = new DateTime($course_trainer->data);
			                   $fecha_grop_class = date_format($date_group, ' l jS \of F H:i A');
                               $fecha = $course_trainer->data;
                               $date = str_replace(" ",".",$fecha);
							 if ($tipo_curso==2)
							$display='block';
							else{
							$display='none';
							}
						?>
                        <div class="jumbotron zero-margin content-shadow effect-load slide" style="z-index: <?php echo $i;?>;padding: 0;">
							<div class="content_class" style="display:<?php echo $display;?>" >
							
                                <h4 class="a3w-text-color text-bold"><?php echo $course_trainer->name;?></h4>
								
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
                                        <img class="media-object" src="<?php echo base_url('uploads/images/full/'. $photoUrl);?>" alt="Trainer" height="90">
                                        </a>
                                        <div class="media-body text-md-small line-height">
                                            <?php echo $course_trainer->description;?>
										    <span class="date"><?php echo $fecha_grop_class;?></span>

                                        </div>
                                    </div>
                                    <span class="break small-height"></span>
                                        <?php if($key->pack == 0){?>
                                        <div class="col-md-12">
                                            <div align="right">
                                                <?php if($cart_contents['customer']['type'] == 'trainer' ){?>
                                                 <a class="btn btn-success" data-toggle="modal" data-target="#modal_calendar"  data-id="<?php echo $course_trainer->id_trainner.",".$course_trainer->id.",".$course_trainer->type;?>"   onclick = "two('<?php echo $course_trainer->type;?>','<?php echo $date; ?>','<?php echo $course_trainer->id_trainner?>','<?php echo $course_trainer->id;?>')">Enroll</a>
                                                <?php }else{?>
                                                <a data-toggle="modal" href="#modal_check_courses" class="btn btn-primary btn-lg" onclick="check_courses_shop_profile(<?php echo $course_trainer->id?>);">Check</a>
                                                <?php }?>
                                            </div>
                                        </div>
                                         <?php }else{
										
										 ?>
                                         <div class="col-md-12">
										 <div align="right">
                                                <?php if($cart_contents['customer']['type'] == 'student' ){?>
                                                <a class="btn btn-success" data-toggle="modal" data-target="#modal_calendar"  data-id="<?php echo $course_trainer->id_trainner.",".$course_trainer->id.",".$course_trainer->type;?>"   onclick = "two('<?php echo $course_trainer->type;?>','<?php echo $date; ?>','<?php echo $course_trainer->id_trainner?>','<?php echo $course_trainer->id;?>')">Enroll</a>
													
												 
												<input type="hidden" id="id_trainer" name="id_trainer" value="<?php echo $course_trainer->id_trainner.",".$course_trainer->id.",".$course_trainer->type;?>"> 
												<input type="hidden" id="class_induction" name="class_induction" value="<?php echo $user_logged->induction;?>"> 
                                        </div>
                                                <?php }else{?>
                                                  
                                                <?php }?>
                                        </div>
										
                                          <?php }?>
                                    
                                </p>
                            </div> 
                        </div>
                        <?php }
						if( $display== 'none'){
						 
						 		 echo '<p class="text-md-small">This trainer doesn\'t currently offer any classes. Check out classes by other trainers <a href="course/all">here</a> </p>';	
						}		
						 ?>
						
							  
							  
							  </div>
							  <div class="tab-pane" id="one" style="padding: 20px;">
					           
							   <?php foreach ($courses_trainer as $i => $course_trainer){
                                $fecha = $course_trainer->data;
                                $date = str_replace(" ",".",$fecha);
							    $tipo_curso=$course_trainer->type;
							     if ( $tipo_curso==1)
							    $display='block';
							    else{
							     $display='none';
							
							        }?>
                        <div class="jumbotron zero-margin content-shadow effect-load slide" style="z-index: <?php echo $i;?>;padding: 0;">
							
						
							<div class="content_class" style="display:<?php echo $display;?>">
                                <h4 class="a3w-text-color text-bold"><?php echo $course_trainer->name;?></h4>
							
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
                                        <img class="media-object" src="<?php echo base_url('uploads/images/full/'. $photoUrl);?>" alt="Trainer" height="90">
                                        </a>
                                        <div class="media-body text-md-small line-height">
                                            <?php echo $course_trainer->description;?>
                                        </div>
                                    </div>
                                    <span class="break small-height"></span>
                                    
                                        
                                        <?php if($key->pack == 0){?>
                                        <div class="col-md-12">
                                            <div align="right">
                                                <?php if($cart_contents['customer']['type'] == 'trainer' ){?>
                                                <form action="https://plus.google.com/hangouts/_" method="get" target="_blank">
                                                    <input type="hidden" name="gid" value="39711101729">
                                                    <input type="submit" class="btn btn-success btn-lg" value="Enroll">
                                                </form>
                                                <?php }else{?>
                                                <a data-toggle="modal" href="#modal_check_courses" class="btn btn-primary btn-lg" onclick="check_courses_shop_profile(<?php echo $course_trainer->id?>);">Check</a>
                                                <?php }?>
                                            </div>
                                        </div>
                                         <?php }
										 else{
										
										 ?>
                                         <div class="col-md-12">
										 <div align="right">
                                                <?php if($cart_contents['customer']['type'] == 'student' ){?>
												 <a class="btn btn-success" data-toggle="modal" data-target="#modal_calendar"  data-id="<?php echo $course_trainer->id_trainner.",".$course_trainer->id.",".$course_trainer->type;?>"   onclick = "param('<?php echo $course_trainer->type;?>','<?php echo $date; ?>','<?php echo $course_trainer->id_trainner?>','<?php echo $course_trainer->id;?>')">Enroll</a>

												 
												<input type="hidden" id="id_trainer" name="id_trainer" value="<?php echo $course_trainer->id_trainner.",".$course_trainer->id.",".$course_trainer->type;?>"> 
												<input type="hidden" id="class_induction" name="class_induction" value="<?php echo $user_logged->induction;?>"> 
											    
											   
                                        </div>
                                                <?php }else{?>
                                                  
                                                <?php }?>
                                        </div>
                                          <?php }?>
                                   
                                </p>
                            </div>
                        </div>
                        <?php }
						if( $display== 'none'){
						 
						  echo '<p class="text-md-small">This trainer doesn\'t currently offer any classes. Check out classes by other trainers <a href="course/all">here</a> </p>';	
						}		
						?>
							  
				   </div>
			 </div>
	</div>

                    <div class="tab-pane" id="videos">
					
                        <div id="result_upload_video" class="well">
                            <?php
                              $query = $this->db->query("SELECT * FROM videos_profile WHERE idcustomers = '".$cart_contents['customer']['id']."'");
                              foreach ($query->result() as $row){
                             ?>
							 
                                <div id="container_video" class="media closing" style="background: #E3E3E3; padding: 5px 10px;">
                                    <div><input type="hidden" id="id_video" value="<?php echo $row->id ?>"></div>
                                    <a class="pull-left">
                                        <iframe class="content-shadow effect-load slideDown" src="<?php echo $row->url?>" 
                                                frameborder="0" allowfullscreen 
                                                style="-webkit-box-shadow: 0px 13px 15px rgba(50, 50, 50, 0.78);
                                                -moz-box-shadow:    0px 13px 15px rgba(50, 50, 50, 0.78);
                                                box-shadow:         0px 13px 15px rgba(50, 50, 50, 0.78);" 
                                                width="320" height="240">                                    
                                        </iframe>
                                    </a>
                                    <div class="media-body text-md-small">
                                        <h4 class="media-heading"><?php echo $row->tittle?></h4>
                                        <p id="description_digital_content_add"><?php echo $row->description?></p>
                                    </div>
                                </div>
                            <?php      
                              }                              
                            ?>
                            <div style="display:none">
                                <div id="container_video" class="media closing" style="background: #E3E3E3; padding: 5px 10px;">
                                    <div><input type="hidden" id="id_video" value=""><button type="button" class="close" onclick="delete_file(this);" aria-hidden="true">&times;</button></div>
                                    <a class="pull-left">
                                        <iframe class="content-shadow effect-load slideDown" src="//www.youtube.com/embed/pnDwqj73g8s" 
                                                frameborder="0" allowfullscreen 
                                                style="-webkit-box-shadow: 0px 13px 15px rgba(50, 50, 50, 0.78);
                                                -moz-box-shadow:    0px 13px 15px rgba(50, 50, 50, 0.78);
                                                box-shadow:         0px 13px 15px rgba(50, 50, 50, 0.78);" 
                                                width="320" height="240">                                    
                                        </iframe>
                                    </a>
                                    <div class="media-body text-md-small">
                                        <h4 class="media-heading">Heading</h4>
                                        <p id="description_digital_content_add">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, cum ipsum alias iusto nam corporis. Ipsa, placeat, cumque minima facilis atque laborum fugit aliquam assumenda est reiciendis excepturi dolores voluptatum?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="send_message">
                        <h3 align="center"><strong>SEND A MESSAGE</strong></h3>
                        <form role="form" id="message">
                            <div align="left" class="text-md-small">
                                <div class="input-group objects_tags">
                                    <span class="input-group-addon">To:</span>
                                    <input type="text" class="form-control">
                                </div>
                                <br>
                                <div class="form-group">
                                    <textarea id="message_body" name="message_body" class="form-control" placeholder="Body"></textarea>
                                </div>
                                <div class="form-group" align="right">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                    <div class="tab-pane" id="class_timetable">

                     Trainer calendar view	 				
<!--                        <div class="tab-pane" id="working_hours">  
                            <iframe width="100%" height="700px" frameborder="0" src="scheduler_trainer_clases?id=30"></iframe>
                        </div>
                        <div id="calendario_cabecera">
                            <div class="hora">&nbsp;</div>
                        </div><br />
                        <div id="calendario"></div>
                       <!-- <script type="text/javascript">verSemana();</script>-->
                    </div>
                </div>

<?php
         }else{?>

<div class="tab-content" style="overflow: hidden;">
                    
                        
                  
                    <div class="tab-pane" id="send_message">
                        <h3 align="center"><strong>SEND A MESSAGE</strong></h3>
                        <form role="form">
                            <div align="left" class="text-md-small">
                                <div class="input-group objects_tags">
                                    <span class="input-group-addon">To:</span>
                                    <input type="text" class="form-control">
                                </div>
                                <br>
                                <div class="form-group">
                                    <textarea id="message_body" name="message_body" class="form-control" placeholder="Body"></textarea>
                                </div>
                                <div class="form-group" align="right">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                    <div class="tab-pane active" id="class_timetable">  
                      Trainer calendar view					
<!--                        <div class="tab-pane" id="working_hours">  
                            <iframe width="100%" height="700px" frameborder="0" src="scheduler_trainer_clases?id=30"></iframe>
                        </div>
                        <div id="calendario_cabecera">
                            <div class="hora">&nbsp;</div>
                        </div><br />
                        <div id="calendario"></div>
                        <!--<script  type="text/javascript">verSemana();</script>-->
                    </div>
                </div>


         <?php } ?>
             



            </div>
        </div>
    </div>



<!--modal calendar-->


 <div class="modal fade" id="modal_calendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 60%;"> 
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title">CALENDAR</h4>
                     </div>
                <div class="modal-body"> 
                    <div id="calendario_cabecera">
                        <div class="hora">&nbsp;</div>
                    </div><br />
                    <div id="calendario"></div>
                    <script  type="text/javascript">verSemana();</script>
                </div>
            </div>
        </div>
</div> 	
	
	<!-- Modal Edit Profile -->
    <div class="modal fade" id="modal_check_courses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:70%">
            <div class="modal-content" id="modal_check">            
                <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
        </div>
    </div>
    <?php include('footer.php'); ?>
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