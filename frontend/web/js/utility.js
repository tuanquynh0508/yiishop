// Format Money
if (typeof Number.prototype.asCurrency === 'undefined') {
	Number.prototype.asCurrency = function(decPlaces, thouSeparator, decSeparator) {
    var n = this,
			decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 0 : decPlaces,
			decSeparator = decSeparator == undefined ? ',' : decSeparator,
			thouSeparator = thouSeparator == undefined ? '.' : thouSeparator,
			sign = n < 0 ? '-' : '',
			i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + '',
			j = (j = i.length) > 3 ? j % 3 : 0;
    return sign + (j ? i.substr(0, j) + thouSeparator : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, '$1' + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : '') + ' VNĐ';
	};
}

// Service
/**
 * Call Service
 * 
 * @param string url
 * @param string method Value is POST, GET or PUT
 * @param string dataType Value is xml, json, script, or html
 * @param object data
 * @param function sendCB
 * @param function successCB
 * @param function failCB
 */
function callService(url, method, dataType, data, sendCB, successCB, failCB) {	
	$.ajax({
		url: url,
		method: method,
		data: data,
		dataType: dataType,
		cache: false,
		beforeSend: function() {
			if($.isFunction(sendCB)) {
				sendCB();
			}
		},
		success: function(data, textStatus, xhr) {
			if($.isFunction(successCB)) {
				successCB(data);
			}
		},
		error: function(xhr, textStatus, errorThrown) {
			if($.isFunction(failCB)) {
				failCB(data);
			}
		}
	});
}