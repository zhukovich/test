<h2>Home page</h2>
<? if ($app->views->user) { ?>
	<h3>Main files:</h3><br>
	<form name="upload" action="/" method="post" enctype="multipart/form-data">
		Upload new file:<br>
		<input type="file" name="file">
		<input type="submit" value="Upload">
	</form>
	<table>
		<tr>
			<td>ID<td>
			<td>Filename<td>
			<td>Url<td>
			<td>Uploaded by<td>
		</tr>
		<? foreach ($files as $f) { ?>
			<tr>
				<td><?=$f->id;?><td>
				<td><?=$f->name;?><td>
				<td><a href="/<?=$f->url;?>">Link to file</a><td>
				<td><?=$f->user_email;?><td>
			</tr>
		<? } ?>
	</table>
<? } else { ?>
	Login to upload and view files.
<? } ?>




