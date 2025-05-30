
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
            <h6 class="fs-17 fw-semi-bold my-1">Service Providers for Plan: {{ $plan->name ?? 'N/A' }} </h6>
         </div>
         <div class="card-body">
            <div class="table-responsive">
                <table id="planTable" class="display table table-borderless text-nowrap">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Campany Name</th>
                            <th>Person Name</th>
                            <th>Phone</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($providers as $key => $provider)
                           <tr>
                                 <td>{{ $key + 1 }}</td>
                                 <td>{{ $provider->company_name ?? 'N/A' }}</td>
                                 <td>{{ $provider->contact_person_name ?? 'N/A' }}</td>
                                 <td>{{ $provider->phone ?? 'N/A' }}</td>
                                 <td>
                                    <a href="{{ route('admin.users.detail', $provider->user->id) }}" class="btn btn-sm btn-primary" target="_blank">
                                       View
                                    </a>
                                 </td>
                              </tr>
                           @empty
                           <tr>
                                 <td colspan="3" class="text-center">No service providers found for this plan.</td>
                           </tr>
                        @endforelse
                     </tbody>
                </table>    
            </div>
         </div>
      </div>
   </div>
</div>

<div class="popup-overlay popmain" id="popup">
   <div class="popup-content">
      <button class="close-btn" onclick="closePopup()">×</button>
      <h2>Add Category</h2>
       <form id="categoryForm">
         @csrf
         <div class="col-sm-6" bis_skin_checked="1">
            <!-- start form group -->
            <div class="" bis_skin_checked="1">
               <label class="fw-medium mb-2">Category Name</label>
               <input type="text" name="name"  class="form-control" placeholder="Enter Category Name">
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

    @section('scripts')
        <script>

         $(document).ready(function () {
             $('#planTable').DataTable();
        });
   
      </script>
    @endsection
