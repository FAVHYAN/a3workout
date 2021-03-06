<?php include('header.php'); 
$group_id = null;
?>
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
        background-color: #FF0042;
        color: white;
        font-family:  verdana;
        font-size: 12px;
        font-weight: bold;
        height: 30px;
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
        height: 25px;
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
        height: 25px;
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
        height: 25px;
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
    var horarioDisponible="05:00-20:00";    // Formato del horario � HH:MM-HH:MM
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
                url:   '../../../secure/charge_profile_trainer_class',
                type:  'post',
                success:  function (response) { 
                    var obj = $.parseJSON(response);                   
                    $.each(obj, function() {                                                   
                        var fecha = this['fecha'];
                        if(this['type'] == 1){  
                            var fecha = this['fecha'];
                            var date = this['date'];
                            var id_class = this['event_id'];
                            var firstname = this['firstname'];
                            var lastname = this['lastname'];
                            var username = this['username'];
                            var name = firstname+" "+lastname;
                            var bio1 = this['bio']; 
                            var bio2 = bio1.replace("'","�");                            
                            var bio = bio2.replace("\"","�");
                            var obj_photo = $.parseJSON(this['photo']);   
                            $.each(obj_photo, function() { 
                                var photo = this["filename"];
                                $("#"+fecha).html("<div class='busy'  onclick=\"popover_profile_student('"+fecha+"','"+photo+"','"+bio+"','"+name+"','"+username+"','"+id_class+"','"+date+"','"+id_trainer+"')\" title='"+firstname+" "+lastname+"'>"+firstname+" "+lastname+"</div>"); 
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
                       var bio2 = bio1.replace("'","�");                            
                       var bio = bio2.replace("\"","�");
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
                                            "<button onclick=\"go_to_class_gruop('"+this['id_trainer']+"','"+this['id_student']+"','"+this['fecha']+"','"+name_trainer+"');\" class='btn btn-primary' style='font-size: 11px;'>Go to class</button>"+
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
    function popover_profile_student(name_campo, photo, bio, name, username, id_class, date, id_trainer ){
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
                                "<button onclick=\"go_to_class('"+this['id_trainer']+"','"+this['id_student']+"','"+this['fecha']+"','"+name_trainer+"');\" class='btn btn-primary' style='font-size: 11px;'>Go to class</button>"+
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
    // Visualizamos la cabecera con el nombre del dia, la fecha y los intervalos de tiempo
    function verDia(fecha){
        var diasSemana=["SUNDAY", "MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY", "SATURDAY"];
        var Mes = new String(fecha.getMonth()); 
        Mes = parseInt(Mes)+1;
        var fechaDia = Mes+"/"+fecha.getDate()+"/"+(fecha.getYear()+1900);        
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

<?php echo form_open($this->config->item('admin_folder').'/customers/form/'.$id); ?>
   
        <ul class="nav nav-tabs nav-tabs-modal">
            <li class="active"><a href="#body_edit_profile">Profile</a></li>
            <li><a href="#body_edit_info">Info</a></li>
            <li><a href="#body_edit_training_experinces">Training Experinces</a></li>
            <li><a href="#body_edit_about_me">About Trainer</a></li>
            <li><a href="#body_edit_social">Social</a></li>
        </ul>
            <div id="body_edit_profile" class="well content-tabs-modal" style="background-color: transparent; border: none;">
                <!--  <div class="row">
                                <div class="span5" align="center">
                                    <?php
                                    $photoUrlEditProfile = '';?>
                                    <img id="image_profile_click" src="<?php echo base_url("uploads/images/full/". (($photoUrlEditProfile) ? $photoUrlEditProfile : 'user.png'));?>" alt="Trainer Photo" class="img-circle img-responsive edit-photo-responsive grises tester" style="cursor: pointer;">
                                    <input type="file" style="visibility:hidden;" name="photo" id="photo" />
                                </div>
                            </div> -->
                            <input type="hidden" name="bandera" id="bandera" value="1"/>

                <div class="row">
                    <div class="span3">
                        <label>Consultant or Trainer</label>
                        <?php echo form_dropdown('group_id', $group_list, set_value('group_id',$group_id), 'class = "span3"');?>
                    </div>
                </div>
                <div class="form-group">

                                        <label for="gender">Gender</label>
                    <select id="gender" name="gender" class="form-control">
                                        <option>Select gender</option>
                                        <option value="Female" name="Female">Female</option>
                                        <option value="Male" name="Male">Male</option>
                                    </select>
                </div>
                <div class="form-group">
                    <label for="quote">Quote Inspirational</label>
                    <input type="text" class="form-control" name="quote" id="quote" placeholder="Enter quote Inspirational">
                </div>
                <div class="form-group">
                    <label for="bio">Biography</label>
                    <textarea name="bio" id="bio" class="form-control" placeholder="Enter biography"></textarea>
                </div>
            </div>

            <div id="body_edit_info" class="well content-tabs-modal" style="background-color: transparent; border: none; display:none;">
                <div class="row">
                    <div class="span">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email" id="email"  placeholder="Enter E-mail" >
                        </div>
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter User Name">
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Enter Last Name">
                        </div>
                        <div>
                            <label for="cell_phone">Cell Phone</label>
                            <input type="numeric" class="form-control" name="cell_phone" id="cell_phone" placeholder="Enter Cell Phone">
                        </div>
                        <div class="form-group">
                            <label for="birthday">Birthday</label>
                            <div class='input-group date' id='birthday'>
                                <input class="datepicker" type='text' class="form-control" name='birthday' />
                            </div>
                            
                        </div>


                    </div>
                    <div class="span">
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
                            <input type="text" class="form-control" name="zip" id="zip" placeholder="Enter Zip Code">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label for="cellphone">Phone</label>
                            <input type="numeric" class="form-control" name="phone" id="phone" placeholder="Enter Phone">
                        </div>
                       
                        <div class="form-group" style="vertical-align: bottom;margin: 20px 0 0 0;">
                            <input type="checkbox" id="email_subscribe" name="email_subscribe" value="1">
                            &nbsp;
                            <label for="email_subscribe"/><?php echo lang('account_newsletter_subscribe');?></label>
                        </div>


                    



                    </div>
                        <div class="row">
                                <div class="span3">
                                        <label><?php echo lang('password');?></label>
                                        <?php
                                        $data   = array('name'=>'password', 'class'=>'span3');
                                        echo form_password($data); ?>
                                </div>
                                     <div class="span3">
                                        <label><?php echo lang('confirm');?></label>
                                        <?php
                                        $data   = array('name'=>'confirm', 'class'=>'span3');
                                        echo form_password($data); ?>
                                </div>
                        </div>
                </div>
            </div>

            <div id="body_edit_training_experinces" class="well content-tabs-modal" style="background-color: transparent; border: none; display:none;">
                <div class="form-group">
                    <label for="experiences">Experiences</label>
                    <textarea name="experiences" id="experiences" class="form-control" placeholder="Enter Experiences"></textarea>
                </div>
                <div class="form-group">
                    <label for="education">Education</label>
                    <textarea name="education" id="education" class="form-control" placeholder="Enter Education"></textarea>
                </div>
            </div>         
        
            <div id="body_edit_about_me" class="well content-tabs-modal" style="background-color: transparent; border: none; display:none;">
                <?php 
                    /*$query_about_me = $this->db->query("SELECT * FROM info_trainers WHERE Id_customer = '".$user_logged->id."'");
                    $row_about_me = $query_about_me->row();*/
                ?>
                <div class="row">
                    <div class="span">
                        <div class="form-group">
                            <label>Where were you born?</label>
                            <input type="text" class="form-control" name="question1" id="question1">
                        </div>
                        <div class="form-group">
                            <label>3 words that best describe you?</label>
                            <input type="text" class="form-control" name="question2" id="question2">
                        </div>
                        <div class="form-group">
                            <label>If you had a superpower, what would that be?</label>
                            <input type="text" class="form-control" name="question3" id="question3">
                        </div>
                        <div class="form-group">
                            <label>Who is your fitness inspiration?</label>
                            <input type="text" class="form-control" name="question4" id="question4">
                        </div>
                        <div class="form-group">
                            <label>Favorite work out music?</label>
                            <input type="text" class="form-control" name="question5" id="question5">
                        </div>
                        <div class="form-group">
                            <label>Favorite exercise?</label>
                            <input type="text" class="form-control" name="question6" id="question6">
                        </div>
                    </div>
                    <div class="span">                                    
                        <div class="form-group">
                            <label>Least favorite exercise?</label>
                            <input type="text" class="form-control" name="question7" id="question7">
                        </div>
                        <div class="form-group">
                            <label>Favorite movie or book?</label>
                            <input type="text" class="form-control" name="question8" id="question8">
                        </div>                                   
                        <div class="form-group">
                            <label>Hobbies/interest?</label>
                            <input type="text" class="form-control" name="question9" id="question9">
                        </div>
                        <div class="form-group">
                            <label>Desert island companion?</label>
                            <input type="text" class="form-control" name="question10" id="question10">
                        </div>                                  
                        <div class="form-group">
                            <label>Top buccked list item?</label>
                            <input type="text" class="form-control" name="question11" id="question11">
                        </div>  
                        <div class="form-group">
                            <label>Craziest thing you have ever done?</label>
                            <input type="text" class="form-control" name="question12" id="question12">
                        </div> 
                    </div>
                    <div class="span6">
                        <div class="form-group">
                            <label>If we had to open your fridge right now, what would we find?</label>
                            <input type="text" class="form-control" name="question13" id="question13">
                        </div> 
                    </div>
                    <div class="span6">
                        <div class="form-group">
                            <label>Something that very little people know about you?</label>
                            <input type="text" class="form-control" name="question14" id="question14">
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
                        <input type="text" class="form-control" name="link_face" id="link_face" placeholder="https://www.facebook.com/yourname">
                    </div>   
                </div>
                <div class="form-group">
                    <label>Twitter</label>
                    <div class="input-group date" id="birthday">
                        <span class="input-group-addon">
                           <img src="<?php echo base_url("assets/img/redes_twitter.png") ?>" style="width:20px;height:20px">
                        </span>
                        <input type="text" class="form-control" name="link_twit" id="link_twit" placeholder="https://twitter.com/yourname">
                    </div>  
                </div>
                <div class="form-group">
                    <label>Google+</label>
                    <div class="input-group date" id="birthday">
                        <span class="input-group-addon">
                           <img src="<?php echo base_url("assets/img/redes_google.png") ?>" style="width:20px;height:20px">
                        </span>
                        <input type="text" class="form-control" name="link_goo" id="link_goo" placeholder="https://plus.google.com/yourname">
                    </div> 
                </div>
            </div>
        </div>
        <div class="modal-footer" style="margin-top: -40px !important;">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
<script type="text/javascript">
window.onload = function(){
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
}
    $('#image_profile_click').click(function(){
        $('#photo').click();
    });
    $("#photo").change(function(){
        readURL({
          elem: this,
          preview: '#image_profile_click',
          cover: 'image'//image o background-image
        });
    });//
</script>


  

<?php include('footer.php');