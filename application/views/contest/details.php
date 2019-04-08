<!DOCTYPE html>
<html>
<head><title>Entry</title></head>
<body>
	<a href="/contest">Index</a>
	<h1>Contest</h1>
<?php 	
		echo validation_errors();
		echo form_open('contest/details'); ?>

		<label><?=$lang['name'] ?></label>
		<br />
		<input type ="hidden" name="id" value ="<?php if(isset($post['id'])) echo $post['id'];?>">
		<input type="text" name="name" placeholder="Full Name" value ="<?php if(isset($post['name'])) echo $post['name'];?>" />
		<br />
		<label><?=$lang['email'] ?></label>
		<br />
		<input type="text" name="email" placeholder="Email" value ="<?php if(isset($post['email'])) echo $post['email'];?>" />
		<br />
		<button type="Submit">Submit</button>
		<br />
		</form>

</body>
</html>