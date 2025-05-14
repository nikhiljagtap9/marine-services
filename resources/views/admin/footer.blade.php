</div>
            <!--/.main content-->
            <footer class="footer-content">
               <div class="align-items-center d-flex footer-text gap-3 justify-content-between">
                  <div class="copy">© 2025 Rated Marine Services - All Rights Reserved</div>
                  <div class="credit">Developed by: <a href="#">Rated Marine Services</a></div>
               </div>
            </footer>
            <!--/.footer content-->
            <div class="overlay"></div>
         </div>
         <!--/.wrapper-->
      </div>
      <!-- Global script(used by all pages) -->
      <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/plugins/jQuery/jquery.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/plugins/metisMenu/metisMenu.min.js"></script>
      <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
      <!-- Third Party Scripts(used by this page) -->
      <script src="assets/plugins/toastr/toastr.min.js"></script>
      <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="assets/plugins/datatables/dataTables.bootstrap5.min.js"></script>
      <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
      <script src="assets/plugins/jquery.counterup/jquery.waypoints.min.js"></script>
      <script src="assets/plugins/jquery.counterup/jquery.counterup.min.js"></script>
      <!-- Page Scripts(used by all page) -->
      <script src="assets/dist/js/app.min.js"></script>
      <!-- Page Active Scripts(used by this page) -->
      <script src="assets/dist/js/dashboard.js"></script>

      <script>

         $(document).ready(function () {
            let table = $('#countriesTable').DataTable({
                 ajax: {
                    url: '{{ route("admin.countries.list") }}',
                    dataSrc: 'data' // Important: DataTables expects 'data' key
                },
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'created_at' }
                ]
            });

            $('#countryForm').on('submit', function (e) {
                e.preventDefault();
                let formData = $(this).serialize();

                // Clear any previous errors
                     $('.text-danger').text('');
                     $('.form-control').removeClass('is-invalid');

                $.ajax({
                    url: '{{ route("admin.countries.store") }}',
                    method: 'POST',
                    data: formData,
                    success: function (response) {
                       $('#success-message').removeClass('d-none').text(response.message);
                       $('#popup').hide(); 
                        $('#countryForm')[0].reset();
                        table.ajax.reload();
                        setTimeout(() => {
                         $('#success-message').addClass('d-none').text('');
                     }, 3000);
                    },
                    error: function(xhr) {
                     if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                              $(`[name="${field}"]`).addClass('is-invalid');
                              if ($(`#${field}-error`).length) {
                                 $(`#${field}-error`).text(messages[0]);
                              } else {
                                 $(`[name="${field}"]`).after(`<span class="text-danger" id="${field}-error">${messages[0]}</span>`);
                              }
                        });
                     }
                  }
                });
            });
        });
        
        
      //  $(document).ready(function() {
     

      //    // Handle form submission for adding a new country
      //    $('#add-country-form').on('submit', function(e) {
      //       e.preventDefault();

      //       // Clear any previous errors
      //       $('.text-danger').text('');
      //       $('.form-control').removeClass('is-invalid');

      //       $.ajax({
      //             url: '{{ route("admin.countries.store") }}',
      //             method: 'POST',
      //             data: $(this).serialize(),
      //             success: function(response) {
      //                $('#success-message').removeClass('d-none').text(response.message);
      //                $('#popup').hide();  // Close the popup
      //                $('#add-country-form')[0].reset();  // Reset the form

      //                // Ensure DataTable exists before reloading
      //                if (table) {
      //                   console.log('Reloading DataTable...');
      //                   table.ajax.reload(null, false);  // Reload without resetting pagination
      //                } else {
      //                   console.error('DataTable is not initialized or lost!');
      //                }

      //                setTimeout(() => {
      //                   $('#success-message').addClass('d-none').text('');
      //                }, 3000);
      //             },
      //             error: function(xhr) {
      //                if (xhr.status === 422) {
      //                   const errors = xhr.responseJSON.errors;
      //                   $.each(errors, function(field, messages) {
      //                         $(`[name="${field}"]`).addClass('is-invalid');
      //                         if ($(`#${field}-error`).length) {
      //                            $(`#${field}-error`).text(messages[0]);
      //                         } else {
      //                            $(`[name="${field}"]`).after(`<span class="text-danger" id="${field}-error">${messages[0]}</span>`);
      //                         }
      //                   });
      //                }
      //             }
      //       });
      //    });
      // });

   
      </script>
      
   </body>
</html>