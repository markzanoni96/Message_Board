<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Post New Message</title>
</head>
<body style="text-align: center;">

	<?php
		if(isset($_POST["submit"])) {
			$name = stripslashes($_POST["name"]);
			$subject = stripslashes($_POST["subject"]);
			$message = stripslashes($_POST["message"]);

			// replace any '~' with '-' characters
			$name = str_replace("~", "-", $name);
			$subject = str_replace("~", "-", $subject);
			$subject = str_replace("~", "-", $message);

			//combine the three variables into one string
			$messageRecord = "$name~$subject~$message\n";

			// let's create a variable to store a new file's data
			$messageFile = fopen("message.txt", "a");

			// Check that are no issues with the file before we write the new message to it
			if($messageFile === false) {
				echo "<p style='color:red;'>There was an error in saving your message</p>";
			} else {
				fwrite($messageFile, $messageRecord);
				fclose($messageFile);
				echo "<p>Your message has been saved!</p>";
			} // end of if/else
		} // end of the main if statement
	?>
	<hr/>
	<h1> Post New Message</h1>
	
	<form action="postMessage.php"  method="post">
		<label style="font-weight: bold;" for="name">Name:</label>
		<input type="text" id="name" name="name" />&nbsp;&nbsp;&nbsp;&nbsp;
		<label style="font-weight:bold;" for="subject">Subject:</label>
		<input type="text" id="subject" name="subject" />&nbsp;&nbsp;
		<br/>
		<br/>
		<textarea name="message" rows="6" cols="80 "></textarea>
		<br/>
		<p>
			<input type="reset" value="Reset Form" />&
			<input type="submit" name="submit" value="Post Message"/>
		</p>
	</form>
	<hr/>
	<p><a href="messageBoard.php">


</body>
</html>