function readURL(params) {
    if ( (params['elem']).files && (params['elem']).files[0] ) {
        var reader = new FileReader();
        var f = (params['elem']).files[0];
        reader.onload = function (e) {
          var spl_type = (f.type).split('/');
          switch( spl_type[0] ){
            case 'image':
              if( params['cover'] == 'image'){
                $(params['preview']).attr('src', e.target.result);
              }else if( params['cover'] == 'background-image') $(params['preview']).css('background-image', 'url('+ e.target.result +')');
            break;
          }
        }
        reader.readAsDataURL(params['elem'].files[0]);
    }
}


function save_schedule_admin(){
    var name = $("input[name='name_course']").val();
    var id_course = $("input[name='id_course']").val();
    var date_schedule = $("input[name='date_schedule']").val();
    var places_schedule  = $("input[name='places_schedule']").val();
    var starttime_1_schedule = $("input[name='starttime_1_schedule']").val();
    var starttime_2_schedule = $("input[name='starttime_2_schedule']").val();
    var finishtime_1_schedule = $("input[name='finishtime_1_schedule']").val();
    var finishtime_2_schedule = $("input[name='finishtime_2_schedule']").val();
    var price_schedule = $("input[name='price_schedule']").val();
    var saleprice_schedule = $("input[name='saleprice_schedule']").val();
    var starttime = starttime_1_schedule+":"+starttime_2_schedule+":00";
    var finishtime = finishtime_1_schedule+":"+finishtime_2_schedule+":00";
    
    if(date_schedule == ""){
        $("input[name='date_schedule']").css("border-color","red");
    } else if(places_schedule == ""){
        $("input[name='places_schedule']").css("border-color","red");
    } else if(starttime_1_schedule == ""){
        $("input[name='starttime_1_schedule']").css("border-color","red");
    } else if(starttime_2_schedule == ""){
        $("input[name='starttime_2_schedule']").css("border-color","red");
    } else if(finishtime_1_schedule == ""){
        $("input[name='finishtime_1_schedule']").css("border-color","red");
    } else if(finishtime_2_schedule == ""){
        $("input[name='finishtime_2_schedule']").css("border-color","red");
    } else if(price_schedule == ""){
        $("input[name='price_schedule']").css("border-color","red");
    } else if(saleprice_schedule == ""){
        $("input[name='saleprice_schedule']").css("border-color","red");
    } else {    
            var parametros = {
                                name : name,
                                id_course : id_course,
                                date_schedule : date_schedule,
                                places_schedule : places_schedule,
                                starttime : starttime,
                                finishtime : finishtime, 
                                price_schedule : price_schedule,
                                saleprice_schedule: saleprice_schedule
                             };
            $.ajax({
                        data:  parametros,
                        url:   '../save_schedule',
                        type:  'post',
                        success:  function (response) {
                                if(response){
                                   $("#list_schedule").append('<tr id="tr_list_schedule'+response+'"><td>'+date_schedule+'</td><td>'+places_schedule+'</td><td>'+starttime+'</td><td>'+finishtime+'</td><td>'+price_schedule+'</td><td>'+saleprice_schedule+'</td><td><a class="btn btn-danger" onclick="delete_schedule_admin('+response+')"><i class="icon-trash icon-white"></i>Delete</a></td></tr>');
                                } else{
                                    alert("I came up with a error in the log \nPlease try again");
                                }
                        }
                    }); 
    }
}

function save_packages_admin(){
    var id_course = $("#id_course").val();
    var time_package = $("#time_package").val();   
    var weekly_session = $("input[name='weekly_session']").val(); 
    var price_per_month = $("input[name='price_per_month']").val(); 
    var description1 = $("#description1").val(); 
    var total_session = (parseInt(weekly_session)*4)*parseInt(time_package);
    var total_price = parseInt(price_per_month)*parseInt(time_package);    
    alert(description1);
    
    if(weekly_session == ""){
        $("input[name='']").css("border-color","red");
    } else if(price_per_month== ""){
        $("input[name='']").css("border-color","red");
    } else {    
            var parametros = {
                                id_course : id_course,
                                time_package : time_package,
                                weekly_session : weekly_session, 
                                price_per_month : price_per_month,
                                total_session : total_session,
                                total_price : total_price,
                                description1 : description1
                             };
            $.ajax({
                        data:  parametros,
                        url:   '../save_packages',
                        type:  'post',
                        success:  function (response) {
                                if(response){
                                   $("#list_packages").append('\<tr id="tr_list_schedule'+response+'">\n\
                                                                    <td>'+time_package+' Months</td>\n\
                                                                    <td>'+weekly_session+'</td>\n\
                                                                    <td>'+price_per_month+'</td>\n\
                                                                    <td>'+description1+'</td>\n\
                                                                    
                                                                </tr>');
                                } else{
                                    alert("I came up with a error in the log \nPlease try again");
                                }
                        }
                    }); 
    }
}

function delete_schedule_admin(id_schedule){
    var parametros = {
                        id_schedule :id_schedule
                     }
    $.ajax({
                data:  parametros,
                url:   '../delete_schedule_admin',
                type:  'post',
                success:  function (response) {
                        if(response){
                            $("#tr_list_schedule"+id_schedule).fadeOut(function(){
                                $(this).remove();
                            });
                        } else{
                            alert("was a problem");
                        }
                }
            });
}



