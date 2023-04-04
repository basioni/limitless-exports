/*
*	Riva Countdown
*/

(function( $ ){
	"use strict";
	$.fn.rivaCountdown = function( options ) {
		/*
		*	Vars
		*/
		var $this = this,
			year = options['year'],
			month = options['month'],
			date = options['date'],
			hour = options['hour'],
			minute = options['minute'],
			second = options['second'],
			endDate, today, mils,
			$daysValue = $this.find('#riva-countdown-days .value p'),
			$hoursValue = $this.find('#riva-countdown-hours .value p'),
			$minsValue = $this.find('#riva-countdown-minutes .value p'),
			$secsValue = $this.find('#riva-countdown-seconds .value p'),
			dividers = new Array(86400, 3600, 60, 1), rest, t,
			values = new Array($daysValue, $hoursValue, $minsValue, $secsValue),
		timer_is_on = 0;
		endDate = new Date(year, month - 1, date, hour, minute, second);
		if (!timer_is_on) {
			timer_is_on = 1;
			changeTime();
		}
		function changeTime() {
			today = new Date();
			rest = (endDate - today) / 1000;
			for (var i = 0; i < dividers.length; i++) {
				values[i].html(Math.floor(rest / dividers[i]));
				rest = rest % dividers[i];
			}
			t = setTimeout(changeTime,1000);
		}
	}
})( jQuery );