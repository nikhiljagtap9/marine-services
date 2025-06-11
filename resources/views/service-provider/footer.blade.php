<!-- start footer -->
<footer class="mt-auto w-100 text-center py-3 bg-light">
    <div class="container">
        <ul class="list-unstyled list-inline mb-2">
            <li class="list-inline-item"><a href="{{ route('privacy') }}" target="_blank">Privacy</a></li>
            <li class="list-inline-item"><a href="{{ route('t&c') }}" target="_blank">Terms & Condition</a></li>
            <li class="list-inline-item"><a href="{{ route('consent') }}" target="_blank">Consent</a></li>
        </ul>
        <div class="copy">© 2025 Rated Marine Services - All Rights Reserved</div>
    </div>
</footer>

<script src="{{ asset('service-provider/assets/js/jquery.min.js')}}"></script>
      <!-- Bootstrap js -->
      <script src="{{ asset('service-provider/assets/js/bootstrap.min.js')}}"></script>
      <!-- Imagesloaded js -->
      <script src="{{ asset('service-provider/assets/js/imagesloaded.pkgd.min.js')}}"></script>
      <!-- Validator js -->
      <script src="{{ asset('service-provider/assets/js/validator.min.js')}}"></script>
      <!-- Custom Js -->
      <script src="{{ asset('service-provider/assets/js/main.js')}}"></script>
      
   </body>
</html>
@yield('scripts')