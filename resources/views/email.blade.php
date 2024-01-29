<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/auth/passwords/email.blade.php -->
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ old('email') }}" required>
    <button type="submit">Send Reset Link</button>
</form>

</body>
</html>