<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.heading')
</head>
<body>

  @include('layout.navigation')


  <main class="container mt-5 mb-5">
    @yield('content') 
  </main>


  @include('layout.footer')
  
</body>
</html>