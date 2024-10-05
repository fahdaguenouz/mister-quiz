@extends('app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Register Form</title>

  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  
  <!-- Boxicons CSS -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="bg-blue-500">
    <div class="absolute top-4 left-4">
        <a href="{{ route('home') }}" class="bg-red-500 text-white py-3 px-6 rounded-lg hover:bg-red-600 transition duration-200 flex items-center justify-center">
          <i class='bx bx-home text-lg mr-2'></i> <!-- Home icon -->
         
        </a>
      </div>
      
      
  <section class="flex items-center justify-center h-screen">
    <div class="absolute max-w-sm w-full p-8 rounded-lg bg-white shadow-lg">
      <div class="form-content">
        <header class="text-2xl font-semibold text-gray-800 text-center">Register</header>
        
        <form action="{{ route('register') }}" method="POST" class="mt-8">
          @csrf

          <div class="relative mb-5">
            <input type="text" name="username" id="username" placeholder="Enter username" 
                   class="h-12 w-full border border-gray-300 rounded-lg px-4 focus:outline-none focus:ring focus:border-blue-500" 
                   value="{{ old('username') }}">
            @error('username')
              <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
          </div>

          <div class="relative mb-5">
            <input type="email" name="email" id="email" placeholder="Enter email" 
                   class="h-12 w-full border border-gray-300 rounded-lg px-4 focus:outline-none focus:ring focus:border-blue-500" 
                   value="{{ old('email') }}">
            @error('email')
              <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
          </div>

          <div class="relative mb-5">
            <input type="password" name="password" id="password" placeholder="Enter password" 
                   class="h-12 w-full border border-gray-300 rounded-lg px-4 focus:outline-none focus:ring focus:border-blue-500">
            <i class='bx bx-hide eye-icon absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer'  onclick="togglePasswordVisibility('password', this)"></i>
            @error('password')
              <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
          </div>

          <div class="relative mb-5">
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" 
                   class="h-12 w-full border border-gray-300 rounded-lg px-4 focus:outline-none focus:ring focus:border-blue-500">
            @error('password_confirmation')
              <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
          </div>

          <div class="field button-field">
            <button type="submit" class="h-12 w-full bg-blue-700 text-white rounded-lg transition duration-300 ease-in-out hover:bg-blue-600">Register</button>
          </div>
        </form>

        <div class="text-center mt-4">
          <span class="text-sm text-gray-800">Already have an account? <a href="{{ route('login') }}" class="text-blue-700">Login</a></span>
        </div>
      </div>

      <div class="relative my-5">
        <div class="h-px bg-gray-300"></div>
        <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white px-2 text-gray-400"></span>
      </div>
    </div>
  </section>

  <!-- JavaScript -->
  <script>
    document.getElementById('registrationForm').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const passwordConfirmation = document.getElementById('password_confirmation').value;

        if (password !== passwordConfirmation) {
            e.preventDefault(); // Prevent form submission
            alert('Password confirmation does not match the password. Please try again.'); // Alert message
            return false; // Optional: return false to prevent form submission
        }
    });

    function togglePasswordVisibility(passwordFieldId, icon) {
        const passwordField = document.getElementById(passwordFieldId);
        const isVisible = passwordField.type === 'text';
        passwordField.type = isVisible ? 'password' : 'text';
        icon.classList.toggle('bx-hide', isVisible);
        icon.classList.toggle('bx-show', !isVisible);
    }
</script>
</body>

</html>
@endsection
