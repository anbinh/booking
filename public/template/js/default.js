/** Tiny jQuery plugin to limit textbox character
	STB (something borrowed)
 */
(function($) {
    $.fn.extend( {
        limiter: function(limit, elem) {
            $(this).on("keyup focus", function() {
                setCount(this, elem);
            });
            function setCount(src, elem) {
                var chars = src.value.length;
                if (chars > limit) {
                    src.value = src.value.substr(0, limit);
                    chars = limit;
                }
                elem.html( limit - chars );
            }
            setCount($(this)[0], elem);
        }
    });
})(jQuery);

// current timer of current lyric line (used for pausing/resuming)
var currentIndex = 0;

/** Timer class
	STB
 */
function Timer(callback, delay) {
    var timerId, start, remaining = delay;

    this.pause = function() {
    	console.log(timerId);
        window.clearTimeout(timerId);
        remaining -= new Date() - start;
    };

    this.resume = function() {
        start = new Date();
        id = currentIndex;
        timerId = window.setTimeout(callback, remaining);
    };

    this.resume();
}

/** Guuse class, keeping the lyrics and operating it
	according to information in the pre-recorded JSON file.
 */
function Guuse () {
	var items = [];
	$.getJSON( "src/json/music/life_is_beautiful.json", function (data) {
		var i = 0;
		$.each(data, function(key, val) {
			items[i++] = [key, val];
		});
	});

	this.items = items;
	this.index = 0;
	this.keepDelay = new Array(this.items.length);
}

// Guuse class' prototype
Guuse.prototype = {
	// set timer for every lyric line and run it using timing delay
	runLyric: function (id, lyric, delay) {
		this.keepDelay[id] = new Timer(function() {
								$(".lyric").css("display", "none").html(lyric).fadeIn("fast");
								currentIndex = id;
								console.log(currentIndex);
							}, delay);
	},

	// loop through all lyric lines and set timer for each
	play: function () {
    	for (this.index; this.index < this.items.length; this.index++) {
    		if (this.index == 0) {
    			delayTime = 0;
    		}
    		else {
    			delayTime = parseInt(this.items[this.index-1][0]);
    		}
    		this.runLyric(this.index, this.items[this.index][1], delayTime);
    	}
	},

	// resume running lyrics after pausing
	resumeAll: function () {
		for (i = currentIndex; i < this.items.length; i++) {
			this.keepDelay[i].resume();
		}
	},

	// pause running lyrics
	pause: function () {
		for (i = currentIndex; i < this.items.length; i++) {
			this.keepDelay[i].pause();
		}
	},

	// some debugging shit
	debug: function () {
		//console.log("\n===DEBUG===\n# currentIndex: "+currentIndex+"\n");
	}
}

var guuseInterestedFunc = {
	// If user hasn't commented yet, display textbox for comment
	register: function () {
		var guuseInterested = $.cookie("GuuseInterested");
		if (guuseInterested == null) {
			$(".compliment").fadeIn(300);
			$.cookie("GuuseInterested", 1, { expires: 3 });
			return true;
		}
		return false;
	},

	// record the comment
	record: function () {
		$("form#guuse-interest button").bind("click", function() {
			var name = $("#name").val();
			var email = $("#email").val();
			var comp = $("#compliment-text").val();

			if ($("#wantone").is(':checked')) wantone = true;
			else wantone = false;

			$.post("guuse_interested.php", { p_name: name, p_email: email, p_comp: comp, p_wantone: wantone }, function (signal) {
		 		if (signal == "okay") {
		 			guuseInterestedFunc.thankyou("huurrrayy");
		 		}
			});
		});
	},

	// thanks him/her
	thankyou: function (finish_record) {
		if (finish_record != null) {
			$(".compliment").fadeOut(300);
			$(".thanks").fadeIn(600);
		}

		$(".listing").html('<center><i class="fa fa-spinner fa-spin fa-3x" style="color:#2BBBD8"></i></center>');

		$.post("guuse_listing.php", function (htmlReturn) {
	 		if (htmlReturn != "") {
	 			$(".listing").html(htmlReturn);
	 		}
		});
	}

}

