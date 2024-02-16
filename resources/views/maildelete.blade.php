<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p>Hello {{ $user->user_name }}  - ,</p>

<p>We have received a request to delete your account. If you initiated this request, please click the following link to confirm:</p>

<p><a href="{{ route('delete.account', $user->id) }}">Confirm Account Deletion</a></p>

<p>If you did not initiate this request, please ignore this email.</p>

<p>Thank you.</p>
, initial-scale=1.0">
    <title>Document</title> 
</body>
</html>