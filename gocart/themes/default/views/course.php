
            <?php include('header.php'); 

            $cart_contents = $this->session->userdata('cart_contents');
            
            $induction = $cart_contents['customer']['induction'];
             foreach($courses_row1->result() as $courses): $courses->id_trainner.','.$courses->id_course.','.$courses->type;endforeach;
           
            ?>
<script>
    $("#arrow_left")
      .mouseup(function() {
        $( this ).append( "<span style='color:#f00;'>Mouse up.</span>" );
      })
      .mousedown(function() {
        $( this ).append( "<span style='color:#00f;'>Mouse down.</span>" );
      });
</script>
</script>
 <style type="text/css">

 .tabclass{
border: 1px solid #c5c5c5; 
border-radius: 5px; padding: 
15px; width: 95%;margin-bottom: 
20px; background:#fff; 
 }
 
 .ticker{width:98%; height: 74px;border: 1px solid #DCDCDC; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; padding: 25px 0px;}
 .classbox{
 padding:10px;margin-right: 10px; 
 margin-bottom: 10px; 
 overflow: hidden;
border-radius: 5px; 
width: 205px; 
height:288px;
border: 1px solid #ccc;}

 ul.checkfilter{padding:0px !important;}
 ul.checkfilter li{list-style:none;}
 
 .a3w-box>div{padding:3px 0px;}

 .selectpicker{width: 80%;
height: 27px;
margin: 12px;
display: inline-block;
height: 32px;
padding: 4px 6px;
margin-bottom: 10px;
margin-bottom: 10px;
font-size: 14px;
line-height: 20px;
color: #A8A8A8;
vertical-align: middle;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;}

.contentslide{
width:98%; 
border: 1px solid #DCDCDC; 
border-bottom-left-radius: 
5px; border-bottom-right-radius: 5px; 
padding: 25px 0px;
padding: 25px 14px;
margin-bottom: 12px;
background: #fff;
}

.carousel.slide img {
    width:100%;
    height:auto;
}

.carousel-control.right {
background-position: 0 0;
left: auto;
right: 10px;
}

.carousel-control {
background: url("http://www.a3workout.com/shop/themes/leometr/css/../img/default/bt-next-prev.png") no-repeat scroll 0 bottom transparent !important;
border: 3px solid #ffffff;
-webkit-border-radius: 23px;
-moz-border-radius: 23px;
border-radius: 23px;
height: 23px;
left: auto;
margin: 0;
opacity: 1;
filter: alpha(opacity=100);
padding: 0;
right: 38px;
text-indent: -9999em;
top: -52px !important;
width: 23px;
overflow: hidden;
}

.carousel-control:hover, .carousel-control:focus {
background-image: url(../images/bt-next-prev-hover.png);
}

.carousel-control.right {
background-position: 0 0;
left: auto;
right: 10px;
}

.product_label{margin:0 40%;}

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
    #courseName{
        margin:5px 0;
           }
a #courseName:hover,  a #courseName:focus {color: #0a374a;text-decoration: none;}
a #courseName {color: #e32322;text-decoration: none;}
b #courseName:hover,   b #courseName:focus {color: #0a374a;text-decoration: none;}
b #courseName {color: #e32322;text-decoration: none;}
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
              
                intervalos+="<b  onclick=\"inscription_class(this,"+id_trainer+","+id_student+",'"+date+"',1,'"+horario+"')\">AVAILABLE</b>"
              
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
        var id_trainer = id_trainer2;  
        var id_student = $("#customer_id").val();
        var name_student = $("#name_student").val();
        $('.dia').remove();
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

                            $("#"+fecha).empty();

                            $("#"+fecha).append("<div class='group_class' id='"+name_campo+"' class='btn btn-lg btn-danger' data-toggle='popover' onclick=\"mostrar_popover('"+name_campo+"','"+nombre_trainer+"','"+nombre_curso+"','"+id_trainer+"','"+id_student+"','"+type+"','"+date+"','"+id_course+"')\">GROUP CLASS</div>");
                            

                        }
                        else if(this['type'] == 3){ 
                           $("#"+this['fecha']).html("<div class='busy' style='background-color: #0a374a; onclick=\"go_to_class('"+this['id_trainer']+"','"+id_student+"','"+this['fecha']+"','"+name_student+"');\" title='"+this['firstname']+" "+this['lastname']+"'>"+this['firstname']+" "+this['lastname']+"</div>"); 
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
        

        if(confirm("Would you like to sign up for the following class?: "+date)){
             
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
        } 
    }


        function inscription_class(element,id_trainer,id_student,date,type,fecha){

       

        var id_student = $("#customer_id").val();
        var induction = $("#class_induction").val();
        var variables = $("#id_trainer").val();
   
                              var elem = date.split('-');
                              ano = elem[0];
                              mes = elem[1];
                              dia = elem[2];
                              var elem2 = dia.split(' ');

                              dia = elem2[0];
                              hour = elem2[1];

                              date = mes+'-'+dia+'-'+ano+' '+hour;

                             
       

        if(confirm("aWould you like to sign up for the following class?: "+date)){
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
                               location.reload();
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
                                 location.reload();
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
    function verSemana(id_trainer2){    
        var fecha=new Date();
        //document.getElementById("calendario").innerHTML+="<div class='dia'><div>HORARIO<br>"+horarioDisponible+"</div>"+verHorario(horarioDisponible, periodo, true, fecha)+"</div>";
        $('.hora').remove();
        document.getElementById("calendario").innerHTML+="<div class='hora'>"+verHorario(horarioDisponible, periodo, true, fecha)+"</div>";
        cargar_datos(fecha,id_trainer2);
        for(var i=0; i<7; i++){

            verDia(fecha,id_trainer2);
            document.getElementById("calendario").innerHTML+="<div class='dia'>"+verHorario(horarioDisponible, periodo, false, fecha)+"</div>";        
            fecha.setDate(fecha.getDate()+1);
            
        }
    }  


 function buscargroup(valorCaja2){

    var valor = valorCaja2;

     var id_student = $("#customer_id").val();

        $.ajax({
                data:  {valor:valor},
                url:   'processGroup',
                type:  'POST',
                    beforeSend: function () {
                        $("#resultado").html("Processing, please wait...");
                },
                success:  function (response) {
                 
                    var obj = $.parseJSON(response); 
                        var cantidad = obj.length;
					   $("#resultado").empty(); //remueve el contenido de "#resultado", en este caso el texto "Processing, please wait..."
                       // $("#resultado").append("<?php $cantidad='"+cantidad+"';echo $cantidad;?>"); //agrega la cantidad al contenedor "#resultado"
					   console.log("<?php $cantidad='"+cantidad+"';echo $cantidad;?>"); //console.log es util para ver datos en la consola en vez de escribirlos en el html, facilita el debug y la visualizacion
                        if(obj == ''){
                            location.reload();
                        }
					   
                                 $.each(obj, function() {
                        
                        var image = this['images'];
                        var name = this['nombre_obj'];
                        var id = this['id_course'];
                        var id_trainer = this['id_trainner'];
                        var type = this['tipo'];
                        var username = this['username'];
                        var name_trainer = this['firstname']+' '+this['lastname'];
                       var images = image.slice(49,85); 

                        var date = this['data'];


                   

                         //se usa el metodo append() de jquery para agregar los divs como hijos del contenedor "#resultado". 
             //el metodo html() no sirve en este caso ya que cada llamado a html() sobre escribe el contenido del contenedor

                           

             if(id_student == ''){
                         $("#resultado").append("<div class='col-md-4 classbox' id='curso'><a data-toggle='modal' data-target='#modal_description_class' onclick='descriptionClass(<?php echo $courses->id_course;?>);' class='thumbnail linkThumb' style='border: none;cursor: pointer;'><img src='<?php echo base_url('uploads/images/thumbnails/"+images+"');?>' style='width:auto; height:150px;'/><h5 style='margin:5px 0;'><b id='courseName'>"+name+"</b></h5></a><a onclick=\"location.href='http://www.a3workout.com/index.php/"+username+"'\"><div class='entrenador' style='cursor: pointer;'>by "+name_trainer+"</div></a><div class='container' style='padding-left: 0;''><div class='pull-right'><div class='row'><a data-toggle='modal' href='#modal_check_courses' class='btn btn-primary' onclick='check_courses_shop("+id+");'>Check</a></div></div></div></div>"); 
                       }else{
                        $("#resultado").append("<div class='col-md-4 classbox' id='curso'><a  data-toggle='modal' data-target='#modal_description_class' onclick='descriptionClass(<?php echo $courses->id_course;?>);' class='thumbnail linkThumb' style='border: none;cursor: pointer;'><img src='<?php echo base_url('uploads/images/thumbnails/"+images+"');?>' style='width:auto; height:150px;'/><h5 style='margin:5px 0;'><b id='courseName'>"+name+"</b></h5></a><a onclick=\"location.href='http://www.a3workout.com/index.php/"+username+"'\"><div class='entrenador' style='cursor: pointer;'>by "+name_trainer+"</div></a><div class='container' style='padding-left: 0;''><div class='pull-right'><div class='row'><a class='btn btn-success' data-toggle='modal' data-target='#modal_calendar'  data-id='"+id_trainer+','+id+','+type+"'  onClick =\"one('"+type+"','"+date+"','"+id_trainer+"','"+id+"');\">Enroll</a></div></div></div></div><input type='hidden' id='class_induction' name='class_induction' value='<?php echo $induction;?>'><input type='hidden' id='id_trainer' name='id_trainer' value='<?php echo $courses->id_trainner.','.$courses->id_course.','.$courses->type;?>'>"); 
                       }
                      });
                                   
                }
        });

 }




function buscarCategories(valorCaja1){

     var valor = valorCaja1;
     var id_student = $("#customer_id").val();
              
        $.ajax({
                data:  {valor:valor},
                url:   'processCategories',
                type:  'POST',
                    beforeSend: function () {
                        $("#resultado").html("Processing, please wait...");
                },
                success:  function (response) {
                    var json = '';
                    var obj = $.parseJSON(response);
                     $("#resultado").empty(); 

                          if(obj == ''){
                             $("#resultado").append("There are no courses in this category."); 
                             
                          }else{

                             $.each(obj, function() {
                        var image = this['images'];
                        var name = this['name'];
                        var id = this['id'];
                        var id_trainer = this['id_trainer'];
                        var id_course = this['id_course'];
                        var type = this['tipo'];
                        var username = this['username'];
                        var date = this['data'];
                        var name_trainer = this['firstname']+' '+this['lastname'];


                        

                       var images = image.slice(49,85);

                       filter = "filtro";



                        if(id_student == ''){
                            $("#resultado").append("<div class='col-md-4 classbox' id='curso'><a data-toggle='modal' data-target='#modal_description_class' onclick='descriptionClass(<?php echo $courses->id_course;?>);' class='thumbnail linkThumb' style='border: none;cursor: pointer;'><img src='<?php echo base_url('uploads/images/thumbnails/"+images+"');?>' style='width:auto; height:150px;'/><h5 style='margin:5px 0;'><b id='courseName'>"+name+"</b></h5></a><a onclick=\"location.href='http://www.a3workout.com/index.php/"+username+"'\"><div class='entrenador' style='cursor: pointer;'>by "+name_trainer+"</div></a><div class='container' style='padding-left: 0;''><div class='pull-right'><div class='row'><a data-toggle='modal' href='#modal_check_courses' class='btn btn-primary' onclick='check_courses_shop("+id+");'>Check</a></div></div></div></div>"); 
                          }else{
                              $("#resultado").append("<div class='col-md-4 classbox' id='curso'><a  data-toggle='modal' data-target='#modal_description_class' onclick='descriptionClass(<?php echo $courses->id_course;?>);' class='thumbnail linkThumb' style='border: none;cursor: pointer;'><img src='<?php echo base_url('uploads/images/thumbnails/"+images+"');?>' style='width:auto; height:150px;'/><h5 style='margin:5px 0;'><b id='courseName'>"+name+"</b></h5></a><a onclick=\"location.href='http://www.a3workout.com/index.php/"+username+"'\"><div class='entrenador' style='cursor: pointer;'>by "+name_trainer+"</div></a><div class='container' style='padding-left: 0;''><div class='pull-right'><div class='row'><a class='btn btn-success' data-toggle='modal' data-target='#modal_calendar'  data-id='"+id_trainer+','+id+','+type+"' onClick =\"one('"+type+"','"+date+"','"+id_trainer+"','"+id_course+"');\">Enroll</a></div></div></div></div><input type='hidden' id='class_induction' name='class_induction' value='<?php echo $induction;?>'><input type='hidden' id='id_trainer' name='id_trainer' value='<?php echo $courses->id_trainner.','.$courses->id_course.','.$courses->type;?>'>"); 

                          }

                           });

                          }
                   }
        });
}



function buscarTrainers(valorCaja1){

     var valor = valorCaja1;
     var id_student = $("#customer_id").val();
              
        $.ajax({
                data:  {valor:valor},
                url:   'processTrainers',
                type:  'POST',
                    beforeSend: function () {
                        $("#resultado").html("Processing, please wait...");
                },
                success:  function (response) {
                    var json = '';
                    var obj = $.parseJSON(response);
                     $("#resultado").empty(); 

                            if(obj == ''){
                            location.reload();
                        }else{

                             $.each(obj, function() {
                        var image = this['images'];
                        var name = this['name'];
                        var id_trainer = this['id_trainer'];
                        var id_course = this['id_course'];
                        var type = this['tipo'];
                        var date = this['data'];
                        var username = this['username'];
                        var name_trainer = this['firstname']+' '+this['lastname'];

                    

                       var images = image.slice(49,85);

                       filter = "filtro";

                        if(id_student == ''){
                            $("#resultado").append("<div class='col-md-4 classbox' id='curso'><a data-toggle='modal' data-target='#modal_description_class' onclick='descriptionClass(<?php echo $courses->id_course;?>);' class='thumbnail linkThumb' style='border: none;cursor: pointer;'><img src='<?php echo base_url('uploads/images/thumbnails/"+images+"');?>' style='width:auto; height:150px;'/><h5 style='margin:5px 0;'><b id='courseName'>"+name+"</b></h5></a><a onclick=\"location.href='http://www.a3workout.com/index.php/"+username+"'\"><div class='entrenador' style='cursor: pointer;'>by "+name_trainer+"</div></a><div class='container' style='padding-left: 0;''><div class='pull-right'><div class='row'><a data-toggle='modal' href='#modal_check_courses' class='btn btn-primary' onclick='check_courses_shop("+id_course+");'>Check</a></div></div></div></div>"); 
                          }else{
                              $("#resultado").append("<div class='col-md-4 classbox' id='curso'><a data-toggle='modal' data-target='#modal_description_class' onclick='descriptionClass(<?php echo $courses->id_course;?>);' class='thumbnail linkThumb' style='border: none;cursor: pointer;'><img src='<?php echo base_url('uploads/images/thumbnails/"+images+"');?>' style='width:auto; height:150px;'/><h5 style='margin:5px 0;'><b id='courseName'>"+name+"</b></h5></a><a onclick=\"location.href='http://www.a3workout.com/index.php/"+username+"'\"><div class='entrenador' style='cursor: pointer;'>by "+name_trainer+"</div></a><div class='container' style='padding-left: 0;''><div class='pull-right'><div class='row'><a class='btn btn-success' data-toggle='modal' data-target='#modal_calendar'  data-id='"+id_trainer+','+id_course+','+type+"' onClick =\"one('"+type+"','"+date+"','"+id_trainer+"','"+id_course+"');\" >Enroll</a></div></div></div></div><input type='hidden' id='class_induction' name='class_induction' value='<?php echo $induction;?>'><input type='hidden' id='id_trainer' name='id_trainer' value='<?php echo $courses->id_trainner.','.$courses->id_course.','.$courses->type;?>'> "); 

                          }

                           });

                          }
                   }
        });
}



function buscarNombre(valorCaja1){

     var valor = valorCaja1;
     var id_student = $("#customer_id").val();
              
        $.ajax({
                data:  {valor:valor},
                url:   'process',
                type:  'POST',
                    beforeSend: function () {
                        $("#resultado").html("Processing, please wait...");
                },
                success:  function (response) {
                    var json = '';
                    var obj = $.parseJSON(response); 
                    $("#resultado").empty();
                    filter = "filtro";
                        if(obj == ''){
                            location.reload();
                        }else{
                            $.each(obj, function() {
                        var image = this['images'];
                        var name = this['name'];
                        var id_trainer = this['id_trainer'];
                        var id_course = this['id_course'];
                        var type = this['tipo'];

                        var date = this['data'];
                        var username = this['username'];
                        var name_trainer = this['firstname']+' '+this['lastname'];

                       var images = image.slice(49,85);

                       
                       
                        if(id_student == ''){
                            $("#resultado").append("<div class='col-md-4 classbox' id='curso'><a data-toggle='modal' data-target='#modal_description_class' onclick='descriptionClass(<?php echo $courses->id_course;?>);' class='thumbnail linkThumb' style='border: none;cursor: pointer;'><img src='<?php echo base_url('uploads/images/thumbnails/"+images+"');?>' style='width:auto; height:150px;'/><h5 style='margin:5px 0;'><b>"+name+"</b></h5></a><div class='container' style='padding-left: 0;''><div class='pull-right'><div class='row'><a data-toggle='modal' href='#modal_check_courses' class='btn btn-primary' onclick='check_courses_shop("+id_course+");'>Check</a></div></div></div></div>"); 
                          }else{
                               $("#resultado").append("<div class='col-md-4 classbox' id='curso'><a data-toggle='modal' data-target='#modal_description_class' onclick='descriptionClass(<?php echo $courses->id_course;?>);' class='thumbnail linkThumb' style='border: none;cursor: pointer;'><img src='<?php echo base_url('uploads/images/thumbnails/"+images+"');?>' style='width:auto; height:150px;'/><h5 style='margin:5px 0;'><b id='courseName'>"+name+"</b></h5></a><a onclick=\"location.href='http://www.a3workout.com/index.php/"+username+"'\"><div class='entrenador' style='cursor: pointer;'>by "+name_trainer+"</div></a><div class='container' style='padding-left: 0;''><div class='pull-right'><div class='row'><a class='btn btn-success' data-toggle='modal' data-target='#modal_calendar'  data-id='"+id_trainer+','+id_course+','+type+"' onClick =\"one('"+type+"','"+date+"','"+id_trainer+"','"+id_course+"');\" >Enroll</a></div></div></div></div><input type='hidden' id='class_induction' name='class_induction' value='<?php echo $induction;?>'><input type='hidden' id='id_trainer' name='id_trainer' value='<?php echo $courses->id_trainner.','.$courses->id_course.','.$courses->type;?>'> "); 

                          }
                           });
                        }
                    }
        });
}


   $(document).on("click", ".btn-success", function () {

                                 var myBookId = $(this).data('id');
                                 $(" #id_trainer").val( myBookId );
                            });


$('#m2').on('shown', function () {
    $('.modal-backdrop').addClass('backdrop-yellow');
});

$( document ).ready(function(){console.log("ready");
	$('#valor1').change(function(){
        buscargroup($('#valor1').val());
    });$('#valor2').change(function(){
        buscarNombre($('#valor2').val());
      }); $('#valor3').change(function(){
        buscarCategories($('#valor3').val());
    }); $('#valor4').change(function(){
        buscarTrainers($('#valor4').val());
    });$('#price').change(function(){
        buscargroup($('#price').val());
    });
});

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



                           if(date == null){
                        date = '';
                       }else{
                          var elem = date.split('-');
                              ano = elem[0];
                              mes = elem[1];
                              dia = elem[2];
                              var elem2 = dia.split(' ');

                              dia = elem2[0];
                              hour = elem2[1];

                              date = mes+'-'+dia+'-'+ano+' '+hour;
                       }


                       var images = image.slice(49,85);



                            $("#description").append("<div class='col-md-13' id='curso'><div class='well box-profile' align='center' style='margin-top: 110px'><img src='<?php echo base_url('uploads/images/thumbnails/"+images+"');?>' style='border: 10px solid #FFF;width:200px!important;margin-top: -125px; border-color:#E7E7E7;border-radius: 6px!important;'><b><h3 class='text-bold'>"+name+"</h3><b><h3 style='color: #e32322;'>"+date+"</h3><b><h5 style='color: #e32322;'> by "+name_trainer+"</h3><p class='text-md-small' align='justify' style='font-size: 0.6em;'>"+description+"</p></div></div></div>"); 
                       
                           });                            
                }
        });
} 

