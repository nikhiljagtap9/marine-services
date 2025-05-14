@extends('admin.main')

@section('content')
<style type="text/css">
   a.index_activ {
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
      <div class="card mb-3 p-4 total-box">
         <div class="g-4 gx-xxl-5 row">
            <div class="col-sm-3 total-box-left">
               <div class="align-items-center d-flex justify-content-between mb-4">
                  <h6 class="mb-0">Total Countries</h6>
                  <div class="align-items-center d-flex justify-content-center rounded arrow-btn percentage-increase">
                     <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-world"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M3.6 9h16.8" /><path d="M3.6 15h16.8" /><path d="M11.5 3a17 17 0 0 0 0 18" /><path d="M12.5 3a17 17 0 0 1 0 18" /></svg>
                  </div>
               </div>
               <h1 class="price"><span class="counter">45</span><span class="fs-13 ms-1 text-muted"></span></h1>
            </div>
            <div class="col-sm-3 total-box-left">
               <div class="align-items-center d-flex justify-content-between mb-4">
                  <h6 class="mb-0">Total Ports</h6>
                  <div class="align-items-center d-flex justify-content-center rounded arrow-btn percentage-increase">
                     <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-ship"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M2 20a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1" /><path d="M4 18l-1 -5h18l-2 4" /><path d="M5 13v-6h8l4 6" /><path d="M7 7v-4h-1" /></svg>
                  </div>
               </div>
               <h1 class="price counter">132</h1>
            </div>
            <div class="col-sm-3 total-box__right">
               <div class="align-items-center d-flex justify-content-between mb-4">
                  <h6 class="mb-0">categories </h6>
                  <div class="align-items-center d-flex justify-content-center rounded arrow-btn percentage-increase">
                     <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-star">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                     </svg>
                  </div>
               </div>
               <h1 class="price counter">34</h1>
            </div>

            <div class="col-sm-3 total-box__right">
               <div class="align-items-center d-flex justify-content-between mb-4">
                  <h6 class="mb-0">sub-categories </h6>
                  <div class="align-items-center d-flex justify-content-center rounded arrow-btn percentage-increase">
                     <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-star">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                     </svg>
                  </div>
               </div>
               <h1 class="price counter">14</h1>
            </div>


         </div>
      </div>
      <div class="card">
         <div class="card-header position-relative">
            <h6 class="fs-17 fw-semi-bold my-1">Total Port</h6>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-borderless text-nowrap category-list">
                  <thead>
                     <tr>
                        <th>SR</th>
                        <th>Port Name</th>
                        <th>Country </th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <th>01</th>
                        <td>ABC Port</td>
                        <td>India</td>
                     </tr>
                     <tr>
                        <th>01</th>
                        <td>ABC Port</td>
                        <td>India</td>
                     </tr>
                     <tr>
                        <th>01</th>
                        <td>ABC Port</td>
                        <td>India</td>
                     </tr>
                     <tr>
                        <th>01</th>
                        <td>ABC Port</td>
                        <td>India</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection