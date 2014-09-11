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
min-height: 40px;
max-height: 130px;}
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
        width: 269px !important;
        min-height:430px !important;
        border: 1px solid #ccc;
        text-align: center;
    }
    #calendario_cabecera{
        width: 97.5%;
        text-align: center;
        margin: 0 0 25px 60px;
    }
    #calendario{
        /*border: 1px solid red;*/
        width: 100%;
        height: 500px;
        overflow: auto;
        text-align: center;
    }
    #description_cabecera{
        width: 97.5%;
        text-align: center;
    }
    #description{
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
    .descriptiName{
        float: left;
        width: 100%;
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
a:link {text-decoration:none}
a:visited {text-decoration:none}
a:hover{text-decoration:none}
a:active{text-decoration:none}
a {
color: #0a374a;
text-decoration: none;
}
a:hover, a:focus {
color: #e32322;
text-decoration: none;
}a#punter {
color: #e32322;
text-decoration: none;
}
a#punter:hover, a#punter:focus {
color: #0a374a;
text-decoration: none;
}
</style>
<script  type="text/javascript">
 //slider cursos
 	$(document).ready(function(){
	
	$('.slider2').bxSlider({
    slideWidth: 210,
	slideHeight: 300,
    minSlides: 3,
    maxSlides: 3,
    slideMargin: 15,
	responsive: true
  });
	$('.slider1').bxSlider({
    slideWidth: 274,
    minSlides: 2,
    maxSlides: 2,
    slideMargin: 0
  });
  
  
});


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
        var variables = $("#id_trainer").val();
        var id_trainer = variables.slice(0,2);
        var id_course = variables.slice(3,5);
        var type = variables.slice(6,7);
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
  
    function cargar_datos(fecha,id_trainer){
  

     
        var Mes = new String(fecha.getMonth()); 
        Mes = parseInt(Mes)+1;
        var horario = (fecha.getYear()+1900)+"-"+Mes+"-"+fecha.getDate(); 
        var id_trainer = id_trainer;
        $('.dia').remove();
        var id_trainerString = id_trainer.split(",");
        for (var i in id_trainerString) {
            id_trainerString = id_trainerString[i];
           }



      var id_student = $("#customer_id").val();
                
   

        var name_student = $("#name_student").val();
        $.ajax({
                data:  {id_trainer:id_trainer,id_student:id_student,horario:horario},
                url:   'charge_student_class',
                type:  'post',
                success:  function (response) { 

                    var obj = $.parseJSON(response); 

                    $.each(obj, function() { 

                        id_vs = this['id_student'];
                        var id_student = $("#customer_id").val();

                     

                            if(this['band'] == 1){
                           
                            if(this['type'] == 3){
                         
                            
                           if(this['induction'] == 0){

                           

                                $("#"+this['fecha']).html("<div class='busy' style='background-color:#57A349' onclick=\"go_to_class('"+this['id_trainer']+"','"+id_student+"','"+this['fecha']+"','"+name_student+"');\" title='"+this['firstname']+" "+this['lastname']+"'>"+this['firstname']+" "+this['lastname']+"</div>"); 
                           } else{
                            
                                $("#"+this['fecha']).html("<div class='busy' style='background-color: #0a374a; onclick=\"go_to_class('"+this['id_trainer']+"','"+id_student+"','"+this['fecha']+"','"+name_student+"');\" title='"+this['firstname']+" "+this['lastname']+"'>"+this['firstname']+" "+this['lastname']+"</div>"); 
                           }
                        } 

                        }else{
                            if(this['type'] == 1){

                        
                           if(this['induction'] == 0){
                                $("#"+this['fecha']).html("<div class='busy' style='background-color:#57A349' onclick=\"go_to_class('"+this['id_trainer']+"','"+id_student+"','"+this['fecha']+"','"+name_student+"');\" title='"+this['firstname']+" "+this['lastname']+"'>"+this['firstname']+" "+this['lastname']+"</div>"); 
                           } else{
                                $("#"+this['fecha']).html("<div class='busy' onclick=\"go_to_class('"+this['id_trainer']+"','"+id_student+"','"+this['fecha']+"','"+name_student+"');\" title='"+this['firstname']+" "+this['lastname']+"'>"+this['firstname']+" "+this['lastname']+"</div>"); 
                           }
                        }
                        else if(this['type'] == 2){ 
                               
                               

                            var fecha = this['fecha'];
                            var date = this['date']; 

                            var nombre_curso = this['nombre_curso'];
                            var id_course = this['id_course'];
                            var id_trainer = this['id_trainer']; 
                            var id_student = this['id_student']; 
                            var type = this['type'];
                             date = date.replace('-','');
                             date = date.replace('-','');
                             date = date.replace(':','');
                             date = date.replace(':','');
                             date = date.replace(' ','');

                            var nombre_trainer = this['firstname']+' '+this['lastname'];
                            var name_campo = "group_"+fecha;
                            
                            $("#"+fecha).html("<div class='group_class' id='"+name_campo+"' class='btn btn-lg btn-danger' data-toggle='popover' onclick=\"mostrar_popover('"+name_campo+"','"+nombre_trainer+"','"+nombre_curso+"','"+id_trainer+"','"+id_student+"','"+type+"','"+date+"','"+id_course+"')\">GROUP CLASS</div>");
                            

                        }             else { 
  alert('b');
                              if(this['induction'] == 0){
                                $("#"+this['fecha']).html("<div class='busy' style='background-color:#0a374a' onclick=\"go_to_class('"+this['id_trainer']+"','"+id_student+"','"+this['fecha']+"','"+name_student+"');\" title='"+this['firstname']+" "+this['lastname']+"'>"+this['firstname']+" "+this['lastname']+"</div>"); 
                           } else{
                                $("#"+this['fecha']).html("<div class='busy' style='background-color:#0a374a' onclick=\"go_to_class('"+this['id_trainer']+"','"+id_student+"','"+this['fecha']+"','"+name_student+"');\" title='"+this['firstname']+" "+this['lastname']+"'>"+this['firstname']+" "+this['lastname']+"</div>"); 
                           }

                               
                         }  
                        }
                      }); 
                    }
                  });
                  }

    function mostrar_popover(name_campo,nombre_trainer,nombre_curso,id_trainer,id_student,type,date,id_course){
        var btn2 = $('#'+name_campo);
       var id_stu = $("#customer_id").val();
         btn2.popover({
           trigger : 'click',
           placement : 'bottom', //placement of the popover. also can use top, bottom, left or right
           title     : '<div id="contenpover"><div style="color: #5EBDFF;font-size:18px;font-weight:bold">'+nombre_curso+'</div></div>', //this is the top title bar of the popover. add some basic css
           html      : 'true', //needed to show html of course
           content   : '<div id="popOverBox" style="color: #e32322;font-size:14px;font-weight:bold">'+nombre_trainer+'</div><div id="popOverBox" style="color: Black;font-size:14px;"></div><div class="col-md-12" style="text-align:center"><button onclick=\"go_to_class_group('+id_trainer+','+id_student+','+date+');\" class="btn btn-primary" style="font-size: 11px;">Go to class</button></div>' //this is the content of the html box. add the image here or anything you want really.
         });
    }

        function inscription_class1(id_trainer,id_student,type,date,id_course){

          
        var st_id = $("#customer_id").val();
         
            if(id_student == null || id_student != st_id){

                        var id_student = $("#customer_id").val();
            }


        var id_trainer = id_trainer;
        var id_student = id_student;
        var id_course = id_course;
        var date = date;
        var type = type;
        var bande = 1;
        var induction = $("#class_induction").val();
        

        // if(confirm("Would you like to sign up for the following class?: "+date)){
             
            var variables = {

                               id_student : id_student,
                               id_trainer : id_trainer,
                               id_course : id_course,
                               type : type,
                               date : date,
                               bande : bande,
                               induction : induction
                            };
            $.ajax({
                   data:  variables,
                   url:   'inscription_class',
                   type:  'post',
                   success:  function (response){
                            if(response == "existe_induccion"){
                               alert("You have scheduled your induction.");
                                jQuery("#contenpover").parent().remove();
                               jQuery("#popOverBox").parent().remove();
                               jQuery(".arrow").parent().remove();
                               location.reload();
                            } else if(response == "warning1"){
                               alert("You cannot schedule more classes today.");//dos clases en el dia
                            } else if(response == "warning2"){
                               alert("If you want to schedule more classes, you can buy a pack.");//no ha comprado un paquete
                            } else if(response){
                               alert("you have successfully signed for this class, please check your calendar ");
                               jQuery("#contenpover").parent().remove();
                               jQuery("#popOverBox").parent().remove();
                               jQuery(".arrow").parent().remove();
                               location.reload();
                               $('#modal_calendar').modal('hide');
                               $("#"+fecha).html("<div class='busy'>BUSY</div>");
                               
                            } else {
                                alert("We are currently experiencing difficulties. Please try again later.");
                            }                            
                   }   
                });
        // } 
    }


        function inscription_class(element,id_trainer,id_student,date,type,fecha){

        
        var date = date.split('-');
        mes = date[1]; 
        dia = date[2].substr(0,2);
        dia = dia.replace(' ','');
        ano = date[0];
        var hour = date[2].split(' ');
        hour = hour[1];
        var date = mes+"-"+dia+"-"+ano+" "+hour;

       
     
        var induction = $("#class_induction").val();
        var variables = $("#id_trainer").val();
        // if(confirm("Would you like to sign up for the following class?: "+date)){
            var variables = {

                               id_student : id_student,
                               date : date,
                               variables : variables,
                               induction : induction
                            };
            $.ajax({
                   data:  variables,
                   url:   'inscription_class',
                   type:  'post',
                   success:  function (response){
                            if(response == "existe_induccion"){
                               alert("You have scheduled your induction.");
                            } else if(response == "exi_t"){
                               alert("You cannot schedule the class, it's busy for other student");//dos clases en el dia
                               $("#"+fecha).html("<div class='busy'>BUSY</div>");
                            } else if(response == "no_group"){
                               alert("You cannot schedule the class, is a group class .");//dos clases en el dia
                               location.reload();
                            }else if(response == "warning1"){
                               alert("You cannot schedule more classes today.");//dos clases en el dia
                            } else if(response == "warning2"){
                               alert("If you want to schedule more classes, you can buy a pack.");//no ha comprado un paquete
                            } else if(response){
                               alert("you have successfully signed for this class, please check your calendar ");
                               $("#"+fecha).html("<div class='busy'>BUSY</div>");
                                // location.reload();
                              } else {
                                alert("We are currently experiencing difficulties. Please try again later.");
                                // location.reload();
                            }                            
                   }   
                });
        // } 
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

  var name = $("#name_student").val();

        var r = fecha;
        $("#studen_id1").val(id_trainer);
        $("#trainer_id1").val(id_student);
        $("#username1").val(name);
        $("#r1").val(r);
        $("#form2").submit();
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
    function verSemana(id_trainer){    

        var fecha=new Date();
        //document.getElementById("calendario").innerHTML+="<div class='dia'><div>HORARIO<br>"+horarioDisponible+"</div>"+verHorario(horarioDisponible, periodo, true, fecha)+"</div>";
        $('.hora').remove();
        document.getElementById("calendario").innerHTML+="<div class='hora'>"+verHorario(horarioDisponible, periodo, true, fecha)+"</div>";
        cargar_datos(fecha,id_trainer);
        for(var i=0; i<7; i++){

        
            verDia(fecha);
            document.getElementById("calendario").innerHTML+="<div class='dia'>"+verHorario(horarioDisponible, periodo, false, fecha)+"</div>";        
            fecha.setDate(fecha.getDate()+1);

            
        }

    }

  function descriptionClass(valor1){
      
     var valor = valor1;

     $.ajax({
                data:  {valor:valor},
                url:   'process_description',
                type:  'POST',
                 
                success:  function (response) {
                    var json = '';
                    var obj = $.parseJSON(response); 
                    $("#description").empty();
                    $.each(obj, function() {
                        var image = this['images'];
                        var name = this['name'];
                        var id_trainer = this['id_trainer'];
                        var name_trainer = this['firstname']+' '+this['lastname'];
                        var description = this['description'];
                        var id_course = this['id_course'];
                        var type = this['tipo'];
                        var date  = this['data'];

                       var ano = date.substr(0,4);
                       var mes = date.substr(5,2);
                       var dia = date.substr(8,2);

                       var date = mes+"/"+dia+"/"+ano;


                       if(date == '00/00/0000'){
                        date = '';
                       }else{
                        date = mes+"/"+dia+"/"+ano;
                        
                       }

                       var images = image.slice(49,85);



                            $("#description").append("<div class='col-md-13' id='curso'><div class='well box-profile' align='center' style='margin-top: 110px'><img src='<?php echo base_url('uploads/images/thumbnails/"+images+"');?>' style='border: 10px solid #FFF;width:200px!important;margin-top: -125px; border-color:#E7E7E7;border-radius: 6px;'><b><h3 class='text-bold'><h3>"+name+"</h3><b><h3 style='color: #e32322;'>"+date+"</h3><b><h5 style='color: #e32322;'> by "+name_trainer+"</h3><p class='text-md-small' align='justify' style='font-size: 0.6em;'>"+description+"</p></div></div></div></div>"); 
                       
                           });                            
                }
        });
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
                            <p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal_edit_profile">
                                Edit Profile
                            </button>
                            </p>
                            <p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal_fitness_assessment">
                                fitness assessment
                            </button>
                            </p>
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

                foreach ($packages_customer as $key) {
                   $sku = $key->sku;
              }

                

if(empty($packages_customer)){echo'You have not purchase any package.';}else if($sku == 'Membership'){echo'You have not purchase any package.';}else{

    if(empty($packages_customeri)){?>

<div style="border-bottom: 1px dashed #2C3F4E; padding: 10px;">
                            <div align="right">
                            <a class="btn btn-success" data-toggle="modal" data-target="#modal_trainers">View trainers</a>
                            </div>
                        </div>
    <?php
    }else{
      foreach ($packages_customeri as $pkg) {



        ?>
                        <div style="border-bottom: 1px dashed #2C3F4E; padding: 10px;">
                            <div><a data-toggle="modal" style="cursor:pointer;" id="punter" data-target="#modal_description_class" onclick="descriptionClass(<?php echo $pkg->id;?>);"><strong><?php echo $pkg->courseName;?></strong></a>
                            </div>
                           <!--  <div align="right">
                            <a class="btn btn-success" data-toggle="modal" data-target="#modal_trainers">View trainers</a>
                            </div> -->
                        </div>
                <?php }
                 }
               }?>

            </div>
           <!--  <button class="btn btn-danger" style="background-color:#e32322" data-toggle="modal" data-target="#modal_calendar">MY SCHEDULE</button> -->
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
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_consultan">
                                                 CONSULTAN PROGRAM
                                              </button>
                        <?php 

                        

                               if($user_logged->induction == 0){
                               $query = $this->db->query("SELECT * FROM student_packages WHERE id_customer=".$user_logged->id);

                                //        print_r($user_logged->induction);
                                // exit();



                               if($query->num_rows() > 0){

                                    $query2 = $this->db->query("SELECT * FROM student_packages 
                                                                WHERE id_customer='".$user_logged->id."'
                                                                AND id_package=1 OR id_package = 2");


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
                        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modal_calendar">MY SCHEDULE</button> -->

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
            <div class="col-md-9 slider1" style="padding: 0 auto; padding-top: 10px; width: 618px;margin-bottom: 20px;display:inline-flex;">
                    <?php

                    if(empty($packages_customer)){


    foreach($courses_row->result() as $courses):
        $cadena = $courses->description;

                                    

                       $entrenadorNombre = $courses->firstname;
                       $entrenadorApellido = $courses->lastname;
                       $cadenaDescripcion = substr( $cadena, 0, 149 ); 



                       ?>
                        <div class="col-md-4 classbor slide">
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
                           <a data-toggle='modal' data-target='#modal_description_class' onclick='descriptionClass(<?php echo $courses->id_course;?>);' class='thumbnail linkThumb' style='border: none;cursor: pointer;'><img src='<?php echo base_url('uploads/images/thumbnails/"+images+"');?>' style='width:auto; height:150px;'/>
                                <?php echo $photo; ?></a>
                            
                            <a data-toggle="modal" style="cursor:pointer;" data-target="#modal_description_class" onclick="descriptionClass(<?php echo $pkg->id;?>);"><h5 style="margin:5px 0;width: 100%;height: 37px;"><b><?php echo $courses->name;?></b></h5> </a>
                             <a onclick="location.href='http://www.a3workout.com/index.php/<?php echo $courses->username?>'"><div class="entrenador" style="cursor: pointer;">by <?php echo $entrenadorNombre.' '.$entrenadorApellido?></div></a>

                            <div class="description"><?php echo $cadenaDescripcion; ?>...</div>   
                            <div class="container" style="padding-left: 0;">
                               <div class="pull-right">
                                    <div class="row">
                                         <a  data-toggle="modal" href="#modal_check_courses" class="btn btn-danger" onclick="check_courses_shop(<?php echo $courses->id_course;?>);">Check</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                     }else if($sku == 'Membership'){



    foreach($courses_row->result() as $courses):
                       $cadena = $courses->description;
                       $entrenadorNombre = $courses->firstname;
                       $entrenadorApellido = $courses->lastname;
                       $cadenaDescripcion = substr( $cadena, 0, 149 ); 



                       ?>
                        <div class="col-md-4 classbor slide">
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
                            <a onclick="location.href='http://www.a3workout.com/index.php/<?php echo $courses->username?>'"><div class="entrenador" style="cursor: pointer;">by <?php echo $entrenadorNombre.' '.$entrenadorApellido?></div></a>

                            <div class="entrenador">by <?php echo $entrenadorNombre.' '.$entrenadorApellido?></div>
                            <div class="description"><?php echo $cadenaDescripcion; ?>...</div>   
                            <div class="container" style="padding-left: 0;">
                               <div class="pull-right">
                                    <div class="row">
                                         <a  data-toggle="modal" href="#modal_check_courses" class="btn btn-danger" onclick="check_courses_shop(<?php echo $courses->id_course;?>);">Check</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                       
                     }else{ 

                     foreach($courses_row->result() as $courses): 

                       $fecha = $courses->data;
                        $date = str_replace(" ",".",$fecha); 

                    


                       $cadena = $courses->description;  
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
                            <a data-toggle="modal" data-target="#modal_description_class" onclick="descriptionClass(<?php echo $courses->id_course;?>);" class="thumbnail linkThumb" style="border: none;cursor: pointer;">
                                <?php echo $photo; ?>
                            </a>
                            <a data-toggle="modal" style="cursor:pointer;" data-target="#modal_description_class" onclick="descriptionClass(<?php echo $courses->id_course;?>);"><h5 style="margin:5px 0;width: 100%;height: 37px;"><b><?php echo $courses->name;?></b></h5></a> 
                            
                             <a onclick="location.href='http://www.a3workout.com/index.php/<?php echo $courses->username?>'"><div class="entrenador" style="cursor: pointer;">by <?php echo $entrenadorNombre.' '.$entrenadorApellido?></div></a>

                            <div class="description"><?php echo $cadenaDescripcion;?>...</div>   
                            <div class="container" style="padding-left: 0;">
                               <div class="pull-right">
                                    <div class="row">


                                    <div align="right">
                            <a class="btn btn-success" data-toggle="modal" data-target="#modal_calendar"  data-id="<?php echo $courses->id_trainner.",".$courses->id_course.",".$courses->type;?>"  onclick = "param('<?php echo $courses->type;?>','<?php echo $date; ?>','<?php echo $courses->id_trainner?>','<?php echo $courses->id_course;?>')">Enroll</a> <input type="hidden" id="class_induction" name="class_induction" value="<?php echo $user_logged->induction;?>"><input type="hidden" id="id_trainer" name="id_trainer" value="<?php echo $courses->id_trainner.",".$courses->id_course.",".$courses->type;?>"> 


                            <script type="text/javascript">
                              $(document).on("click", ".btn-success", function () {
                                var myBookId = $(this).data('id');
                                $(" #id_trainer").val( myBookId );
                            });


                    function param(valor,valor2,valor3,valor4){
        
                              var type = valor;
                              var date = valor2;

                          

                                var ano = date.substr(0,4);
                                var mes = date.substr(5,2);
                                var dia = date.substr(8,2);
                                var hour = date.substr(11,8);

                                 
      
                       var date = mes+"-"+dia+"-"+ano+" "+hour;
                              var id_trainer = valor3;
                              // alert(id_trainer);
                              var id_course = valor4;
                              var banderin = 6;
                                var id_student = $("#customer_id").val();
                                
                                var induction =$('#class_induction').val();

                             
                               if(valor==2){
                                 // confirm('If you want to register a class, it will appear marked on your calendar? '+date+'');

                       
                            
                 $.ajax({
                data:  {type:type,date:date,banderin:banderin,id_trainer:id_trainer,id_course:id_course,id_student:id_student,induction:induction},
                url:   'inscription_class',
                type:  'POST',
                    beforeSend: function () {
                        $("#resultado").html("Processing, please wait...");
                },
                success:  function (response) {
                    var json = '';
                    var obj = $.parseJSON(response);
                   

                          }
                        }); 
                       
                               } verSemana(id_trainer);

                            }




                            </script>

                           
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
                <?php 
                if(empty($packages_customer)){
                }else{
                    foreach ($packages_customer as $pkg) { 

                   
                    }
                    
                    if($pkg->sku == 'Membership'){

                    }else{
                        foreach ($packages_customer as $pkg) { 
                        ?>
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
                                                $num_total_clases = ($pkg->weekly_session);
                                                
                                                $query = $this->db->query("SELECT COUNT(*) AS num_clases FROM scheduler_events WHERE id_student=$user_logged->id and scheduler_events.id_course  is not null");
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
                <?php }
                }
            }?>
        </div>
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
                </div>
            </div>
        </div>
</div>



<!--modal description-->
<div class="modal fade" id="modal_description_class" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 60%;"> 
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title" style="text-align:center;">DESCRIPTION</h4>
                     </div>


                <div class="modal-body"> 
                    <div id="description_cabecera">
                        <div class="hora">&nbsp;</div>
                    </div><br />
                    <div id="description"></div>
                </div>
            </div>
        </div>
</div>

<!--modal trainer-->
<div class="modal fade" id="modal_trainers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 60%;"> 
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title">TRAINERS</h4>
                </div>
                <div class="row " id="" style="width: 100%;margin-left: 0px!important;background-color: #ffffff;">
                <div class="col-md-9 slider2" style="padding: 0 auto; width: 95%;max-height: 700px; overflow: auto; margin: 20px;">
                    <?php 
                    $query  = $this->db->query("SELECT * FROM customers WHERE band='2'");
                    foreach($query->result() as $trainer){
                    ?>
                        <div class="col-md-4 classbox slide" style="min-width:200px !important;">
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
<!--modal trainer induction-->
<div class="modal fade" id="modal_trainers_induction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 60%;"> 
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title" style="text-align:center">TRAINERS</h4>
                </div>
                <div class="row" id="" style="width: 100%;margin-left: 0px!important;background-color: #ffffff;">
                <div class="col-md-9 slider2" style="padding: 0 auto; width: 95%;max-height: 700px; overflow: auto; margin: 20px;">
                    <?php 
                    $query  = $this->db->query("SELECT * FROM customers WHERE band='2'");
                    foreach($query->result() as $trainer){
                    ?>
                        <div class="col-md-4 classbox slide" style="min-width:200px !important;">
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

<!--modal consultant-->
<div class="modal fade" id="modal_consultan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 60%;"> 
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title" style="text-align:center">COLSUNTANT</h4>
                </div>
                <div class="row" style="width: 100%;margin-left: 0px!important;background-color: #ffffff;">
                <div class="col-md-9" style="padding: 0 auto; width: 95%;max-height: 700px; overflow: auto; margin: 20px;">
                    <?php 
                    $query  = $this->db->query("SELECT * FROM customers WHERE band = 1");
                 
                    if($query->num_rows > 0){
                          foreach($query->result() as $consultant){
                    ?>
                        <div class="col-md-4 classbox">
                            <a class="thumbnail linkThumb" style="border: none;">
                                <?php 
                                    $image1     = explode("{", $consultant->photo);
                                    $image2     = explode(":", $image1[2]);
                                    $image3     = explode("\"", $image2[1]);
                                    $photoUrlProfile   = $image3[1];
                                    echo '<img alt="image" class="img-circle" data-src="http://www.a3workout.com/uploads/images/full/'.$photoUrlProfile.'" style="width: 90px; height: 90px;" src="http://www.a3workout.com/uploads/images/full/'.$photoUrlProfile.'">';
                                ?>
                            </a>
                            <?php
                                $name = $consultant->firstname." ".$consultant->lastname;
                                echo "<a  onclick=\"location.href='http://www.a3workout.com/index.php/".$consultant->username."' \"><b>".$name."</b></a><br /><p style='text-align:justify; font-size:11px'>".substr($consultant->bio,0,90)."...<p>";
                             ?>   
                        </div>
                    <?php } 
                }else{ echo 'Don´t have Consultant';}?>
                </div>
            </div> 
            </div>
        </div>
</div>


    <!-- Modal fitness_assessment -->
<div class="modal fade" id="modal_fitness_assessment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 60%;"> 
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title" style="text-align:center">FITNESS ASSESSMENT</h4>
                </div>
                <?php echo form_open_multipart('secure/step2_form2/'. $user_logged->id, 'role="form"');?>
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
                                                                       WHERE id_customer=$user_logged->id ORDER BY Id DESC limit 1");
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
                                <input type="text" class="form-control" name="method_of_contact_call_day" id="method_of_contact_call_day" value="<?php echo $method_of_contact_call_day;?>">                               
                            </div> 
                        </div>
                       
                                                          <div class="row">                  
                                                              <div class="col-md-4 text-md-small">                                                                                                                                                           
                                                                  <strong>Height</strong>
                                                                  <input type="text"  class="form-control" id="height" name="height" value="<?php echo $height;?>" placeholder="Enter height" >
                                                              </div> 
                                                              <div class="col-md-4 text-md-small">
                                                                  <strong>Current Weight</strong>
                                                                  <input type="text"  class="form-control" id="current_weight" name="current_weight" value="<?php echo $current_weight;?>"  placeholder="Enter current weight" >
                                                              </div> 
                                                              <div class="col-md-4 text-md-small">
                                                                  <strong>Ideal Weight</strong>
                                                                  <input type="text"  class="form-control" id="ideal_weight" name="ideal_weight" value="<?php echo $ideal_weight;?>"  placeholder="Enter ideal weight" >
                                                              </div> 
                                                          </div>
                                                         

                      <div class="row">
                            <div class="col-md-6">
                                <label class="text-medium">Pants size<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="pant_size" name="pant_size" value="<?php echo $pant_size;?>" placeholder="Enter pants size">
                            </div> 
                            <div class="col-md-6">
                                <label class="text-medium">Dress size (if applicable)</label>
                                <input type="text" class="form-control" id="dress_size" name="dress_size"value="<?php echo $dress_size;?>"  placeholder="Enter dress size">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-medium">Current activity level:<span class="text-danger">*</span></label>
                                <div class="col-md-12" style="padding-left: 0px">
                                    <label>
                                      <input type="radio" name="current_activity" id="current_activity_level1" value="Low" checked>
                                      <label class="text-medium">Low</label>
                                    </label>
                                    &nbsp;&nbsp;
                                    <label>
                                      <input type="radio" name="current_activity" id="current_activity_level2" value="Moderate">
                                      <label class="text-medium">Moderate</label>
                                    </label>
                                    &nbsp;&nbsp;
                                    <label>
                                      <input type="radio" name="current_activity" id="current_activity_level3" value="High">
                                      <label class="text-medium">High</label>
                                    </label>
                                </div> 
                            </div>
                        </div>
                                                          <div class="row">
                                                              <div class="col-md-12">                                
                                                                  <strong>Explain here</strong>
                                                                  <input type="text"  class="form-control" name="explain_current_activity" id="explain_current_activity" value="<?php echo $explain_current_activity;?>">                               
                                                              </div> 
                                                          </div>
                                                          <!-- <div class="row">
                                                              <div class="col-md-12"> -->                                
                                                                  <input type="hidden" value="<?php echo date("Y-m-d"); ?>" />
                                                              <!-- </div> 
                                                          </div> -->
                                                          <div class="row">
                                                              <div class="col-md-3 text-md-small">
                                                                  <strong>Chest</strong>
                                                                  <input type="text" class="form-control" id="chest" name="chest" value="<?php echo $chest;?>" placeholder="Enter chest">
                                                              </div>                                                                                   
                                                              <div class="col-md-3 text-md-small">
                                                                  <strong>Arms</strong>
                                                                  <input type="text" class="form-control" id="arms" name="arms" value="<?php echo $arms;?>" placeholder="Enter arms">
                                                              </div>
                                                              <div class="col-md-3 text-md-small">
                                                                  <strong>Waist</strong>
                                                                  <input type="text" class="form-control" id="waist" name="waist"  value="<?php echo $waist;?>"  placeholder="Enter waist">
                                                              </div>
                                                              <div class="col-md-3 text-md-small">
                                                                  <strong>Hips</strong>
                                                                  <input type="text" class="form-control" id="hips" name="hips" value="<?php echo $hips;?>" placeholder="Enter hips">
                                                              </div>  
                                                          </div>
                                                          <div class="row">
                                                              <div class="col-md-3 text-md-small">
                                                                  <strong>Thigh</strong>
                                                                    <input type="text" class="form-control" id="thigh" name="thigh" value="<?php echo $thigh;?>" placeholder="Enter thigh">
                                                              </div>                        
                                                              <div class="col-md-3 text-md-small">
                                                                  <strong>Calf</strong>
                                                                  <input type="text" class="form-control" id="calf" name="calf" value="<?php echo $calf;?>" placeholder="Enter calf">
                                                              </div>                        
                                                              <div class="col-md-3 text-md-small">
                                                                  <strong>Neck</strong>
                                                                  <div style="padding-left: 0px;"></div>
                                                                   <input type="text" class="form-control" id="neck" name="neck" value="<?php echo $neck;?>" placeholder="Enter neck">
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
                                 <input type="text"  class="form-control" name="question_optional3" id="question_optional3" value="<?php echo $question_optional3;?>"                              
                            </div>     
                        </div>
                        <div class="row">
                            <div class="col-md-12">                                
                                <label class="text-medium">What external factors have derailed you in the past?: Time, Money, No Facility, Procrastination, Lack of
                                Support, Discipline, Accountability, Lack of Expertise, other<span class="text-danger">*</span></label>
                               <input type="text"  class="form-control" name="question_optional4" id="question_optional4" value="<?php echo $question_optional4;?>">                                 
                            </div>      
                        </div>
                        <div class="row">
                            <div class="col-md-12">                                
                                <label class="text-medium">Do you have any bad health habits? ie: smoke, drink, drugs, fast food<span class="text-danger">*</span></label>
                                 <input type="text"  class="form-control" name="question_optional5" id="question_optional5" value="<?php echo $question_optional5;?>">    
                            </div> 
                        </div>  
                                                          
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>  

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                                      </fieldset>
                                </div>
                            </div>
                            <br />                            
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
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $user_logged->email;?>" placeholder="Enter E-mail" >
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
                                        <label for="gender">Gender</label>
                                     <?php $query = $this->db->query("SELECT c.gender from customers c  where c.id = '".$user_logged->id."'");


                                foreach ($query->result() as $key ) {
                                    $key;
                                    }
                                    
                                if(!empty($key->gender)){
                                    if($key->gender == 'Male'){?>

                                    <select id="gender" name="gender" class="form-control">
                                        <option value="<?php echo $key->gender?>" name="<?php echo $key->gender?>"><?php echo $key->gender;?></option>
                                        <option value="Female" name="Female">Female</option>
                                    </select>
                                    <?php
                                    }else{?>
                                          <select id="gender" name="gender" class="form-control">
                                         <option value="<?php echo $key->gender?>" name="<?php echo $key->gender?>"><?php echo $key->gender;?></option>
                                        <option value="Male" name="Male">Male</option>

                                    </select>
                                    <?php
                                    }
                                }else{
                                        ?>
                                    <select id="gender" name="gender" class="form-control">
                                        <option>Select your gender</option>
                                        <option value="Female" name="Female">Female</option>
                                        <option value="Male" name="Male">Male</option>
                                    </select>
                                    <?php
                                    }?>
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

                                     <div class="form-group" style="margin: 0px 0px 23px -27px;margin-top: -13px;">
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