function one(valor,valor2,valor3,valor4){



                              var type = valor;
                              var date = valor2;
                              var id_trainer = valor3;
                              var id_course = valor4;




                              param(valor,valor2,valor3,valor4);
                              verSemana(id_trainer);
                            }

  $(document).on("click", ".btn-success", function () {

                                 var myBookId = $(this).data('id');
                                 $(" #id_trainer").val( myBookId );
                            });

                          
    function param(valor,valor2,valor3,valor4){

                                var type = valor;
                              var date = valor2;
                              





                              var id_trainer = valor3;
                              var id_course = valor4;
                              var banderin = 6;
                                var id_student = $("#customer_id").val();
                                
                                var induction =$('#class_induction').val();
                              var banderin = 6;
                                var id_student = $("#customer_id").val();
                                
                                var induction =$('#class_induction').val();

                                
                               if(valor==2){

                                
                                     $.ajax({
                data:  {type:type,date:date,banderin:banderin,id_trainer:id_trainer,id_course:id_course,id_student:id_student,induction:induction},
                url:   'inscription_class',
                type:  'POST',

                success:  function (response) {
                     is_number = isNaN(response);
                   if(is_number == false){



                              var elem = date.split('-');
                              var ano = elem[0];
                              var mes = elem[1];
                              var dia1 = elem[2];
                              var elem2 = dia1.split(' ');
                              var dia = elem2[0];
                              var hour = elem2[1];


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
<!--filter group-->
<div class="row" style="margin: 2em 0em;">
     <div class="col-md-3" id="grand">



         <div class="a3w-box">
                        <h4 align="center" class="title-box">Search one by one or group</h4>
                        <div align="left">
                             <div class="filter">

                     

                     <select id="valor1"  style="width: 80%;" class="selectpicker">
                     <option value ="">Select</option> 
                     <?php  foreach($courses_row2->result() as $courses):?>
                     <option value="<?php echo $courses->id_group?>"><?php echo $courses->groupname;endforeach;?></option>
                    </select>   
                 </div>
            </div>
        </div>


<!--filter categories-->

         <div class="a3w-box">
                        <h4 align="center" class="title-box">Search categories</h4>
                        <div align="left">
                             <div class="filter">

                              <?php $query1 = $this->db->query("SELECT * FROM categories");?>
                     

                     <select id="valor3"  style="width: 80%;" class="selectpicker">
                     <option>Select</option> 
                     <?php  foreach($query1->result() as $categories):?>
                     <option value="<?php echo $categories->id?>"><?php echo $categories->name;endforeach;?></option>
                    </select>   
                 </div>
            </div>
        </div>



<!--filter trainers-->
         <div class="a3w-box">
                        <h4 align="center" class="title-box">Search trainer</h4>
                        <div align="left">
                             <div class="filter">

                              <?php $query1 = $this->db->query("SELECT * FROM customers where customers.band = '2'");?>
                     

                     <select id="valor4"  style="width: 80%;" class="selectpicker">
                     <option>Select</option> 
                     <?php  foreach($query1->result() as $trainers):?>
                     <option value="<?php echo $trainers->id?>"><?php echo $trainers->firstname.' '.$trainers->lastname;endforeach;?></option>
                    </select>   
                 </div>
            </div>
        </div>
                

                  

<!--filter courses-->

                      <div class="a3w-box">
                        <h4 align="center" class="title-box">Search course</h4>
                        <div align="left">
                             <div class="filter">
                     <select id="valor2"  style="width: 80%;" class="selectpicker">
                     <option value="0">Select course</option> 
                     <?php  foreach($courses_row1->result() as $courses):?>
                     <option value="<?php echo $courses->id_course;?>"><?php echo $courses->name;endforeach;?></option>
                    </select>   
                 </div>
            </div>
        </div>

        
                </form>
                <div class="a3w-box">
                        <h4 align="center" class="title-box">My Purchases</h4>
                        <div align="center" id="container_my_purchase">
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



<?php 

$id = $cart_contents['customer']['id'];


 $query = $this->db->query("SELECT COUNT(student_packages.id) as pack from student_packages where student_packages.id_customer='".$id."'");

 foreach ($query->result() as $key) {
    
 $key;

    }

// echo '<pre>';
// print_r($key->pack);
// exit();

          if($key->pack == 0){
            ?>
  <div class="col-md-9" id="resultado" style="padding: 10px;padding-right: 15px;padding-left: 15px; background:#fff;">
            <div class="row" id="">
                <div class="col-md-9" style="width: 100%;border: 1px dashed #222; border-left: none; border-right: none; border-top: none; margin-bottom: 20px">
                    <h2 style="color: #e32322;">UPCOMING CLASSES</h2>
                </div>
            </div>

          
                <!--div class="col-md-9 tabclass">
                    <span style="float:left"><img style="width:20px; height:20px" src="<?php echo base_url("assets/img/form_2.png");?>"></span>    
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="margin-left: 10px;"><b style="font-size:16px;font-family: 'Lato',sans-serif">TODAY, DECEMBER 3, 2013</b></span>                    
                    <!--span style="margin-left: 20%;"><img src="<?php //echo base_url("assets/img/ajax_loader.gif");?>"></span>
                    <span style="float:right"><b style="color: #e32322;font-size:14px;font-family: 'Lato',sans-serif">25 CLASSES</b></span>                            
                </div-->
        <?php foreach($courses_row1->result() as $courses):
         $entrenadorNombre = $courses->firstname;
         $entrenadorApellido = $courses->lastname;
        ?>
                        <div class="col-md-4 classbox">
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
                            
                            <h5 id="courseName"><b><?php echo $courses->name;?></b></h5> </a>

                            <a onclick="location.href='http://www.a3workout.com/index.php/<?php echo $courses->username?>'"><div class="entrenador" style="cursor: pointer;">by <?php echo $entrenadorNombre.' '.$entrenadorApellido?></div></a><p>  
                            <div class="container" style="padding-left: 0;">
                               <div class="pull-right">
                                    <div class="row">
                                         <?php if($places_left > 0){ ?>
                                         <a data-toggle="modal" href="#modal_check_courses" class="btn btn-primary" onclick="check_courses_shop(<?php echo $courses->id_course?>);">Check</a>
                                        <?php } else { ?>
                                         <a style="float:right;" class="btn btn-primary" disabled>Check</a> 
                                        <?php }?>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach?> 
</div>


            <?php
          }else{
            ?>

  <div class="col-md-9" id="resultado" style="padding: 10px;padding-right: 15px;padding-left: 15px; background:#fff;">
            <div class="row" id="">
                <div class="col-md-9" style="width: 100%;border: 1px dashed #222; border-left: none; border-right: none; border-top: none; margin-bottom: 20px">
                    <h2 style="color: #e32322;">UPCOMING CLASSES</h2>
                </div>
            </div>

          
                <!--div class="col-md-9 tabclass">
                    <span style="float:left"><img style="width:20px; height:20px" src="<?php echo base_url("assets/img/form_2.png");?>"></span>    
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="margin-left: 10px;"><b style="font-size:16px;font-family: 'Lato',sans-serif">TODAY, DECEMBER 3, 2013</b></span>                    
                    <!--span style="margin-left: 20%;"><img src="<?php //echo base_url("assets/img/ajax_loader.gif");?>"></span>
                    <span style="float:right"><b style="color: #e32322;font-size:14px;font-family: 'Lato',sans-serif">25 CLASSES</b></span>                            
                </div-->
        <?php foreach($courses_row1->result() as $courses):
        
        $entrenadorNombre = $courses->firstname;
                       $entrenadorApellido = $courses->lastname;
         $fecha = $courses->data;
        $date = str_replace(" ",".",$fecha); 
        ?>
                        <div class="col-md-4 classbox" id="groupal">
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
                            

                            <h5 id="courseName"><b><?php echo $courses->name;?></b></h5> </a>

                            <a onclick="location.href='http://www.a3workout.com/index.php/<?php echo $courses->username?>'"><div class="entrenador" style="cursor: pointer;">by <?php echo $entrenadorNombre.' '.$entrenadorApellido?></div></a><p>   
                            <div class="container" style="padding-left: 0;">
                               <div class="pull-right">
                                    <div class="row">
                                          <a class="btn btn-success" data-toggle="modal" data-target="#modal_calendar"  data-id="<?php echo $courses->id_trainner.",".$courses->id_course.",".$courses->type;?>"  onclick = "one('<?php echo $courses->type;?>','<?php echo $date; ?>','<?php echo $courses->id_trainner?>','<?php echo $courses->id_course;?>')">Enroll</a>

                              

                            <input type="hidden" id="id_trainer" name="id_trainer" value="<?php echo $courses->id_trainner.",".$courses->id_course.",".$courses->type;?>"> 
                            <input type="hidden" id="class_induction" name="class_induction" value="<?php echo $induction;?>"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach?> 
</div>



            <?php
          }
          ?>
   

      
</div> <!-- filter Edit Profile -->

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

<!--modal calendar-->
<div class="modal fade" id="modal_description_class" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 60%;"> 
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title">DESCRIPTION</h4>
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

<!-- Modal Edit Profile -->

<div class="modal" id="modal_check_courses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:70%">
        <div class="modal-content" id="modal_check">            
            <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>
</div>

<script type="text/javascript">
  $(function(){

    $('.linkThumb')
      .colorbox({
          href: function(){
              return $(this).attr('href');
          },
          height: '80%',
          width: '90%'
      });

  });
</script>
<?php include('footer.php'); ?>

