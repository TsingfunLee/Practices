/**
 * 
 */
window.onload = changeTab();

var settingsObj = [ {
	"no" : "0000AAAA",
	"group" : "分组1"
}, {
	"screenMode" : "landscape",
	"outputType" : "type1"
} ];

function openWindow() {
	var popWindow = document.getElementById('popWindow'), mask = document
			.getElementById('mask');
	popWindow.style.display = "block";
	mask.style.display = "block";
}

function closeWindow() {
	var popWindow = document.getElementById('popWindow'), mask = document
			.getElementById('mask');
	popWindow.style.display = "none";
	mask.style.display = "none";
}

function changeTab() {
	var tabs = document.getElementsByClassName("tab")[0]
			.getElementsByTagName("h4");

	for (var i = 0, len = tabs.length; i < len; i++) {
		tabs[i].index = i;
		tabs[i].onclick = function() {
			showTab(this, len, tabs);
		};
	}
}

function showTab(tab, len, tabs) {
	var contents = document.getElementsByClassName("settings");

	for (var i = 0; i < len; i++) {
		tabs[i].className = "inactive";
		contents[i].style.display = "none";
	}
	tab.className = "";
	contents[tab.index].style.display = "block";
}

function getNo() {
	// 从服务器获取编号
	// var no = document.getElementById('no-input').value;
	// normalSettings.no = no;
}

function enabledInputSettings() {
	var chb = document.getElementById('enabled-chb');
	var output = document.getElementsByClassName('output')[0];
	var radios = output.getElementsByTagName('input');
	var select = output.getElementsByTagName('select')[0];
	if (chb.checked) {
		radios[1].disabled = "";
		radios[2].disabled = "";
		select.disabled = "";
	} else {
		radios[1].disabled = "disabled";
		radios[2].disabled = "disabled";
		select.disabled = "disabled";
	}
}

function addCookie(name, value, expireHours) {
	var cookieString = name + "=" + escape(value);
	// 判断是否设置过期时间
	if (expireHours > 0) {
		var date = new Date();
		date.setTime(date.getTime + expireHours * 3600 * 1000);
		cookieString = cookieString + "; expire=" + date.toGMTString();
	}
	document.cookie = cookieString;
}

function getAllData() {
	var group = document.getElementById('group'), screenMode = document
			.getElementsByName('screenmode'), outputType = document
			.getElementById('output-type'), checkedIndex = 0;

	settingsObj[0].group = group.options[group.options.selectedIndex].text;

	for (var i = 0; i < screenMode.length; i++) {
		if (screenMode[i].checked) {
			checkedIndex = i;
			break;
		}
	}
	settingsObj[1].screenMode = screenMode[checkedIndex].value;

	settingsObj[1].outputType = outputType.options[outputType.options.selectedIndex].text;
}

function save() {
	// 获得数据保存到JSON
	getAllData();
	// 存储到cookie
	var normalSettings = JSON.stringify(settingsObj[0]), outputSettings = JSON
			.stringify(settingsObj[1]);
	addCookie('normalSettings', normalSettings, 0);
	addCookie('outputSettings', outputSettings, 0);
	closeWindow();
	cookiestring = unescape(document.cookie);
	console.log(cookiestring)
}