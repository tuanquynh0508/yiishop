/*
*	jQuery TuanQuynh Tab version 1.0.0
*	Demo's and documentation:
*	i-designer.net
*
*	Copyright (c) 2015 Nguyen Nhu Tuan <tuanquynh0508@gmail.com>
*	i-designer.net
*
*	Dual licensed under the MIT and GPL licenses.
*	http://en.wikipedia.org/wiki/MIT_License
*	http://en.wikipedia.org/wiki/GNU_General_Public_License
*/
(function ($) {

	jQuery.fn.tqTab = function (options) {
		
		// Default settings:
		var defaults = {
			defaultTab: '#tab-1',
			useCookie: false,
			cookieId: 'TuanQuynhTab'
		};
		var settings = $.extend({}, defaults, options);
		
		function init(holder) {
			var defaultTab = settings.defaultTab;
			
			if(settings.useCookie === true) {
				if(typeof $.cookie(settings.cookieId) != 'undefined' && $.cookie(settings.cookieId) != null) {
					defaultTab = $.cookie(settings.cookieId);
				}
			}

			activeTab(holder, defaultTab);
			bindAction(holder);
		}
		
		function bindAction(holder) {
			$('.box-tab-head > ul > li > a', holder).click(function(e){
				e.preventDefault();
				activeTab(holder, $(this).attr('href'));
			});
		}
		
		function activeTab(holder, tabId) {
			var tabLink = $('.box-tab-head ul li', holder).find('a[href="' + tabId + '"]');
			var tabContent = $('.box-tab-content', holder).find(tabId);			
			resetStage(holder);
			tabLink.parent().addClass('active');
			tabContent.show();
			
			if(settings.useCookie === true) {
				$.cookie(settings.cookieId, tabId);
			}
		}
		
		function resetStage(holder) {
			$('.box-tab-head ul li', holder).removeClass('active');
			$('.box-tab-content > div', holder).hide();
		}
		
		return this.each(function () {
			init(this);
		});

	};

}(jQuery));