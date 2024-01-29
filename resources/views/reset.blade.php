<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/auth/passwords/reset.blade.php -->
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ $email }}" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <label for="password_confirmation">Confirm Password:</label>
    <input type="password" name="password_confirmation" required>
    <button type="submit">Reset Password</button>
</form>

</body>
</html>