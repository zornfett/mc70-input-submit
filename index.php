<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<title>V.45 - we're attempting to submit scan data from the MC70 into a [cloudy] spreadsheet via an input field</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
	<style></style>
	</head>
	<body>

	<div class="container">
		<br /><br />

		<form id="foo">
			<!-- <label for="bar">A bar</label> -->
			<input id="bar" name="bar" type="text" value="" />
			<input type="submit" value="Submitto" id="submit_btn" />
		</form>

		<!-- The result of the search will be rendered inside this div -->
		<div id="result"></div>

		<br /><br />
		<a href="test.php">view 'test.php'</a>
		<br /><br />
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>

	/* Get from elements values
	var values = $(this).serialize();
	$.ajax({
		url: "test.php",
		type: "post",
		data: values ,
		success: function (response) {
			// page response              
		},
		error: function(jqXHR, textStatus, errorThrown) {	
			console.log(textStatus, errorThrown);
		}
	}); */

$("#submit_btn").click(function(){
    $('#bar').html();
        if($("form#foo").valid())
        {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('test/add');?>",
                data: $('#foo').serialize(),
                success: function(msg) {
                    var msg = $.parseJSON(msg);
                    if(msg.success=='yes')
                    {
                        return true;
                    }
                    else
                    {
                        alert('Server error');
                        return false;
                    }
                }
            });
        }
        return false;
    });

	</script>
	</body>
</html>

<!-- 
POST method:
http://api.jquery.com/jQuery.post/
https://stackoverflow.com/questions/5004233/jquery-ajax-post-example-with-php

BLOB method:
http://jsfiddle.net/UselessCode/qm5AG/
https://developer.mozilla.org/en-US/docs/Web/API/Blob

HMMMM
https://developers.google.com/sheets/api/v3/

https://stackoverflow.com/questions/16083063/save-inputs-in-array-and-display-all-item-jquery-javascript

https://api.jquery.com/serialize/

https://developer.mozilla.org/en-US/docs/Web/Events/change

NO NO NO
https://stackoverflow.com/questions/43346528/single-value-into-array-from-form-submit

http://plnkr.co/edit/6iZSIBa9S1G95pIMBRBu

https://docs.google.com/spreadsheets/d/1fPXkBcNgIqLxVHa8vnvEoZj5XKkp-nN5Qi9PaxKiHDw/edit#gid=0
mc70-post-script
https://script.google.com/macros/s/AKfycbxYUwV4G716c8-tmKeKtR2sNypTAy9utMTSYcwqVNea37xe1c2B/exec

https://groups.google.com/forum/#!topic/formemailer/qzgbJgXhQ8I
https://stackoverflow.com/questions/28800580/the-coordinates-or-dimensions-of-the-range-are-invalid-using-variable

$('.boink').on('click', function(){
	console.log('boink!');
})

https://stackoverflow.com/questions/21102684/google-forms-send-data-to-spreadsheet
https://mashe.hawksey.info/2011/10/google-spreadsheets-as-a-database-insert-with-apps-script-form-postget-submit-method/

2015 PHP version
https://stackoverflow.com/questions/29796925/google-sheets-as-a-database-with-ajax

-->
