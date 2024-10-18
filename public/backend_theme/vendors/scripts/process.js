var width = 100,
    perfData = window.performance.timing, // The PerformanceTiming interface represents timing-related performance information for the given page.
    EstimatedTime = 700, // Set to 2000ms or 2 seconds for the loader duration
    time = EstimatedTime; // Loader will now last exactly 2 seconds
    
// Percentage Increment Animation
var PercentageID = $("#percent1"),
		start = 0,
		end = 100,
		duration = time;
animateValue(PercentageID, start, end, duration);
		
function animateValue(id, start, end, duration) {
	var range = end - start,
      current = start,
      increment = end > start ? 1 : -1,
      stepTime = Math.abs(Math.floor(duration / range)),
      obj = $(id);
    
	var timer = setInterval(function() {
		current += increment;
		$(obj).text(current + "%");
		$("#bar1").css('width', current + "%");
		if (current == end) {
			clearInterval(timer);
		}
	}, stepTime);
}

// Fading Out Loadbar on Finished
setTimeout(function(){
  $('.pre-loader').fadeOut(300); // Loader fades out after 2 seconds
}, time);