/* THINGS ARE READY TO GO */
$(document).ready(function() {	

	// check if music is playing or not
	var checkPlay = true;

	$.cookie.json = true;

	// true if visit the first time, false otherwise
	// then set cookie for this
	var flagDelayFirstTime = false;
	if ($.cookie("firstTime") == null) {
		$.cookie("firstTime", 1, { expires: 3 });
		flagDelayFirstTime = true;
	}

	// Music, Lyrics and Photos - all set
    var playGuuseMusic = document.getElementById("guuseMusic");
    var playGuuseLyric = new Guuse();
    var playGuusePhoto = $("#guusePhotos");

    // initially, slideshow is off
	playGuusePhoto.carousel('pause');

	// set textbox character limit
	var charleft = $("#charleft");
	$("textarea").limiter(100, charleft);

	// main function to play guusebump: turning on/off music, playing slideshow and lyrics
    var guusingNow = function () {
    					$(".ctrl-play").html("<i class=\"fa fa-play\"></i>");
    					$("#carousel-waiting-layer p").html("guusebump is ready, click play to go");
    					
    					var pauseDetected = false;
    					$(".ctrl-play").bind("click", function () {
							if (checkPlay) {
								$(".ctrl-play").html("<i class=\"fa fa-pause\"></i>");
								$("#carousel-waiting-layer").fadeOut(600);
						    	playGuuseMusic.play();

						    	if (pauseDetected) playGuuseLyric.resumeAll();
						    	else playGuuseLyric.play();

						    	playGuusePhoto.carousel({
						    		interval: 6000
						    	}, 'cycle');
						    	
						    	// turning on lyrics
						    	$(".turn-lyrics > .on-off").html("on");
								$(".turn-lyrics").css("color", "#2BBBD8");
								$("#lyrics").fadeIn("slow");
								checkPlay = !checkPlay;
						    }
						    else {
						    	pauseDetected = true;
						    	$(".ctrl-play").html("<i class=\"fa fa-play\"></i>");
						    	playGuuseMusic.pause();
						    	playGuuseLyric.pause();
						    	playGuusePhoto.carousel('pause');
						    	checkPlay = !checkPlay;
						    }
						});
    				}

	// setTimeout for a few seconds, just to ensure the music finishes loading correctly.
    if (flagDelayFirstTime) delayBeforeGo = 9000;
    else delayBeforeGo = 3000;

    // okay, playing the music
    window.setTimeout(function() {
    	playGuuseMusic.oncanplaythrough = guusingNow();
    }, delayBeforeGo);

    // turning lyrics on/off 
	var checkLyricOnOff = false;
	$(".turn-lyrics").bind("click", function () {
		if (checkLyricOnOff) {
			$(".turn-lyrics").css("color", "#2BBBD8");
			$("#lyrics").fadeIn("slow");
			checkLyricOnOff = !checkLyricOnOff;
		}
		else {
			$(".turn-lyrics").css("color", "#293039");
			$("#lyrics").fadeOut("slow");
			checkLyricOnOff = !checkLyricOnOff;
		}
	});

	// display comment textbox if not commented
	// otherwise display newest comments
	var letsComment = guuseInterestedFunc.register();
	if (letsComment) guuseInterestedFunc.record();
	else guuseInterestedFunc.thankyou();

	/* ===============================================
	A BUNCH OF UI ANIMATIONS
	=============================================== */

	$(".ctrl-fb").bind("click", function () {
		$(".ctrl-fb").css("color", "#2BBBD8");
		fbShare("http://guusebump.com/trisle", "Guusebump - share seriously", "If Flickr doesn't get the most out of your feeling when viewing decent photos, then let GUUSEBUMP does it. Would there be anything cooler than sharing your road trip's photos while also sharing your favourite piece of music?", "http://guusebump.com/trisle/images/guusebump_img.png", 550, 420);
	});

	$(".ctrl-tw").bind("click", function () {
		$(".ctrl-tw").css("color", "#2BBBD8");
		twShare("http://guusebump.com", 550, 420);
	});

	$(".talk-shit").mouseenter(function() {
		$(".hide-right-pan > .tail").animate({
			"margin-left" : "-1px",
			"margin-top"  : "90px",
			fontSize : "5em",
			color : "#2BBBD8",
		}, 300);
		$(".hide-right-pan > .tail").css("cursor", "pointer");
		$(".disclaimer").animate({
			color : "#444b52"
		});
		$(".disclaimer > em").animate({
			color : "#2BBBD8"
		});
		$(".hide-right-pan").bind("click", function() {
			$("#right-pan").fadeOut("slow");
			$("#left-pan").switchClass("col-lg-8", "col-lg-11", 900);
			$("#left-pan .carousel").css("margin-bottom", "50px");
			$(".unhide-right-pan").fadeIn();
		});
		$(".disclaimer").mouseenter(function() {
			$(".disclaimer").animate({
				backgroundColor : "#343d44",
				color : "#fff"
			}, 200);
		});
		$(".disclaimer").mouseleave(function() {
			$(".disclaimer").animate({
				backgroundColor : "#1e242a",
				color : "#444b52"
			}, 200);
		});
	});

	$(".talk-shit").mouseleave(function() {
		$(".hide-right-pan > .tail").animate({
			"margin-left" : "0",
			"margin-top"  : "0px",
			fontSize : "2em",
			color : "#454a50"
		}, 400);
		$(".hide-right-pan").animate({
			backgroundColor : "#454a50"
		}, 500);
		$(".disclaimer").animate({
			color : "#293039"
		});
		$(".disclaimer > em").animate({
			color : "#293039"
		});
	});

	$(".unhide-right-pan").mouseenter(function(){
		$(".unhide-right-pan .tail").animate({
			"margin-right" : "10px",
			"margin-top" : "60px",
			"font-size" : "5em",
			color : "#2BBBD8"
		}, 400);
		$(".unhide-right-pan").animate({
			width: "15px",
			backgroundColor : "#2BBBD8"
		}, 300);
		$(".unhide-right-pan").bind("click", function() {
			$("#right-pan").fadeIn(500);
			$(".unhide-right-pan").fadeOut();
			$("#left-pan").switchClass("col-lg-11", "col-lg-8", 900);
		});
	});

	$(".unhide-right-pan").mouseleave(function(){
		$(".unhide-right-pan .tail").animate({
			"margin-right" : "1px",
			"margin-top" : "0px",
			"font-size" : "3em",
			color : "#3E4957"
		}, 400);
		$(".unhide-right-pan").animate({
			width: "5px",
			backgroundColor : "#3E4957"
		}, 300);
	});

	var wantOneCheck = true;
	$("#wantone").bind("click", function () {
		if (wantOneCheck) {
			$("label[for=\"wantone\"").html("Okay, I heard that ;-)");
			wantOneCheck = !wantOneCheck;
		}
		else {
			$("label[for=\"wantone\"").html("Can I have this too?");
			wantOneCheck = !wantOneCheck;
		}
	});

});

/**	Facebook Sharer helper
 */
function fbShare(url, title, descr, image, winWidth, winHeight) {
    var winTop = (screen.height / 2) - (winHeight / 2);
    var winLeft = (screen.width / 2) - (winWidth / 2);
    window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width='+winWidth+',height='+winHeight);
}

/**	Tweeting helper
 */
function twShare(url, winWidth, winHeight) {
    window.open('https://twitter.com/intent/tweet?url='+url+'&via=Trislevn', 'sharer','toolbar=0,status=0,width='+winWidth+',height='+winHeight);
}