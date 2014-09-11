<?php include('header.php');?>

<?php if(validation_errors()):?>
<div class="alert alert-danger">
  <a class="close" data-dismiss="alert">&times;</a>
  <?php echo validation_errors();
 ?>
</div>
<?php endif;

?>

<style>

@font-face {
  font-family: 'Glyphicons Halflings';
  src: url('../fonts/glyphicons-halflings-regular.eot');
  src: url('../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');
}
/*    .modal-dialog {
        width: 60%;
    }*/
    .glyphicon-calendar:before {
content:"\e109";
}  
.btn-danger{background-color: #d2322d;}
.entrenador{color:#e32322;} 
.description{width: 100%;
height: 123px;}
    .classbox{
        padding:10px;
        margin: 0 10px 0 0; 
        margin-bottom: 10px; 
        overflow: hidden;
        border-radius: 5px; 
        width: 205px; 
        height:200px;
        border: 1px solid #ccc;
        text-align: center;
    }
    .classbor{
        padding: 10px;
        margin: 0 10px 0 0;
        margin-bottom: 10px;
        overflow: hidden;
        border-radius: 5px;
        width: 274px;
        height: 427px;
        border: 1px solid #ccc;
        text-align: center;
    }
    #calendario_cabecera{
        width: 97.5%;
        text-align: center;
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
        overflow: hidden;
        cursor: pointer;
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
    function verHorario(horario, intervalo, verHorario, fecha){
        var auxHorario=horario.split("-");
        var horaApertura=auxHorario[0].split(":");
        var horaCierre=auxHorario[1].split(":");
        var id_trainer = $("#id_trainer").val();
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
               
                intervalos+="<b  onclick=\"inscription_class(this,"+id_trainer+","+id_student+",'"+date+"',1,'"+horario+"')\">AVAILABLE</b>"
              
            }
            intervalos+="</div>";
            hora.setHours(hora.getHours(), hora.getMinutes()+intervalo, 0);
            
        }
    return intervalos;
    }
    function cargar_datos(fecha){
	
	   
        var Mes = new String(fecha.getMonth()); 
        Mes = parseInt(Mes)+1;
        var horario = (fecha.getYear()+1900)+"-"+Mes+"-"+fecha.getDate(); 
        var id_trainer = $("#id_trainer").val(); 
        var id_student = $("#customer_id").val();
        var name_student = $("#name_student").val();
        $.ajax({
                data:  {id_trainer:id_trainer,id_student:id_student,horario:horario},
                url:   'charge_student_class',
                type:  'post',
                success:  function (response) { 
                    var obj = $.parseJSON(response);                   
                    $.each(obj, function() { 
                        if(this['type'] == 1){
                           if(this['induction'] > 0){
                                $("#"+this['fecha']).html("<div class='busy' style='background-color:#57A349' onclick=\"go_to_class('"+this['id_trainer']+"','"+id_student+"','"+this['fecha']+"','"+name_student+"');\" title='"+this['firstname']+" "+this['lastname']+"'>"+this['firstname']+" "+this['lastname']+"</div>"); 
                           } else{
                                $("#"+this['fecha']).html("<div class='busy' onclick=\"go_to_class('"+this['id_trainer']+"','"+id_student+"','"+this['fecha']+"','"+name_student+"');\" title='"+this['firstname']+" "+this['lastname']+"'>"+this['firstname']+" "+this['lastname']+"</div>"); 
                           }
                        } else if(this['type'] == 2){                            
                            var fecha = this['fecha'];
                            var date = this['date'];  
                            var name_campo = "group_"+fecha;
                            $("#"+fecha).html("<div class='group_class' id='"+name_campo+"' class='btn btn-lg btn-danger' data-toggle='popover'>GROUP CLASS</div>");
							
                            $("#"+fecha).html("<div  class='group_class' id='"+name_campo+" 'onclick=\"go_to_class_group('"+this['id_trainer']+"','"+id_student+"','"+name_campo+"','"+name_student+"');\">GROUP CLASS</div>");

                        }                          
                    });                       
                }

            });    
    }

        function inscription_class(element,id_trainer,id_student,date,type,fecha){

        

        var induction = $("#class_induction").val();
        var id_trainer = $("#id_trainer").val();
        if(confirm("Would you like to sign up for the following class?: "+date)){
            var variables = {
                               id_trainer : id_trainer,
                               id_student : id_student,
                               date : date,
                               type : type,
                               induction : induction
                            };
            $.ajax({
                   data:  variables,
                   url:   'inscription_class',
                   type:  'post',
                   success:  function (response){
                            if(response == "existe_induccion"){
                               alert("You have scheduled your induction.");
                            } else if(response == "warning1"){
                               alert("You cannot schedule more classes today.");//dos clases en el dia
                            } else if(response == "warning2"){
                               alert("If you want to schedule more classes, you can buy a pack.");//no ha comprado un paquete
                            } else if(response){
                               alert("you have successfully signed for this class, please check your calendar ");
                               $("#"+fecha).html("<div class='busy'>BUSY</div>");
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
           trigger : 'click',
           placement : 'bottom', //placement of the popover. also can use top, bottom, left or right
           title     : '<div style="color:black">Spots available</div>', //this is the top title bar of the popover. add some basic css
           html      : 'true', //needed to show html of course
           content   : '<div id="popOverBox" style="color: green;font-size:14px;font-weight:bold">'+spots_avaliable+'</div>' //this is the content of the html box. add the image here or anything you want really.
         });
    }
    // Visualizamos la cabecera con el nombre del dia, la fecha y los intervalos de tiempo
    function verDia(fecha){
        var diasSemana=["SUNDAY", "MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY", "SATURDAY"];
        var Mes = new String(fecha.getMonth()); 
        Mes = parseInt(Mes)+1;
        var fechaDia = Mes+"/"+fecha.getDate()+"/"+(fecha.getYear()+1900);        
//        var fechaDia=fecha.getDate()+"/"+fecha.getMonth()+"/"+(fecha.getYear()+1900);
        //var dia="<div class='dia'><div>"+diasSemana[fecha.getUTCDay()]+"<br>"+fechaDia+"</div>";
        var dia="<div class='dia'><div class='cabecera_calendario'>"+diasSemana[fecha.getUTCDay()]+"<br/><b style='font-size:10px'>"+fechaDia+"</b></div>";
        //dia+=verHorario(horarioDisponible, periodo, false, fecha);
        dia+="</div>";
        document.getElementById("calendario_cabecera").innerHTML+=dia;
    }
    // Visualizamos los 7 dias siguientes al actual
    function verSemana(){    
        var fecha=new Date();
        //document.getElementById("calendario").innerHTML+="<div class='dia'><div>HORARIO<br>"+horarioDisponible+"</div>"+verHorario(horarioDisponible, periodo, true, fecha)+"</div>";
        document.getElementById("calendario").innerHTML+="<div class='hora'>"+verHorario(horarioDisponible, periodo, true, fecha)+"</div>";
        cargar_datos(fecha);
        for(var i=0; i<7; i++){
            verDia(fecha);
            document.getElementById("calendario").innerHTML+="<div class='dia'>"+verHorario(horarioDisponible, periodo, false, fecha)+"</div>";        
            fecha.setDate(fecha.getDate()+1);
            
        }
    }  
    
</script>



<div id="pageUserProfile">

<form id="form1" action="../../../videochat/2wvideochat.php" method="post" name="adminForm">
    <input id="studen_id" type="hidden"  maxlength="16" size="12" value="" name="student_id">
    <input id="trainer_id" type="hidden"  maxlength="16" size="12" value="" name="trainer_id">
    <input id="username" type="hidden"  maxlength="16" size="12" value="" name="username">
    <input id="r" type="hidden" maxlength="32" size="16" value="" name="r">
</form>

<form id="form2" action="../../../videoconference/videowhisper_conference.php" method="post" name="adminForm">
    <input id="studen_id1" type="hidden"  maxlength="16" size="12" value="" name="student_id">
    <input id="trainer_id1" type="hidden"  maxlength="16" size="12" value="" name="trainer_id">
    <input id="username1" type="hidden"  maxlength="16" size="12" value="" name="username">
    <input id="r1" type="hidden" maxlength="32" size="16" value="" name="r1">
</form>

<input type="hidden" id="name_student" name="name_student" value="<?php echo $user_logged->firstname." ".$user_logged->lastname;?>">


<div class="row">
    <div class="col-md-4" style="padding: 0 0 0 30px;">
        <div class="well well-sm zero-padding" style="border-radius: 8px 8px 5px 5px; overflow: hidden;">
            
<?php
            if($user_logged->front != "false"){
                $image1     = explode("{", $user_logged->front);
                $image2     = explode(":", $image1[2]);
                $image3     = explode("\"", $image2[1]);
                $frontUrlEditProfile   = $image3[1];
            }else $frontUrlEditProfile = '';?>
            <div style="height: 110px; background: url(<?php echo base_url( "uploads/images/full/". (($frontUrlEditProfile) ? $frontUrlEditProfile : 'user.png') );?>); background-repeat: no-repeat; background-size: 100% auto; background-position: center;">
                
            </div>
            <div class="container">
                <div class="row">
                    <div align="center" class="col-md-5" style="background-color: #ffffff; color: #8C8C8C;">
                        <?php
                        if($user_logged->photo != "false"){
                            $image1     = explode("{", $user_logged->photo);
                            $image2     = explode(":", $image1[2]);
                            $image3     = explode("\"", $image2[1]);
                            $photoUrlEditProfile   = $image3[1];
                        }else $photoUrlEditProfile = '';?>
                        <div style="width: 100px;height: 100px; background-color: #ffffff; background: url(<?php echo base_url()."uploads/images/full/".$photoUrlEditProfile; ?>); background-repeat: no-repeat;background-size: auto 100%;background-position: center; border: 5px solid #ffffff;border-radius: 50px; position:relative; margin-top: -50px;" border="0">
                        </div>
                        <div>
                            <h2><b><?php 
                                function calculaedad($fechanacimiento){
                                    list($ano,$mes,$dia) = explode("-",$fechanacimiento);
                                    $ano_diferencia  = date("Y") - $ano;
                                    $mes_diferencia = date("m") - $mes;
                                    $dia_diferencia   = date("d") - $dia;
                                    if ($dia_diferencia < 0 || $mes_diferencia < 0)
                                        $ano_diferencia--;
                                    return $ano_diferencia;
                                }

                                // Modo de uso
                                echo calculaedad ($user_logged->birthday); // Imprimirá: 30
                                
                                
                            ?></b></h2>
                            <span>Age</span>
                            <h2><b>
                            <?php
                                echo "0";
                            ?></b></h2>
                            <span>Achievements</span>
                        </div>
                        <div style="padding-bottom: 20px;" align="center">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal_edit_profile">
                                Edit Profile
                            </button>
                        </div>
                    </div>
                    <div class="col-md-7 zero-padding">
                        <div style="background-color: #e32322; color: #ffffff; font-size: 1.2em; padding: 5px 0 5px 10px;">
                            <strong title="<?php echo $user_logged->firstname;?> <?php echo $user_logged->lastname;?>"><?php echo $user_logged->firstname;?> <?php echo $user_logged->lastname;?></strong>
                            <div class="text-medium"><?php echo $user_logged->city;?> </div> 
                            <div class="text-medium">
                                <?php 
                                    $query = $this->db->where('id', $user_logged->country_id)->get('countries');
                                    $row = $query->row();
                                    echo $row->name;
                                ?>
                             </div>
                        </div>
                        <div class="container text-md-medium" style="margin: 10px auto">
                            <?php
                            if ( ! $user_logged->address == '' ) { 
                            ?>
                            <div class="row">
                                <div class="col-md-3" style="color: #e32322;width: 20%;padding-left: 10px;"><span class="glyphicon glyphicon-road"></span></div>
                                <div class="col-md-9" align="left" style="overflow: hidden; white-space:nowrap;font-size: 12px;margin-left: -5px;padding-left: 10px;"><?php echo $user_logged->address;?></div>
                            </div>
                            <?php 
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-3" style="color: #e32322;width: 20%;padding-left: 10px;"> <img src="<?php echo base_url("uploads/img/userprofile/icon6.jpg");?>" style="height: 16px;"></div>
                                <div class="col-md-9" align="left" title="<?php echo $user_logged->email;?>" style="font-size: 12px;margin-left: -5px;padding-left: 10px;"><?php echo $user_logged->email;?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="padding-left: 10px;">&nbsp;</div>
                                <div class="col-md-9" align="left" style="overflow: hidden; white-space:nowrap;font-size: 12px;margin-left: -5px;padding-left: 10px;">
                                    <div><?php echo $user_logged->cell_phone;?></div>
                                    <div><?php echo $user_logged->phone;?></div>
                                </div>
                            </div>
                            <?php
                            if ( ! $user_logged->zip == '' ) {
                            ?>
                            <div class="row">
                                <div class="col-md-3" style="color: #e32322;width: 20%;padding-left: 10px;"><span class="glyphicon glyphicon-plane"></span></div>
                                <div class="col-md-9" align="left" style="overflow: hidden; white-space:nowrap;font-size: 12px;margin-left: -5px;padding-left: 10px;"><?php echo $user_logged->zip;?> zip</div>
                            </div>
                            <?php 
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="well well-sm zero-padding" style="border-radius: 8px 8px 5px 5px; overflow: hidden;">
            <div align="center" class="container" style="background-color: #e32322; color: #ffffff; padding: 10px; font-size: 1.2em;">
                <div align="center"><span class="glyphicon glyphicon-calendar" style="padding: 0 10px 0 0;"></span><strong style="font-family: 'Yanone Kaffeesatz', sans-serif;font-size: 33px;">MY WORKOUTS</strong></div>
            </div>

            
            <div style="background-color: #ffffff; padding: 10px;">



                <?php

if(empty($packages_customer)){echo'You don´t have any assigned courses.';}
else{

                    foreach ($packages_customer as $pkg) { 

                    // echo '<pre>';
                    // print_r($user_logged->id);
                    // exit();  


                ?>
                        <div style="border-bottom: 1px dashed #2C3F4E; padding: 10px;">
                            <div><a data-toggle="modal" data-target="#modal_calendar"><strong><?php echo $pkg->name;?></strong></a></div>
                            <div style="border-bottom: 1px #2C3F4E; padding: 10px;"> 
                            <?php
                                $query_pkgs = $this->db->query("SELECT * FROM student_packages 
                                                                WHERE id_customer = '".$pkg->id_customer."'
                                                                AND id_package = '".$pkg->id_package."'");
    

                                foreach ($query_pkgs->result() as $pkg_pagos){


                                date_default_timezone_set('UTC');
                                $fecha = $pkg_pagos->date;
                                date("l - F-d-y",  strtotime($fecha));
                                    
                                }
                            ?>
                            </div>
                            <div align="right">
                            <a class="btn btn-success" data-toggle="modal" data-target="#modal_trainers">View trainers</a>
                            </div>
                        </div>
                <?php }
            }?>
            </div>
        </div>
        <div class="well well-sm zero-padding" style="border-radius: 8px 8px 5px 5px; overflow: hidden;">
            <div align="center" class="container" style="background-color: #e32322; color: #ffffff; padding: 10px; font-size: 1.2em;">
                <div class="glyphicon glyphicon-shopping-cart" align="center"> <strong style="font-family: 'Yanone Kaffeesatz', sans-serif;font-size: 33px;">MY PURCHASES</strong></div>
            </div>
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
    </div>
    <div class="col-md-8" style="float: left;width: 65%;">
        <div class="well" style="border: 0px">
            <div class="container">
                <div class="row" style="text-align:right">
                    <div>
                        <?php 

                        

                               if($user_logged->induction == 0){
                               $query = $this->db->query("SELECT * FROM student_packages WHERE id_customer=".$user_logged->id);

                                //        print_r($user_logged->induction);
                                // exit();



                               if($query->num_rows() > 0){

                                    $query2 = $this->db->query("SELECT * FROM student_packages 
                                                                WHERE id_customer='".$user_logged->id."'
                                                                AND id_package=1");


                                    if($query2->num_rows() > 0){                                   
                                        echo '<button class="btn btn-primary" data-toggle="modal" data-target="#modal_trainers_induction">
                                                 INDUCTION PROGRAM
                                              </button>&nbsp;&nbsp;&nbsp;'; 
                                    } else {
                                        echo '<a href="go_to_pay_membership"><button class="btn btn-primary">
                                                    PAY MEMBERSHIP
                                              </button></a>&nbsp;&nbsp;&nbsp;';
                                    }
                               }
                            }
                        ?>                        
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_calendar">
                            MY SCHEDULE
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="well" style="background-color: #ffffff;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 zero-padding" align="left" style="width: 100%;"><h2 class="zero-margin"><b style="font-family: 'Yanone Kaffeesatz', sans-serif;">FEATURE GROUP WORKOUTS</b></h2></div>
                </div>
            </div>
            <div class="container">
                <?php $courses_row = $this->Course_model->get_courses_row2();

                // echo '<pre>';
                //                          foreach($courses_row->result() as $courses):

                //                             print_r($courses);

                //                              endforeach

                                         ?>
            <div class="col-md-9" style="padding: 0 auto; padding-top: 10px; width: 860px;margin-bottom: 20px;display:inline-flex;">
                    <?php
                           if(empty($pkg->id)){


    foreach($courses_row->result() as $courses):$cadena = $courses->description;

                                    

                       $entrenadorNombre = $courses->firstname;
                       $entrenadorApellido = $courses->lastname;
                       $cadenaDescripcion = substr( $cadena, 0, 149 ); 



                       ?>
                        <div class="col-md-4 classbor">
                            <?php
                            $places_left = 1/*$courses->quantity*/;
                            $photo  = theme_img('no_picture.png', lang('no_image_available'));
                            $photoUrl = theme_url('assets/img/no_picture.png');
                            if($courses->images != "false"){
                                $image1 = explode("{", $courses->images);
                                $image2 = explode(":", $image1[2]);
                                $image3 = explode("\"", $image2[1]);
                                $photo  = '<img src="'.base_url('uploads/images/thumbnails/'.$image3[1]).'" style="width:auto; height:150px;"/>';
                                $photoUrl = base_url('uploads/images/full/'.$image3[1]);
                            }
                            ?>
                            <a class="thumbnail linkThumb" style="border: none;">
                                <?php echo $photo; ?>
                            </a>
                            <h5 style="margin:5px 0;width: 100%;height: 37px;"><b><?php echo $courses->name;?></b></h5> 
                            <div class="entrenador">by <?php echo $entrenadorNombre.' '.$entrenadorApellido?></div>
                            <div class="description"><?php echo $cadenaDescripcion; ?>...</div>   
                            <div class="container" style="padding-left: 0;">
                               <div class="pull-right">
                                    <div class="row">
                                         <a  data-toggle="modal" href="#modal_check_courses" class="btn btn-danger" onclick="check_courses_shop(<?php echo $courses->id_course;?>);">ENROLL</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                     }else{  


                    foreach($courses_row->result() as $courses):$cadena = $courses->description;    

   
                             
  
                       $entrenadorNombre = $courses->firstname;
                       $entrenadorApellido = $courses->lastname;
                       $cadenaDescripcion = substr( $cadena, 0, 149 ); ?>
                        <div class="col-md-4 classbor">
                            <?php
                            $places_left = 1/*$courses->quantity*/;
                            $photo  = theme_img('no_picture.png', lang('no_image_available'));
                            $photoUrl = theme_url('assets/img/no_picture.png');
                            if($courses->images != "false"){
                                $image1 = explode("{", $courses->images);
                                $image2 = explode(":", $image1[2]);
                                $image3 = explode("\"", $image2[1]);
                                $photo  = '<img src="'.base_url('uploads/images/thumbnails/'.$image3[1]).'" style="width:auto; height:150px;"/>';
                                $photoUrl = base_url('uploads/images/full/'.$image3[1]);
                            }
                            ?>
                            <a class="thumbnail linkThumb" style="border: none;">
                                <?php echo $photo; ?>
                            </a>
                            <h5 style="margin:5px 0;width: 100%;height: 37px;"><b><?php echo $courses->name;?></b></h5> 
                            <div class="entrenador">by <?php echo $entrenadorNombre.' '.$entrenadorApellido?></div>
                            <div class="description"><?php echo $cadenaDescripcion; ?>...</div>   
                            <div class="container" style="padding-left: 0;">
                               <div class="pull-right">
                                    <div class="row">


                                    <div align="right">
                            <a class="btn btn-success" data-toggle="modal" data-target="#modal_calendar"  data-id="<?php echo $courses->id_trainner;?>" >View calendar</a>

                            <script type="text/javascript">
                            $(document).on("click", ".btn-success", function () {
                                 var myBookId = $(this).data('id');
                                 $(" #id_trainer").val( myBookId );
                            });
                            </script>
                            <input type="hidden" id="id_trainer" name="id_trainer" value="<?php echo $courses->id_trainner;?>"> 
                            <input type="hidden" id="class_induction" name="class_induction" value=""> 
                            </div>
                            </div>
                          </div>
                            </div>
                        </div>
                    <?php endforeach; 
                }?>
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
        </div>
        <div class="well" style="background-color: #ffffff;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 zero-padding" align="left"><h2 class="zero-margin"><b style="font-family: 'Yanone Kaffeesatz', sans-serif;">TRACK YOUR RESULT</b></h2></div>
                </div>
            </div>
            <div class="container">
                <?php foreach ($packages_customer as $pkg) { ?>
                    <div class="row" style="border-bottom: 1px dashed #2C3F4E; padding: 10px;">
                        <div class="col-md-6">
                            <div><a data-toggle="modal" data-target="#modal_calendar"><strong><?php echo $pkg->name ?></strong></a></div>
                        </div>
                        <div class="col-md-6">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 zero-padding">
                                        <b>
                                            Progress :
                                            <?php 
                                                $num_total_clases = (($pkg->weekly_session)*4)*$pkg->type_package;
                                                $query = $this->db->query("SELECT COUNT(*) AS num_clases FROM scheduler_events WHERE id_student=$user_logged->id");
                                                $row = $query->row();
                                                echo "(".$row->num_clases." / ".$num_total_clases.")"; 
                                                        
                                                $porcentaje = ($row->num_clases / $num_total_clases)*100; 
                                                $style = "width: $porcentaje%";
                                                if($porcentaje > 60){
                                                  $class="progress-bar progress-bar-danger";
                                                } else {
                                                  $class="progress-bar progress-bar-success";                                                     
                                                }   
                                            ?>
                                        </b>
                                    </div>
                                    <div class="col-md-4 zero-padding" align="right"><b><?php echo number_format($porcentaje, 1, ',', '') ?>%</b></div>
                                </div>
                            </div>
                            <div class="progress progress-striped active">
                                <div class="<?php echo $class ?>"  role="progressbar" aria-valuenow="<?php echo $porcentaje ?>" aria-valuemin="0" aria-valuemax="100" style="<?php echo $style ?>">
                                    <span class="sr-only"><?php echo number_format($porcentaje, 2, ',', '') ?>% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>                
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_calendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 60%;"> 
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title">CALENDAR</h4>
                     </div>

                            <input type="hidden" id="id_trainer" name="id_trainer"> 

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
<div class="modal fade" id="modal_trainers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 60%;"> 
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title">TRAINERS</h4>
                </div>
                <div class="row" id="" style="width: 100%;margin-left: 0px!important;background-color: #ffffff;">
                <div class="col-md-9" style="padding: 0 auto; width: 95%;max-height: 700px; overflow: auto; margin: 20px;">
                    <?php 
                    $query  = $this->db->query("SELECT * FROM customers WHERE type='trainer'");
                    foreach($query->result() as $trainer){
                    ?>
                        <div class="col-md-4 classbox">
                            <a class="thumbnail linkThumb" style="border: none;">
                                <?php 
                                    $image1     = explode("{", $trainer->photo);
                                    $image2     = explode(":", $image1[2]);
                                    $image3     = explode("\"", $image2[1]);
                                    $photoUrlProfile   = $image3[1];
                                    echo '<img alt="image" class="img-circle" data-src="http://www.a3workout.com/uploads/images/full/'.$photoUrlProfile.'" style="width: 90px; height: 90px;" src="http://www.a3workout.com/uploads/images/full/'.$photoUrlProfile.'">';
                                ?>
                            </a>
                            <?php
                                $name = $trainer->firstname." ".$trainer->lastname;
                                echo "<a  onclick=\"location.href='http://www.a3workout.com/index.php/".$trainer->username."'\"><b>".$name."</b></a><br /><p style='text-align:justify; font-size:11px'>".substr($trainer->bio,0,90)."...<p>";
                             ?>   
                        </div>
                    <?php } ?>
                </div>
            </div> 
            </div>
        </div>
</div>

<div class="modal fade" id="modal_trainers_induction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 60%;"> 
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title">TRAINERS</h4>
                </div>
                <div class="row" id="">
                <div class="col-md-9" style="padding: 0 auto; width: 95%;max-height: 700px; overflow: auto; margin: 20px;">
                    <?php 
                    $query  = $this->db->query("SELECT * FROM customers WHERE type='trainer'");
                    foreach($query->result() as $trainer){
                    ?>
                        <div class="col-md-4 classbox">
                            <a class="thumbnail linkThumb" style="border: none;">
                                <?php 
                                    $image1     = explode("{", $trainer->photo);
                                    $image2     = explode(":", $image1[2]);
                                    $image3     = explode("\"", $image2[1]);
                                    $photoUrlProfile   = $image3[1];
                                    echo '<img alt="image" class="img-circle" data-src="http://www.a3workout.com/uploads/images/full/'.$photoUrlProfile.'" style="width: 90px; height: 90px;" src="http://www.a3workout.com/uploads/images/full/'.$photoUrlProfile.'">';
                                ?>
                            </a>
                            <?php
                                $name = $trainer->firstname." ".$trainer->lastname;
                                echo "<a  onclick=\"location.href='http://www.a3workout.com/index.php/".$trainer->username."?type=6558' \"><b>".$name."</b></a><br /><p style='text-align:justify; font-size:11px'>".substr($trainer->bio,0,90)."...<p>";
                             ?>   
                        </div>
                    <?php } ?>
                </div>
            </div> 
            </div>
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
                    <?php echo form_open_multipart('secure/student/'. $user_logged->id, 'role="form"');?>
                        <div id="body_edit_profile" class="well content-tabs-modal" style="background-color: transparent; border: none;">
                            <div class="row">
                                <div class="col-md-4" align="center">
                                    <?php
                                    if($user_logged->photo != "false"){
                                        $image1     = explode("{", $user_logged->photo);
                                        $image2     = explode(":", $image1[2]);
                                        $image3     = explode("\"", $image2[1]);
                                        $photoUrlEditProfile   = $image3[1];
                                    }else $photoUrlEditProfile = '';?>
                                    <img id="image_profile_click" src="<?php echo base_url("uploads/images/full/". (($photoUrlEditProfile) ? $photoUrlEditProfile : 'user.png'));?>" alt="Trainer Photo" class="img-circle img-responsive edit-photo-responsive grises tester" style="cursor: pointer;">
                                    <input type="file" style="visibility:hidden;" name="upload_profile" id="upload_profile" />
                                </div>
                                <div class="col-md-8" align="center">
                                    <?php
                                    if($user_logged->front != "false"){
                                        $image1     = explode("{", $user_logged->front);
                                        $image2     = explode(":", $image1[2]);
                                        $image3     = explode("\"", $image2[1]);
                                        $frontUrlEditProfile   = $image3[1];
                                    }else $frontUrlEditProfile = '';?>
                                    <div id="image_front_click" class="header-coach-image-inside header-profile grises" style="background-image: url(<?php echo base_url("uploads/images/full/". (($frontUrlEditProfile) ? $frontUrlEditProfile : 'user.png'));?>); background-position: center; height: 137px; cursor: pointer;"></div>
                                    <input type="file" style="visibility:hidden;" name="upload_front" id="upload_front" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bio">Biography</label>
                                <textarea name="bio" id="bio" class="form-control" placeholder="Enter biography"><?php echo $user_logged->bio;?></textarea>
                            </div>
                        </div>

                        <div id="body_edit_info" class="well content-tabs-modal" style="background-color: transparent; border: none; display:none;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $user_logged->email;?>" placeholder="Enter E-mail" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">User Name</label>
                                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $user_logged->username;?>" placeholder="Enter User Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $user_logged->firstname;?>" placeholder="Enter First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $user_logged->lastname;?>" placeholder="Enter Last Name">
                                    </div>
                                    <div>
                                        <label for="cellphone">Cell Phone</label>
                                        <input type="numeric" class="form-control" name="cellphone" id="cellphone" value="<?php echo $user_logged->cell_phone;?>" placeholder="Enter Cell Phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="birthday">Birthday</label>
                                        <div class='input-group date' id='birthday'>
                                            <input type='text' class="form-control" id="birthday" name='birthday' value="<?php echo $user_logged->birthday;?>" />
                                            <span class="input-group-addon">
                                                <img src="<?php echo base_url('assets/img/calendar_icon.png');?>" style="width:20px;height:20px">
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
                                <?php $query = $this->db->query("SELECT c.country_id as codigo, cu.id as id_countries, cu.name from customers c inner join countries cu on c.country_id = cu.id where c.country_id = '".$user_logged->country_id."' and c.id = '".$user_logged->id."'");

                                foreach ($query->result() as $key ) {
                                    $key;
                                      ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="f_country_id">Country</label>
                                        <select name="country_id" id="f_country_id" class="form-control">
                                            <option value="<?php echo $key->codigo?>"><?php echo $key->name;}?></option>
                                            <?php $query = $this->db->query("SELECT cu.id, cu.name from countries cu");

                                foreach ($query->result() as $key ) {
                                    $key;
                                      ?>

                                            <option value="<?php echo $key->id?>"><?php echo $key->name;}?></option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" value="<?php echo $user_logged->city;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="zip">Zip Code</label>
                                        <input type="text" class="form-control" name="zip" id="zip" value="<?php echo $user_logged->zip;?>" placeholder="Enter Zip Code">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $user_logged->address;?>" placeholder="Enter Address">
                                    </div>
                                    <div class="form-group">
                                        <label for="cellphone">Phone</label>
                                        <input type="numeric" class="form-control" name="phone" id="phone" value="<?php echo $user_logged->phone;?>" placeholder="Enter Phone">
                                    </div>
                                    <div class="form-group" style="vertical-align: bottom;">
                                        <input type="checkbox" id="email_subscribe" name="email_subscribe" value="1" <?php echo set_radio('email_subscribe', '1', TRUE); ?>>
                                        &nbsp;
                                        <label for="email_subscribe"/><?php echo lang('account_newsletter_subscribe');?></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="body_edit_training_experinces" class="well content-tabs-modal" style="background-color: transparent; border: none; display:none;">
                            <div class="form-group">
                                <label for="experiences">Experiences</label>
                                <textarea name="experiences" id="experiences" class="form-control" placeholder="Enter Experiences"><?php echo $user_logged->experiences;?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="education">Education</label>
                                <textarea name="education" id="education" class="form-control" placeholder="Enter Education"><?php echo $user_logged->education;?></textarea>
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
                    var char    = $(this).val();

                    _vivo.arca(cnx, function(response){
                        response.exec("{{<?php echo Crypt::encode("SELECT * FROM categories WHERE type = 1 AND name LIKE ")?>}}'%"+ char +"%'", function(response){
                            
                            var data    = $.parseJSON(Crypt.decode(response));
                                options = "";
                            
                            for(var iData in data){
                                options     += '<option value="'+ data[iData][0] +'">'+ data[iData][2] +'</option>';
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


</div>


<?php include('footer.php');?>