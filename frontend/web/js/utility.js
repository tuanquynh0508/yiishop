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

Number.prototype.docSo = function() {
	var n = this;
	return docso(n);
};

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

// Convert Number to So Tieng Viet
// http://www.kimkha.com/2010/03/giai-thuat-oi-tu-so-sang-chu-tieng-viet.html
var mangso = ['không', 'một', 'hai', 'ba', 'bốn', 'năm', 'sáu', 'bảy', 'tám', 'chín'];
function dochangchuc(so, daydu)
{
	var chuoi = "";
	chuc = Math.floor(so / 10);
	donvi = so % 10;
	if (chuc > 1) {
		chuoi = " " + mangso[chuc] + " mươi";
		if (donvi == 1) {
			chuoi += " mốt";
		}
	} else if (chuc == 1) {
		chuoi = " mười";
		if (donvi == 1) {
			chuoi += " một";
		}
	} else if (daydu && donvi > 0) {
		chuoi = " lẻ";
	}
	if (donvi == 5 && chuc > 1) {
		chuoi += " lăm";
	} else if (donvi > 1 || (donvi == 1 && chuc == 0)) {
		chuoi += " " + mangso[ donvi ];
	}
	return chuoi;
}
function docblock(so, daydu)
{
	var chuoi = "";
	tram = Math.floor(so / 100);
	so = so % 100;
	if (daydu || tram > 0) {
		chuoi = " " + mangso[tram] + " trăm";
		chuoi += dochangchuc(so, true);
	} else {
		chuoi = dochangchuc(so, false);
	}
	return chuoi;
}
function dochangtrieu(so, daydu)
{
	var chuoi = "";
	trieu = Math.floor(so / 1000000);
	so = so % 1000000;
	if (trieu > 0) {
		chuoi = docblock(trieu, daydu) + " triệu";
		daydu = true;
	}
	nghin = Math.floor(so / 1000);
	so = so % 1000;
	if (nghin > 0) {
		chuoi += docblock(nghin, daydu) + " nghìn";
		daydu = true;
	}
	if (so > 0) {
		chuoi += docblock(so, daydu);
	}
	return chuoi;
}
function docso(so)
{
	if (so == 0)
		return mangso[0];
	var chuoi = "", hauto = "";
	do {
		ty = so % 1000000000;
		so = Math.floor(so / 1000000000);
		if (so > 0) {
			chuoi = dochangtrieu(ty, true) + hauto + chuoi;
		} else {
			chuoi = dochangtrieu(ty, false) + hauto + chuoi;
		}
		hauto = " tỷ";
	} while (so > 0);
	return chuoi;
}