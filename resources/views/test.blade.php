<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
</head>
<body>
		<h1>Login success</h1>

		<form action="/logout" method="post">
			@csrf
			<button type="submit">Logout</button>
		</form>
</body>
</html>