$(function () {
	
	responsiveNav ();
	
});

function responsiveNav () {
	var html = '';
	
	var cloned = $('#main-nav > li').clone ();
	var title='Navigate...';
	title = $('#main-nav > li.active').children("a").html();
	var container = $('<div>', { id: 'responsive-nav' });
	var items = $('<ul>', { id: 'responsive-nav-items' });
	var trigger = $('<div>', { id: 'responsive-nav-trigger', text: title });
	container.appendTo ('.navbar-inner .container');
	items.appendTo (container);
		
	items.append (cloned);
	
	items.find ('li').removeClass ('dropdown');
	items.find ('ul').removeClass ('dropdown-menu');
	items.find ('.caret').remove ();
	
	items.append (html);
	
	trigger.bind ('click', function (e) {
		items.slideToggle ();
		trigger.toggleClass ('open');
	});;
	
	trigger.prependTo (container);
}