<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if($errors->any())
        <div class="popup alert alert-danger" id="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="popup alert alert-success" id="success-message">
            {{ session('success') }}
        </div>
    @endif 

    <!-- Include jQuery or any other JavaScript library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Your custom JavaScript code -->
    <script>
        // Display pop-up on page load
        $(document).ready(function(){
            $("#error-message, #success-message").fadeIn().delay(3000).fadeOut();
        });
    </script>

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ old('email') }}" required>
    <button type="submit">Send Reset Link</button>
</form>

</body>
</html>