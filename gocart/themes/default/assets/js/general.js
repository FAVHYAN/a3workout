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

function upload_video_trainer(){
    var customer_id = $("#customer_id").val();
    var url_video1 = $("[name=url_video]").val();
    var title_digital_content_add = $("[name=title_digital_content_add]").val();
    var description_digital_content_add = $("[name=description_digital_content_add]").val();
    if(url_video1.indexOf("http://www.youtube.com/watch?v=") >= 0) var warning = "ok";
    else var warning = "nocontinue";
    // $(".alert").alert();
    
    if(url_video1 == ""){
        $("[name=url_video]").css("border-color","red");
    } else if(warning == "nocontinue"){
        $("[name=url_video]").css("border-color","red");
       
    } else if(title_digital_content_add == ""){        
        $("[name=title_digital_content_add]").css("border-color","red");        
    } else if(description_digital_content_add == ""){
        $("[name=description_digital_content_add]").css("border-color","red");        
    } else{
            var url_video = url_video1.replace("http://www.youtube.com/watch?v=", "//www.youtube.com/embed/")
            parametros={
                            url_video : url_video,
                            title_digital_content_add : title_digital_content_add,
                            description_digital_content_add : description_digital_content_add,
                            customer_id : customer_id
                       };
            $.ajax({
                data:  parametros,
                url:   'upload_video_trainer',
                type:  'post',
                success:  function (response) {
                        if(response){
                            var cloned = $('#container_video').clone(true);
                            cloned.find('iframe').attr('src', url_video);
                            cloned.find('.media-heading').html(title_digital_content_add);
                            cloned.find('#description_digital_content_add').html(description_digital_content_add);
                            cloned.find('#container_video').css("display","block");                   
                            cloned.find('#id_video').val(response);
                            $("#result_upload_video").prepend(cloned);
                        }
                }
            });
    }
}

function delete_file(elem){
    var id_video = $(elem).parent().find("#id_video").val();
    var parametros = {
                        id_video :id_video
                     }
    $.ajax({
                data:  parametros,
                url:   'delete_video_trainer',
                type:  'post',
                success:  function (response) {
                        if(response){
                            $(elem).parent().parent().fadeOut(function(){
                                $(this).remove();
                            });
                        } else{
                            alert("was a problem");
                        }
                }
            });
}

function check_courses_shop(id_product){
    $("#modal_check").html("<div class='modal-header'>"
                                        +"<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>"
                                 +"<h4 class='modal-title'>COURSES</h4>"
                            +"</div>"
                            +"<div class='modal-body'>"
                               +"<div class='jumbotron zero-margin content-shadow effect-load fadein' style='padding: 0px !important'>"
                                    +"<div class='container' style='text-align:center'>"
                                        +"<img src='../../assets/img/ajax_loader.gif'>"
                                    +"</di>"
                               +"</div>"
                            +"<div>");
    var parametros = {
                        id_product :id_product
                     }
    $.ajax({
                data:  parametros,
                url:   'check_courses_shop',
                type:  'post',
                success:  function (response) {
                        if(response){
                            $("#modal_check").html(response); 
                        } 
                }
            });
}

function check_courses_shop_profile(id_product){
    $("#modal_check").html("<div class='modal-header'>"
                                        +"<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>"
                                 +"<h4 class='modal-title'>COURSES</h4>"
                            +"</div>"
                            +"<div class='modal-body'>"
                               +"<div class='jumbotron zero-margin content-shadow effect-load fadein' style='padding: 0px !important'>"
                                    +"<div class='container' style='text-align:center'>"
                                        +"<img src='../../assets/img/ajax_loader.gif'>"
                                    +"</di>"
                               +"</div>"
                            +"<div>");
    var parametros = {
                        id_product :id_product
                     }
    $.ajax({
                data:  parametros,
                url:   'course/check_courses_shop',
                type:  'post',
                success:  function (response) {
                        if(response){
                            $("#modal_check").html(response); 
                        } 
                }
            });
}

function add_schedule_course_to_cart1(id,elem){  
    
    var parametros = {
                        id :id                             
                     }
    $.ajax({
                data:  parametros,
                url:   'add_schedule_course_to_cart',
                type:  'post',
                success:  function (response) {
                        if(response){
                           if("ok"){
                               actualizar_my_purchase1();
                               $('#modal_check_courses').modal('hide');
                           }
                        } 
                }
            });
}

