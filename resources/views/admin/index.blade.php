<!DOCTYPE html>
<html>
  @include('admin.head')
  <body>
    <header class="header"> 
      @include('admin.header')
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      @include('admin.pagecontent')
      @include('admin.footer')
    </div>
  </body>
</html>