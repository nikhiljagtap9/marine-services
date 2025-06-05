      <script>
         document.querySelectorAll('.section-title').forEach(title => {
           title.addEventListener('click', () => {
             const content = title.nextElementSibling;
             content.style.display = content.style.display === 'block' ? 'none' : 'block';
           });
         });
      </script>
      <script src="{{ asset('privacy-t&c-consent/assets/js/jquery.min.js')}}"></script>
      <!-- Bootstrap js -->
      <script src="{{ asset('privacy-t&c-consent/assets/js/bootstrap.min.js')}}"></script>
      <!-- Imagesloaded js -->
      <script src="{{ asset('privacy-t&c-consent/assets/js/imagesloaded.pkgd.min.js')}}"></script>
      <!-- Validator js -->
      <script src="{{ asset('privacy-t&c-consent/assets/js/validator.min.js')}}"></script>
      <!-- Custom Js -->
      <script src="{{ asset('privacy-t&c-consent/assets/js/main.js')}}"></script>
   </body>
</html>
@yield('scripts')