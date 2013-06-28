$(document).ready(function(){


// POST ICON SELECTION TO DATABASE

	function updateStyles(styleID, campaignID, userID, insdelYN)
	{
		var s = window.location.href;
		if(s.indexOf("localhost") !== -1) {
			postURL = "../../styleupdate";
		} else {
			postURL = "http://createdbysteve.com/growforthecure/styleupdate";
		}

		$.ajax({
		  type: "POST",
		  url: postURL,
		  data: { style: styleID, campaign: campaignID, user: userID, idyn: insdelYN }
		}).done(function( msg ) {
			if (insdelYN == "del") {
				console.log( 'Deleted: ' + msg );
			} else {
				console.log( 'Added: ' + msg );
			}
		  
		});
	}


// SET ICON AS SELECTED OR NOT

	$('div.icon').on('click', function(){
		if ($(this).hasClass('styleBG')) {
			if ($(this).hasClass('pledged')) {
				alert('Sorry, you can not remove a style that has pledges.');
			} else {
				insdel = "del";
				cid = $('input[name="campaignID"]').val();
				uid = $('input[name="userID"]').val();
				sid = $(this).children('img').attr('id');
				$(this).removeClass('styleBG');
				updateStyles(sid, cid, uid, insdel);	
			}
		} else {
			insdel = "ins";
			cid = $('input[name="campaignID"]').val();
			uid = $('input[name="userID"]').val();
			sid = $(this).children('img').attr('id');
			$(this).addClass('styleBG');
			updateStyles(sid, cid, uid, insdel);	
		}
	});

// SETUP DATE PICKERS

	$( "#datepicker" ).datepicker({
		maxDate: "+6m",
		minDate: "+8d",

	});


});