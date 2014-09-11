_expReg = function(pattern){
	return {
		find: function(finded){
			return {
				first: function(char){
					return new RegExp("^["+char+"]", 'g').test(finded);
				},
				last: function(char){
					return new RegExp("["+char+"]$", 'g').test(finded);
				},
			};
		}
	};
};

_ajax = function(params, callback){
	var xmlhttp = (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
	var jsonVars = (params.params)?params.params:false;
	var urlVars = "";

	if(jsonVars){
		for(var iParams in jsonVars){
			urlVars += iParams+"="+jsonVars[iParams]+"&";
		};
	};
	
	xmlhttp.open(params.method, params.open, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	callback(xmlhttp);
	xmlhttp.send(urlVars);
	
	return;
};
var response = {
	xmlhttp: function(xmlhttp, callback){
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 2){
				document.getElementById('loading').style.display = "block";
			}else if (xmlhttp.readyState==4 && xmlhttp.status==200){
				if(xmlhttp.responseText){
					callback(xmlhttp.responseText);
				}
			}else if (xmlhttp.readyState == 4){
				throw new exception("XMLHTTPRequest loaded with status: " + xmlhttp.status);
			}else if (xmlhttp.status==404)
				alert("Error 404!");
		};
	}
};

var _vivo = (
	function(){
		
		return {
			arca: function(cnx, callback){
				var cnx_ = (cnx) ? cnx:false;
				
				var cnxJSON = {
					method: "POST",
					open: '/gocart/themes/default/assets/procedures/db.php',
					params: {
						mode: 'cnx',
						cnx: cnx_,
					},
				};
				
				return _ajax(cnxJSON, function(xmlhttp){
						response.xmlhttp(xmlhttp, function(text){
							callback({
								connect: text,
								exec: function(args, qryCallback){
									var qryJSON = {
										method: "POST",
										open: '/gocart/themes/default/assets/procedures/db.php',
										params: {
											mode: 'query',
											cnx: cnx_,
											args: args,
										},
									};

									return _ajax(qryJSON, function(xmlhttp){
										response.xmlhttp(xmlhttp, function(text){
											qryCallback(text);
										});
									});
								}
							});
						});
					}
				);
			},
		};
	}
)();