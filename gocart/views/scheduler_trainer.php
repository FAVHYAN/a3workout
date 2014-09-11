<!doctype html>
<html lang="es">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
<!--    
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>-->
    <script src="<?php echo base_url('dhtmlx/scheduler/dhtmlxscheduler.js');?>" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url('dhtmlx/scheduler/ext/dhtmlxscheduler_minical.js');?>' type="text/javascript"></script>
    <script src="<?php echo base_url('dhtmlx/scheduler/ext/dhtmlxscheduler_pdf.js" type="text/javascript');?>" charset="utf-8"></script>
    <script src="<?php echo base_url('dhtmlx/scheduler/ext/dhtmlxscheduler_recurring.js" type="text/javascript');?>" charset="utf-8"></script>
    <link rel="stylesheet" href="<?php echo base_url('dhtmlx/scheduler/dhtmlxscheduler.css');?>" type="text/css" media="screen" title="no title" charset="utf-8">
	
    <script type="text/javascript" charset="utf-8">
    function update_event(id_event){
                var id_trainer = $("#id_trainer").val();
                var parametros = {
                        id_trainer:id_trainer, 
                        id_event: id_event
                     };
            $.ajax({
                    data:  parametros,
                    url:   'scheduler/insert_id_trainer',
                    type:  'post',
                    success:  function (response) {
                    }
                }); 
        }	

    function init() {
            scheduler.config.multi_day = true;

            scheduler.config.xml_date="%Y-%m-%d %H:%i";
            scheduler.config.first_hour = 0;
            scheduler.init('scheduler_here',new Date(),"week");
            scheduler.load("scheduler_trainer/data");

            var dp = new dataProcessor("scheduler_trainer/data");
            dp.action_param ="dhx_editor_status";

            dp.attachEvent("onAfterUpdate", function(sid, action, tid, response){
                    if (action == "invalid"){
                            alert(response.getAttribute("details"));
                    } else{
                        update_event(sid);
                    }
                    //alert(sid);
            });
            dp.init(scheduler);


            scheduler.attachEvent("onEventSave",function(id,data){
                            if (!data.text) {
                                    alert("Text must not be empty");
                                    return false;
                            }
                            if (data.text.length< 5) {
                                    alert("Text too small");
                                    return false;
                            }
                            return true;
                    });	

            scheduler.attachEvent("onEventCopied", function(ev) {
                dhtmlx.message("Vous avez copié l'événement : <br/><b>"+ev.text+"</b>");
                modified_event_id = ev.id;
                scheduler.updateEvent(ev.id);
             });
          scheduler.attachEvent("onEventCut", function(ev) {
                dhtmlx.message("Vous avez coupé l'événement : <br/><b>"+ev.text+"</b>");
                modified_event_id = ev.id;
                scheduler.updateEvent(ev.id);
             });

          scheduler.attachEvent("onEventPasted", function(isCopy, modified_ev, original_ev) {
                modified_event_id = null;
                scheduler.updateEvent(modified_ev.id);

                var evs = scheduler.getEvents(modified_ev.start_date, modified_ev.end_date);
                if (evs.length > 1) {
                   dhtmlx.modalbox({
                      text: "Il y a déjà un événement à ce moment ! Que voulez-vous faire ?",
                      width: "500px",
                      position: "middle",
                      buttons:["Annuler", "Modifier l'événement", "Confirmer"],
                      callback: function(index) {
                         switch(+index) {
                            case 0:
                               if (isCopy) {
                                  // copy operation, need to delete new event
                                  scheduler.deleteEvent(modified_ev.id);
                               } else {
                                  // cut operation, need to restore dates
                                  modified_ev.start_date = original_ev.start_date;
                                  modified_ev.end_date = original_ev.end_date;
                                  scheduler.setCurrentView();
                               }
                               break;
                            case 1:
                               scheduler.showLightbox(modified_ev.id);
                               break;
                            case 2:
                               return;
                         }
                      }
                   });
                }
             });

            }

            function show_minical(){
        if (scheduler.isCalendarVisible()){
            scheduler.destroyCalendar();
        } else {
            scheduler.renderCalendar({
                position:"dhx_minical_icon",
                date:scheduler._date,
                navigation:true,
                handler:function(date,calendar){
                    scheduler.setCurrentView(date);
                    scheduler.destroyCalendar()
                }
            });
        }
    }



    </script>
    <style>
        body{
            line-height: normal;
        }
        input, select
        {
            font-family: Tahoma;
            font-size: 8pt;
            color: #887A2E;
            padding: 2px;
            margin: 0px;
            height: 20px;
            width: auto;
        }
        label {
            display: -webkit-inline-box;
        }
    </style>	
</head>		
<body onload="init();" style="line-height:">
    <input type="hidden" id="id_trainer" name="id_trainer" value="<?php echo $id_customer?>">
<!--	<h1 style='width:95%; padding:20px; font-family:Tahoma;font-weight:normal;background:#f2f3f4;'>Trainer Schedule Calendar</h1>-->
	<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:600px;'>
		<div class="dhx_cal_navline">
			<div class="dhx_cal_prev_button">&nbsp;</div>
			<div class="dhx_cal_next_button">&nbsp;</div>
			<div class="dhx_cal_today_button"></div>
			<div class="dhx_cal_date"></div>
			<div class="dhx_minical_icon" id="dhx_minical_icon" onclick="show_minical()">&nbsp;</div>
			<div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
			<div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
			<div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
			<input type="button" name="print" value="print" onclick="scheduler.toPDF('http://dhtmlxscheduler.appspot.com/export/pdf')" style='position:absolute; right:272px; top:12px; padding:5px 20px;height: 32px;'>
		</div>
		<div class="dhx_cal_header">
		</div>
		<div class="dhx_cal_data">
		</div>
	</div>


	
</body>
</html>