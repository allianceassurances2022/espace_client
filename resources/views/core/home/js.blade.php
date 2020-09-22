<script src="{{asset('assets/lib/jquery/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/main.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/lib/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
  

  <script type="text/javascript">
	$(document).ready(function(){
      	//initialize the javascript
      	App.init();
      	@yield('docready')
      });
	
  </script>

  @yield('js')