/* 
 * 
 */

function addTab(title, url) {
	if($('#tt').tabs('exists', title)) {
		$('#tt').tabs('select', title);
	} else {
		var content = '<iframe scrolling="auto" frameborder="0"  src="' + url + '" style="width:100%;height:100%;"></iframe>';
		$('#tt').tabs('add', {
			title: title,
			content: content,
			closable: true
		});
	}
}

// login menu
$('.login-menu').mouseenter(function() {
	$('.login-item').slideDown('fast', 'swing');
});
$('.login-menu').mouseleave(function() {
	$('.login-item').slideUp('500ms', 'swing');
})

// main menu
$('.child-item').parent().mouseenter(function() {
	$(this).children().css('display', 'block');
});
$('.child-item').parent().mouseleave(function() {
	$(this).children().css('display', 'none');
})
$('.child-item').mouseenter(function() {
	$(this).css('display', 'block');
});
$('.child-item').mouseleave(function() {
	$(this).css('display', 'none');
});