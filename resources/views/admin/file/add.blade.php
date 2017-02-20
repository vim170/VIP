<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    	<form action="/file/insert" method="post" enctype="multipart/form-data">
    	{{ csrf_field() }}
    		上传文件：<input type="file" name="pic" value="">
    		<input type="submit" value="提交">
    	</form>
    </body>
</html>