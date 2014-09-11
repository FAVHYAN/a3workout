<?php include('header.php');?>

<?php if(validation_errors()):?>
<div class="alert alert-danger">
	<a class="close" data-dismiss="alert">&times;</a>
	<?php echo validation_errors();?>
</div>
<?php endif;?>
<style>
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
        width: 400px;
    }
    .text_justify{
        font-size: 11px;
        font-weight: normal;
        line-height: 15px;
        text-align: start;
        color: gray;
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
                intervalos+="<b>AVAILABLE</b>";              
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
        var id_trainer = $("#customer_id").val();
        var name_trainer = $("#name_trainer").val();
        $.ajax({
                data:  {id_trainer:id_trainer,horario:horario},
                url:   'charge_profile_trainer_class',
                type:  'post',
                success:  function (response) { 
                    var obj = $.parseJSON(response);                   
                    $.each(obj, function() {                                                   
                        var fecha = this['fecha'];
                        if(this['type'] == 1){  
                            var induction = this['induction'];
                            var fecha = this['fecha'];
                            var date = this['fecha'];
                            var id_class = this['event_id'];
                            var firstname = this['firstname'];
                            var lastname = this['lastname'];
                            var username = this['username'];
                            var name = firstname+" "+lastname;
                            var bio1 = this['bio']; 
                            var bio2 = bio1.replace("'","´");                            
                            var bio = bio2.replace("\"","¨");
                            var obj_photo = $.parseJSON(this['photo']);   
                            $.each(obj_photo, function() { 
                                var photo = this["filename"];
                                if(induction > 0){                                    
                                   $("#"+fecha).html("<div class='busy' style='background-color:#57A349' onclick=\"popover_profile_student_class_induction('"+fecha+"','"+photo+"','"+bio+"','"+name+"','"+username+"','"+id_class+"','"+date+"','"+id_trainer+"')\" title='"+firstname+" "+lastname+"'>"+firstname+" "+lastname+"</div>"); 
                                } else{
                                    $("#"+fecha).html("<div class='busy'  onclick=\"popover_profile_student('"+fecha+"','"+photo+"','"+bio+"','"+name+"','"+username+"','"+id_class+"','"+date+"','"+id_trainer+"')\" title='"+firstname+" "+lastname+"'>"+firstname+" "+lastname+"</div>"); 
                                }
                            });
                        } else if(this['type'] == 2){  
                            var date = this['date'];                                     
                            var name_campo = "group_"+fecha;
                            $("#"+fecha).html("<div class='group_class' id='"+name_campo+"' onclick=\"popover_group_class('"+id_class+"','"+name_campo+"','"+date+"','"+id_trainer+"')\" class='btn btn-lg btn-danger' data-toggle='popover'>GROUP CLASS</div>");                                                         
                        }                          
                    });                       
                }
            });    
    }
    function go_to_class(id_trainer,id_student,fecha,name){
	    
        var r = fecha+id_trainer;
        $("#studen_id").val(id_trainer);
        $("#trainer_id").val(id_student);
        $("#username").val(name);
        $("#r").val(r);
		
        $("#form1").submit();
		
    }
	
	function go_to_class_gruop(id_trainer,id_student,fecha,name){
	  
        var r = fecha+id_trainer;
        $("#studen_id1").val(id_trainer);
        $("#trainer_id1").val(id_student);
        $("#username1").val(name);
        $("#r1").val(r);
        $("#form2").submit();
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
    function change_type_class(id_class,name_campo,date,id_trainer){
        if(confirm("Are you sure you want to change this class for group class")){
            $.ajax({
                data:  {id_class: id_class, date:date, id_trainer:id_trainer},
                url:   'change_type_class',
                type:  'post',
                success:  function (response){ 
                    if(response == "ok"){
                        var name_campo_group = "group_"+name_campo;                    
                        $("#"+name_campo).popover('destroy');
                        $("#"+name_campo).html("<div class='group_class' id='"+name_campo_group+"' onclick=\"popover_group_class('"+id_class+"','"+name_campo+"','"+date+"','"+id_trainer+"')\" class='btn btn-lg btn-danger'>GROUP CLASS</div>");                             
                
                    } else{
                        aler("An error has occurred. please try again later");
                    }
                }
            });
        }
    }
    function popover_group_class(id_class,name_campo,date,id_trainer){
        
		var btn2 = $('#'+name_campo);        
        $.ajax({
               data:  {id_class: id_class, date:date, id_trainer:id_trainer},
               url:   'students_group_class',
               type:  'post',
               success:  function (response) { 
                   var obj = $.parseJSON(response); 
                   var contenido = '<div id="popOverBox" style="font-size:14px;font-weight:bold">';
                   $.each(obj, function() { 
                       var firstname = this['firstname'];
                       var lastname = this['lastname'];
                       var username = this['username'];
                       var bio1 = this['bio']; 
                       var bio2 = bio1.replace("'","´");                            
                       var bio = bio2.replace("\"","¨");
                       var name = firstname+" "+lastname;                       
                       var obj_photo = $.parseJSON(this['photo']);   
                           $.each(obj_photo, function() { 
                               var photo = this["filename"];
                               contenido+= '<div class="row">'+ 
                                               '<div class="col-md-3">'+
                                                   '<img alt="image" class="img-circle" data-src="http://www.a3workout.com/uploads/images/full/'+photo+'"" style="width: 60px; height: 60px;" src="http://www.a3workout.com/uploads/images/full/'+photo+'"">'+
                                               '</div>'+
                                               "<div class='col-md-9 text_justify'><a  onclick=\"location.href='http://www.a3workout.com/index.php/"+username+"'\"><b>"+name+"</b></a><br />"+bio.substr(0,100)+"...</div>"+
                                           '</div><br />';
                       });
                   });
                    contenido+=     '<div class="row" style="margin-top:10px">'+ 
                                        '<div class="col-md-12" style="text-align:center">'+
                                          
											 "<button onclick=\"go_to_class_gruop('"+id_trainer+"','"+id_student+"','group_2014_8_12_05_30_00','"+username+"');\" class='btn btn-primary' style='font-size: 11px;'>Go to class</button>"+
                                        '</div>'+
                                    '</div>';
                    contenido+= '</div>';
                    btn2.popover({
                       trigger : 'click',
                       placement : 'bottom', //placement of the popover. also can use top, bottom, left or right
                       title     : '<div style="color:black;text-align:center">Group Class Details</div>', //this is the top title bar of the popover. add some basic css
                       html      : 'true', //needed to show html of course
                       content   : contenido //this is the content of the html box. add the image here or anything you want really.
                     });
               }
        });
        
    }
	
    function popover_profile_student(name_campo, photo, bio, name, username, id_class, date, id_trainer){
	    var id_trainer = $("#id_trainer").val();
        var id_student = $("#customer_id").val();
		var name_trainer = $("#name_trainer").val();
		
        var btn2 = $('#'+name_campo);
        var contenido = '<div id="popOverBox" style="font-size:14px;font-weight:bold">';
            contenido+= '<div class="row">'+ 
                            '<div class="col-md-5">'+
                                '<img alt="image" class="img-circle" data-src="http://www.a3workout.com/uploads/images/full/'+photo+'"" style="width: 90px; height: 90px;" src="http://www.a3workout.com/uploads/images/full/'+photo+'"">'+
                            '</div>'+
                            "<div class='col-md-7 text_justify'><a  onclick=\"location.href='http://www.a3workout.com/index.php/"+username+"'\"><b>"+name+"</b></a><br />"+bio.substr(0,120)+"...</div>"+
                        '</div>'+
                        '<div class="row" style="margin-top:10px">'+ 
                            '<div class="col-md-6" style="text-align:center">'+
                                "<button onclick=\"change_type_class('"+id_class+"','"+name_campo+"','"+date+"','"+id_trainer+"')\"class='btn btn-primary' style='font-size: 11px;'>Change type class</button>"+
                            '</div>'+
                            '<div class="col-md-6" style="text-align:center">'+
                                "<button onclick=\"go_to_class('75','"+id_student+"','"+date+"','"+name_trainer+"');\" class='btn btn-primary' style='font-size: 11px;'>Go to class</button>"+
                            '</div>'+
                        '</div>';
            contenido+= '</div>';
        btn2.popover({
           trigger : 'click',
           placement : 'bottom', //placement of the popover. also can use top, bottom, left or right
           title     : '<div style="color:black;text-align:center">Class Details</div>', //this is the top title bar of the popover. add some basic css
           html      : 'true', //needed to show html of course
           content   : contenido //this is the content of the html box. add the image here or anything you want really.
         });
    }
    
    function popover_profile_student_class_induction(name_campo, photo, bio, name, username, id_class, date, id_trainer ){
        var btn2 = $('#'+name_campo);
        var contenido = '<div id="popOverBox" style="font-size:14px;font-weight:bold">';
            contenido+= '<div class="row">'+ 
                            '<div class="col-md-5">'+
                                '<img alt="image" class="img-circle" data-src="http://www.a3workout.com/uploads/images/full/'+photo+'"" style="width: 90px; height: 90px;" src="http://www.a3workout.com/uploads/images/full/'+photo+'"">'+
                            '</div>'+
                            "<div class='col-md-7 text_justify'><a  onclick=\"location.href='http://www.a3workout.com/index.php/"+username+"'\"><b>"+name+"</b></a><br />"+bio.substr(0,120)+"...</div>"+
                        '</div>'+
                        '<div class="row" style="margin-top:10px">'+
                            '<div class="col-md-12" style="text-align:center">'+
                                "<button onclick=\"go_to_class('"+this['id_trainer']+"','"+this['id_student']+"','"+this['fecha']+"','"+name_trainer+"');\" class='btn btn-primary' style='font-size: 11px;'>Go to class</button>"+
                            '</div>'+
                        '</div>';
            contenido+= '</div>';
        btn2.popover({
           trigger : 'click',
           placement : 'bottom', //placement of the popover. also can use top, bottom, left or right
           title     : '<div style="color:black;text-align:center">Induction Class Details</div>', //this is the top title bar of the popover. add some basic css
           html      : 'true', //needed to show html of course
           content   : contenido //this is the content of the html box. add the image here or anything you want really.
         });
    }
    // Visualizamos la cabecera con el nombre del dia, la fecha y los intervalos de tiempo
    function verDia(fecha){
        var diasSemana=["SUNDAY", "MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY", "SATURDAY"];
        var Mes = new String(fecha.getMonth()); 
        Mes = parseInt(Mes)+1;
        var fechaDia = fecha.getDate()+"/"+Mes+"/"+(fecha.getYear()+1900);         
        //var fechaDia=fecha.getDate()+"/"+fecha.getMonth()+"/"+(fecha.getYear()+1900);
        //var dia="<div class='dia'><div>"+diasSemana[fecha.getU   TCDay()]+"<br>"+fechaDia+"</div>";
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
    <input id="r1" type="hidden" maxlength="32" size="16" value="" name="r">
</form>

<input type="hidden" id="name_trainer" name="name_trainer" value="<?php echo $user_logged->firstname." ".$user_logged->lastname;?>">
        <?php
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
                            } else $photoUrlProfile = '';?>                            
                            <img src="<?php echo base_url( "uploads/images/full/". (($photoUrlProfile) ? $photoUrlProfile : 'user.png') );?>" alt="coach-image" class="img-circle img-responsive border-image-profile">
                            <h3 class="text-bold" title="<?php echo strtoupper($user_logged->firstname);?> <?php echo strtoupper($user_logged->lastname);?>"><?php echo substr(strtoupper($user_logged->firstname), 0, 7);?>. <?php echo substr(strtoupper($user_logged->lastname), 0, 7);?>.</h3>
                            <p class="text-md-small" title="<?php echo ucwords($user_logged->quote);?>"><span class="glyphicon glyphicon-heart text-primary"></span> <?php echo substr(ucwords($user_logged->quote), 0, 46);?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5 align="right"><a data-toggle="modal" href="#modal_edit_profile" class="label label-default">Edit Profile</a></h5>
                        
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
                        <a href="#class_timetable">
                            <span class="glyphicon glyphicon-calendar"></span>
                            <span class="text-bold" style="font-size: 14px;"> &nbsp;CLASS TIMETABLE</span>
                        </a>
                    </li>
<!--                    <li>
                        <a href="#class_schedule">
                            <span class="glyphicon glyphicon-calendar"></span>
                            <span class="text-bold" style="font-size: 14px;"> &nbsp; COURSE SCHEDULE</span>
                        </a>
                    </li>-->
                    <li>
                        <a href="#videos">
                            <span class="glyphicon glyphicon-facetime-video"></span>
                            <span class="text-bold" style="font-size: 14px;"> &nbsp; VIDEOS</span>
                        </a>
                    </li>
                    <li>
                        <a href="#send_message">
                            <span class="glyphicon glyphicon-envelope"></span>
                            <span class="text-bold" style="font-size: 14px;"> &nbsp; SEND A MESSAGE</span>
                        </a>
                    </li>  
                </ul>

                <div class="tab-content" style="overflow: hidden;">                   
<!--                    <div class="tab-pane active" id="class_schedule">
                        <h5 align="right">
                            <a data-toggle="modal" href="#modal_add_course" class="label label-primary">Add Course</a>
                        </h5>
                        <h3 align="center"><strong>CLASS SCHEDULE</strong></h3>
                        <?php //foreach ($courses_trainer as $i => $course_trainer){?>
                        <div class="jumbotron zero-margin content-shadow effect-load slide" style="z-index: <?php //echo $i;?>;padding: 0;">
                            <div class="container">
                                <h5 align="right">
                                    <a data-toggle="modal" href="#modal_add_course" class="label label-default">Edit Course</a>
                                    &nbsp;&nbsp;
                                    <a data-toggle="modal" href="#modal_check_schedule_container" class="label label-default" onclick="schedule_edit_to_trainer(<?php// echo $course_trainer->id?>);">Schedules</a>
                                </h5>
                                <h4 class="a3w-text-color text-bold">Monthly Subscription</h4>
                                <h5 class="header-underline text-bold"><?php //echo $course_trainer->name;?></h5>
                                <p>
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                        <?php
                                       /* if($course_trainer->images != "false"){
                                            $image1     = explode("{", $course_trainer->images);
                                            $image2     = explode(":", $image1[2]);
                                            $image3     = explode("\"", $image2[1]);
                                            $photoUrl   = $image3[1];
                                        }else $photoUrl = '';?>
                                        <img class="media-object" src="<?php echo base_url('uploads/images/full/'. $photoUrl);?>" alt="Trainer" height="70">
                                        </a>
                                        <div class="media-body text-md-small line-height">
                                            <?php echo $course_trainer->description;*/?>
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
                                                <?php //if($cart_contents['customer']['id']){?>
                                                    <a href="http://a3workout.com/index.php/streaming/trainer/<?php //echo $cart_contents['customer']['username'].$course_trainer->id;?>" class="btn btn-success btn-lg" target="_blank">Go to class</a>
                                                <?php //}else{?>
                                                    <a class="btn btn-primary btn-lg">BUY PACKAGE</a>
                                                <?php //}?>
                                            </div>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                        <?php //}?>
                    </div>-->
                    <div class="tab-pane" id="videos">
                        <h3 align="center"><strong>UPLOAD VIDEO</strong></h3>
                        <?php echo form_open_multipart('secure/upload_video_url', 'role="form"');?>
                            <div align="center" class="form_upload_video">  
                                <div  data-dismiss="alert" class="alert alert-danger fade in" style="display: none">
                                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                    <strong>Holy guacamole!</strong>
                                    Best check yo self, you're not looking too good.
                                </div>   
                                <div align="left">
                                    <div class="form-group">
                                        <label for="url_video">Url</label>  
                                        <input type="text" class="form-control" id="url_video" name="url_video" placeholder="http://www.youtube.com/watch?v=" onchange="this.style.borderColor='#CCCCCC';" >
                                    </div>
                                    <div class="form-group">
                                        <label for="title_digital_content_add">Title</label>
                                        <input type="text" class="form-control" id="title_digital_content_add" name="title_digital_content_add" placeholder="Enter Title" onchange="this.style.borderColor='#CCCCCC';">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_digital_content_add">Description</label>
                                        <textarea id="description_digital_content_add" name="description_digital_content_add" class="form-control" placeholder="Enter Description" onchange="this.style.borderColor='#CCCCCC';"></textarea>
                                    </div>                                    
                                    <div class="form-group"> 
                                        <label style="float:right"><input type="button" value="Upload" class="btn btn-primary" onclick="upload_video_trainer();"/></label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br /><br />
                        <div id="result_upload_video" class="well">
                            <?php
                              $query = $this->db->query("SELECT * FROM videos_profile WHERE idcustomers = '".$cart_contents['customer']['id']."'");
                              foreach ($query->result() as $row){
                             ?>
                                <div id="container_video" class="media closing" style="background: #E3E3E3; padding: 5px 10px;">
                                    <div><input type="hidden" id="id_video" value="<?php echo $row->id ?>"><button type="button" class="close" onclick="delete_file(this);" aria-hidden="true">&times;</button></div>
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
                        <div id="calendario_cabecera">
                            <div class="hora">&nbsp;</div>
                        </div><br />
                        <div id="calendario"></div>
                            <script  type="text/javascript">verSemana();</script>
                        </body>
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
        
    <!-- Modal Edit Profile -->
    <div class="modal fade" id="modal_check_schedule_container" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:70%">
            <div class="modal-content" id="modal_check_schedule">            
                <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
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
                        <li><a href="#body_edit_about_me">About me</a></li>
                        <li><a href="#body_edit_social">Social</a></li>
                    </ul>
                    <?php echo form_open_multipart('secure/my_account/'. $user_logged->id, 'role="form"');?>
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
                                <label for="quote">Quote Inspirational</label>
                                <input type="text" class="form-control" name="quote" id="quote" value="<?php echo $user_logged->quote;?>" placeholder="Enter quote Inspirational">
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
                                            <input type='text' class="form-control" name='birthday' value="<?php echo $user_logged->birthday;?>" />
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
                    
                        <div id="body_edit_about_me" class="well content-tabs-modal" style="background-color: transparent; border: none; display:none;">
                            <?php 
                            $query_about_me = $this->db->query("SELECT * FROM info_trainers WHERE Id_customer = '".$user_logged->id."'");
                            $row_about_me = $query_about_me->row();
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Where were you born?</label>
                                        <input type="text" class="form-control" name="question1" id="question1" value="<?php echo $row_about_me->question1?>">
                                    </div>
                                    <div class="form-group">
                                        <label>3 words that best describe you?</label>
                                        <input type="text" class="form-control" name="question2" id="question2" value="<?php echo $row_about_me->question2?>">
                                    </div>
                                    <div class="form-group">
                                        <label>If you had a superpower, what would that be?</label>
                                        <input type="text" class="form-control" name="question3" id="question3" value="<?php echo $row_about_me->question3?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Who is your fitness inspiration?</label>
                                        <input type="text" class="form-control" name="question4" id="question4" value="<?php echo $row_about_me->question4?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Favorite work out music?</label>
                                        <input type="text" class="form-control" name="question5" id="question5" value="<?php echo $row_about_me->question5?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Favorite exercise?</label>
                                        <input type="text" class="form-control" name="question6" id="question6" value="<?php echo $row_about_me->question6?>">
                                    </div>
                                </div>
                                <div class="col-md-6">                                    
                                    <div class="form-group">
                                        <label>Least favorite exercise?</label>
                                        <input type="text" class="form-control" name="question7" id="question7" value="<?php echo $row_about_me->question7?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Favorite movie or book?</label>
                                        <input type="text" class="form-control" name="question8" id="question8" value="<?php echo $row_about_me->question8?>">
                                    </div>                                   
                                    <div class="form-group">
                                        <label>Hobbies/interest?</label>
                                        <input type="text" class="form-control" name="question9" id="question9" value="<?php echo $row_about_me->question9?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Desert island companion?</label>
                                        <input type="text" class="form-control" name="question10" id="question10" value="<?php echo $row_about_me->question10?>">
                                    </div>                                  
                                    <div class="form-group">
                                        <label>Top buccked list item?</label>
                                        <input type="text" class="form-control" name="question11" id="question11" value="<?php echo $row_about_me->question11?>">
                                    </div>  
                                    <div class="form-group">
                                        <label>Craziest thing you have ever done?</label>
                                        <input type="text" class="form-control" name="question12" id="question12" value="<?php echo $row_about_me->question12?>">
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>If we had to open your fridge right now, what would we find?</label>
                                        <input type="text" class="form-control" name="question13" id="question13" value="<?php echo $row_about_me->question13?>">
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Something that very little people know about you?</label>
                                        <input type="text" class="form-control" name="question14" id="question14" value="<?php echo $row_about_me->question14?>">
                                    </div> 
                                </div>
                            </div>
                        </div>
                    
                        <div id="body_edit_social" class="well content-tabs-modal" style="background-color: transparent; border: none; display:none;">
                            <div class="form-group">
                                <label>Facebook</label>
                                <div class="input-group date" id="birthday">
                                    <span class="input-group-addon">
                                       <img src="<?php echo base_url("assets/img/redes_face.png") ?>" style="width:20px;height:20px">
                                    </span>
                                    <input type="text" class="form-control" name="link_face" id="link_face" placeholder="https://www.facebook.com/yourname" value="<?php echo $row_about_me->link_face?>">
                                </div>   
                            </div>
                            <div class="form-group">
                                <label>Twitter</label>
                                <div class="input-group date" id="birthday">
                                    <span class="input-group-addon">
                                       <img src="<?php echo base_url("assets/img/redes_twitter.png") ?>" style="width:20px;height:20px">
                                    </span>
                                    <input type="text" class="form-control" name="link_twit" id="link_twit" placeholder="https://twitter.com/yourname" value="<?php echo $row_about_me->link_twit?>">
                                </div>  
                            </div>
                            <div class="form-group">
                                <label>Google+</label>
                                <div class="input-group date" id="birthday">
                                    <span class="input-group-addon">
                                       <img src="<?php echo base_url("assets/img/redes_google.png") ?>" style="width:20px;height:20px">
                                    </span>
                                    <input type="text" class="form-control" name="link_goo" id="link_goo" placeholder="https://plus.google.com/yourname" value="<?php echo $row_about_me->link_goo?>">
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="margin-top: -40px !important;">
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
            <?php echo form_open_multipart('secure/add_course_user/'.$cart_contents['customer']['id'], 'role="form"');?>
            <form role="form">
                <div class="modal-body">
                    <ul class="nav nav-tabs nav-tabs-modal">
                        <li class="active"><a href="#body_add_info">Info</a></li>
                        <!--li><a href="#body_add_digital_contents">Digital Contents</a></li-->
                        <!--li><a href="#body_add_seo_information">SEO Information</a></li-->
                        <li><a href="#body_add_schedule">Schedule</a></li>
                    </ul>

                    <div id="body_add_info" class="well content-tabs-modal" style="background-color: transparent; border: none;">

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

                    </div>

                    <div id="body_add_digital_contents" class="well content-tabs-modal" style="background-color: transparent; border: none; display:none;">
                        <div align="center" class="media">
                            <span class="pull-right">
                                <img class="img-circle" id="file_upload_course_add" src="assets/images/cloud_upload.png" alt="Upload" style="background: #E5E5E5; padding: 1em; cursor: pointer;">
                                <input type="file" style="display:none;" id="upload_file_course_add" />
                            </span>
                            <div class="media-body" align="left">
                                <div class="form-group">
                                    <label for="title_digital_contentç_add">Title</label>
                                    <input type="text" class="form-control" id="title_digital_content_add" name="title_digital_content_add" placeholder="Enter Title">
                                </div>

                                <div class="form-group">
                                    <label for="description_digital_content_add">Description</label>
                                    <textarea id="description_digital_content_add" name="description_digital_content_add" class="form-control" placeholder="Enter Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="upload_digital_contents_add" class="well"></div>
                    </div>
                    <div id="body_add_schedule" class="well content-tabs-modal" style="background-color: transparent; border: none; display:none;">                
                        <div class="row">
                            <div class="span8">
                                <div class="row">
                                    <div class="span2">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->

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
<?php include('footer.php');?>