function add_schedule_course_to_cart2(id,elem){  
    
    var parametros = {
                        id :id                             
                     }
    $.ajax({
                data:  parametros,
                url:   'secure/add_schedule_course_to_cart',
                type:  'post',
                success:  function (response) {
                        if(response){
                           if("ok"){
                               actualizar_my_purchase2();
                               $('#modal_check_courses').modal('hide');
                           }
                        } 
                }
            });
}

function add_schedule_course_to_cart(id,elem){    
    var parametros = {
                        id :id                             
                     }
    $.ajax({
                data:  parametros,
                url:   'add_schedule_course_to_cart',
                type:  'post',
                success:  function (response) {
                        if(response){
                           if("ok"){
                               actualizar_my_purchase();
                               $('#modal_check_courses').modal('hide');
                           }
                        } 
                }
            });
}

function schedule_edit_to_trainer(id_product){
    $("#modal_check").html("<div class='modal-header'>"
                                        +"<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>"
                                 +"<h4 class='modal-title'>SCHEDULES</h4>"
                            +"</div>"
                            +"<div class='modal-body'>"
                               +"<div class='jumbotron zero-margin content-shadow effect-load fadein' style='padding: 0px !important'>"
                                    +"<div class='container' style='text-align:center'>"
                                        +"<img src='../../assets/img/ajax_loader.gif'>"
                                    +"</di>"
                               +"</div>"
                            +"<div>");
    var parametros = {
                        id_product :id_product
                     };
    $.ajax({
                data:  parametros,
                url:   'schedule_edit_to_trainer',
                type:  'post',
                success:  function (response) {
                        if(response){
                            $("#modal_check_schedule").html(response); 
                        } 
                }
            });
}

function actualizar_my_purchase(){
    $.ajax({
                url:   'actualizar_my_purchase',
                success:  function (response) {
                        if(response){
                           $("#container_my_purchase").html(response);
                        } 
                }
            });
}

function actualizar_my_purchase1(){
    $.ajax({
                url:   'actualizar_my_purchase',
                success:  function (response) {
                        if(response){
                           $("#container_my_purchase").html(response);
                        } 
                }
            });
}


function actualizar_my_purchase2(){
    $.ajax({
                url:   'secure/actualizar_my_purchase',
                success:  function (response) {
                        if(response){
                           $("#container_my_purchase").html(response);
                        } 
                }
            });
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

function save_comment_profile_student(){
    var date  = "now";
    var comment_description = $("#comment_description").val();
    var id_student = $("#id_student").val();
    var id_trainer = $("#id_trainer").val();
    var parametros = {
                       comment_description : comment_description,
                       id_student : id_student,
                       id_trainer : id_trainer
                     };
    $.ajax({
            data:  parametros,
            url:   'secure/save_comment_profile_student',
            type:  'post',
            success:  function (response) {
                    if(response){
                        var obj = $.parseJSON(response);                   
                        $.each(obj, function() {                                
                                var firstname = this['firstname'];
                                var lastname = this['lastname'];
                                var username = this['username'];                                
                                var name = firstname+" "+lastname;                       
                                var obj_photo = $.parseJSON(this['photo']);   
                                    $.each(obj_photo, function() { 
                                        var photo = this["filename"];
                                        $("#comments_list").prepend(""+                                                 
                                                                '<div class="col-md-9" style="margin:0 10% 30px; margin-button:10px; border-radius: 7px; box-shadow: 5px 0 48px -26px rgba(0, 0, 0, 0.8)"> '+
                                                                    '<h5 class="header-underline text-bold">'+
                                                                        name+
                                                                        '<br />'+
                                                                        '<i style="font-size:10px;color:gray">'+date+'</i>'+
                                                                    '</h5>'+

                                                                    '<div class="media" style="margin-bottom: 10px;">'+                                            
                                                                        '<a class="pull-left" style="float:left">'+                                                   
                                                                            '<img class="media-object" src="http://www.a3workout.com/uploads/images/full/'+photo+'" alt="Trainer" width="110">'+
                                                                        '</a>'+
                                                                        '<div class="media-body text-md-small line-height" style="font-size: 12px; line-height: 15px;">'+
                                                                          comment_description+
                                                                        '</div>'+
                                                                   ' </div>'+
                                                                '</div>');       
                                });                         
                        });  
                    } else{
                        alert("was a problem");
                    }
            }
        });
}