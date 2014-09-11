<!DOCTYPE html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title></title>
</head>
	<script src="/dhtmlx/grid/dhtmlxcommon.js" 		type="text/javascript" charset="utf-8"></script>
	<script src="/dhtmlx/grid/dhtmlxgrid.js" 		type="text/javascript" charset="utf-8"></script>
	<script src="/dhtmlx/grid/dhtmlxgridcell.js" 	type="text/javascript" charset="utf-8"></script>

	<script src="/dhtmlx/dhtmlxdataprocessor.js" 	type="text/javascript" charset="utf-8"></script>
	<script src="/dhtmlx/connector/connector.js" 	type="text/javascript" charset="utf-8"></script>

	<link rel="stylesheet" href="/dhtmlx/grid/dhtmlxgrid.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="/dhtmlx/grid/skins/dhtmlxgrid_dhx_skyblue.css" type="text/css" media="screen" title="no title" charset="utf-8">

	
<body>
	<h1 style='width:95%; padding:20px; font-family:Tahoma;font-weight:normal;background:#f2f3f4;'>CodeIgniter!</h1>
	<div id="grid_here" style="width:100%; height:400px;">
	</div>
	<input type="button" value='Add' onclick='add_row();'>
	<input type="button" value='Delete selected' onclick='mygrid.deleteSelectedRows()'>

<script type="text/javascript" charset="utf-8">
	function add_row(){
		var id = mygrid.uid();
		mygrid.addRow(id, ["2010-04-01","2012-02-29","New record"]);
		mygrid.selectRowById(id);
	}
	mygrid = new dhtmlXGridObject('grid_here');
	mygrid.setImagePath("./dhtmlx/grid/imgs/");
	mygrid.setHeader("Start date,End date,Text");
	mygrid.setInitWidths("150,150,*");
	mygrid.setColTypes("ro,ro,ed");
	mygrid.setSkin("dhx_skyblue");
	mygrid.init();
	mygrid.loadXML("./data"); // => /grid/data

	var dp = new dataProcessor("./data");
	dp.action_param = "dhx_editor_status";

	dp.attachEvent("onAfterUpdate", function(sid, action, tid, xml){
		if (action == "invalid"){
			mygrid.setCellTextStyle(sid, 2, "background:#eeaaaa");
			dhtmlx.message(xml.getAttribute("details"));
		} else 
			dhtmlx.message("["+action+"] Data saved in DB");
	})
	dp.init(mygrid);
</script>

	<h3 style='width:95%; padding:20px; font-family:Tahoma;font-weight:normal;background:#f2f3f4;'>Powered by CodeIgniter + DHTMLX</h3>
</body>