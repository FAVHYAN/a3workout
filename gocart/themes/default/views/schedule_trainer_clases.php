<?php include('header.php'); ?>
<script>
  /*      function getMonday( date ) {
        var day = date.getDay() || 7;  
        if( day !== 1 )
            date.setHours(-24 * (day - 1));
        return date;
    }
     
    var d = new Date();
    var n = d.getDay(); 
    alert (n);*/
</script>
<div id="calendario"></div>
<html>
<head>
<title>Calendario Semanal JavaScript</title>
<style>
    div{
        /*border: 1px solid black;*/
        text-align: center;
    }
    #calendario{
        /*border: 1px solid red;*/
        width: 800px;
    }
    .dia{
        float: left;
        width: 100px;
    }
    .cabecera_calendario{
        background-color: #e32322;
        color: white;
        font-family:  verdana;
        font-size: 12px;
        font-weight: bold;
        height: 43px;
        padding-top: 12px;
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
        padding-top: 10px;
    }
    b{
        cursor: pointer;
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
        var hora=new Date();
        hora.setHours(horaApertura[0], horaApertura[1], 0);
        var intervalos="";
        while(compararHora(hora.getHours()+":"+hora.getMinutes(), auxHorario[1])){
            intervalos+="<div class='contenido_horario'>";
            if(verHorario){                
                var hours = new String(hora.getHours()); 
                if (hours.length == 1) hours = "0" + hours;
                var Minutes = new String(hora.getMinutes()); 
                if (Minutes.length == 1) Minutes = "0" + Minutes;
                intervalos+="<b style='color:black'>"+hours+":"+Minutes+"</b>";
            } else{
                var diaReserva=fecha.getMonth()+"/"+fecha.getDate()+"/"+(fecha.getYear()+1900);
                var horaReserva=hora.getHours()+":"+hora.getMinutes();
                //intervalos+="<a onClick='alert('')'>"+horaReserva+"<br>"+diaReserva+"</a>";
                var response = "avaliable";
                
                if(response == "avaliable"){                    
                    intervalos+="<b onClick=\"alert(':P')\";>Avaliable</b>";
                }
            }
            intervalos+="</div>";
            hora.setHours(hora.getHours(), hora.getMinutes()+intervalo, 0);
        }
    return intervalos;
    }
    // Visualizamos la cabecera con el nombre del dia, la fecha y los intervalos de tiempo
    function verDia(fecha){
        var diasSemana=["SUNDAY", "MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY", "SATURDAY"];
        var fechaDia=fecha.getMonth()+"/"+fecha.getDate()+"/"+(fecha.getYear()+1900);
        //var dia="<div class='dia'><div>"+diasSemana[fecha.getUTCDay()]+"<br>"+fechaDia+"</div>";
        var dia="<div class='dia'><div class='cabecera_calendario'>"+diasSemana[fecha.getUTCDay()]+"<br /></div>";
        dia+=verHorario(horarioDisponible, periodo, false, fecha);
        dia+="</div>";
        document.getElementById("calendario").innerHTML+=dia;
    }
    // Visualizamos los 7 dias siguientes al actual
    function verSemana(){
        var fecha=new Date();
        //document.getElementById("calendario").innerHTML+="<div class='dia'><div>HORARIO<br>"+horarioDisponible+"</div>"+verHorario(horarioDisponible, periodo, true, fecha)+"</div>";
        document.getElementById("calendario").innerHTML+="<div class='dia'><div style='height:43px'></div>"+verHorario(horarioDisponible, periodo, true, fecha)+"</div>";
        for(var i=0; i<7; i++){
            verDia(fecha);
            fecha.setDate(fecha.getDate()+1);
        }
    }
</script>
</head>
<body>
    <br /><br />
<div id="calendario"></div>
<script  type="text/javascript">verSemana();</script>
</body>
</html>