
@extends('admin.main')

@section('content')

<style type="text/css">
   a.quot_activ {
   color: #083a76;
   background-color: rgb(8 58 118 / 9%);
   -webkit-box-shadow: none;
   box-shadow: none;
   border-color: #083a76;
   border-left: 4px solid #083a76 !important;
   }
</style>
  <div class="body-content">
   <div class="decoration blur-2"></div>
   <div class="decoration blur-3"></div>
   <div class="container-xxl">
      <div id="success-message" class="alert alert-success d-none"></div>
      <div class="card">
         <div class="card-header position-relative">
            <h6 class="fs-17 fw-semi-bold my-1">Total countries</h6>
            <a onclick="openPopup()" class="ad_cntr_pop" >
               <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M12 5l0 14" />
                  <path d="M5 12l14 0" />
               </svg>
               Add Country 
            </a>
         </div>
         <div class="card-body">
            <div class="table-responsive">
                <table id="countriesTable" class="display table table-borderless text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Country Name</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>    
            </div>
         </div>
      </div>
   </div>
</div>




<div class="popup-overlay popmain" id="popup">
   <div class="popup-content">
      <button class="close-btn" onclick="closePopup()">×</button>
      <h2>Add Country</h2>
       <form id="countryForm">
         @csrf
         <div class="col-sm-6" bis_skin_checked="1">
            <!-- start form group -->
            <div class="" bis_skin_checked="1">
               <label class="fw-medium mb-2">Country Name</label>
               <input type="text" name="name"  class="form-control" placeholder="Enter Country Name">
               <span class="text-danger" id="name-error"></span> 
            </div>
            <!-- end /. form group -->
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
         <button type="submit" class="ad_clas">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
               <path d="M12 5l0 14" />
               <path d="M5 12l14 0" />
            </svg>
                  Add
            </button>
      </form>
   </div>
</div>

  
    
    <script>
        function openPopup() {
     document.getElementById("popup").style.display = "block";
   }
   
   function closePopup() {
     document.getElementById("popup").style.display = "none";
   }
        
    </script>
    @endsection
