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
                           <th>Ports</th>
                           <th>Categories</th>
                           <th>Countries</th>
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
                                 {{-- Ports --}}
            <td>
                @foreach($provider->portServiceDetails->unique('port_id') as $detail)
                    {{ $detail->port->name ?? 'N/A' }}<br>
                @endforeach
            </td>

            {{-- Categories --}}
            <td>
                @foreach($provider->portServiceDetails->unique('category_id') as $detail)
                    {{ $detail->category->name ?? 'N/A' }}<br>
                @endforeach
            </td>

            {{-- Countries --}}
            <td>
                @foreach($provider->portServiceDetails->unique('country_id') as $detail)
                    {{ $detail->country->name ?? 'N/A' }}<br>
                @endforeach
            </td>
                                 <td>
                                    <a href="{{ route('admin.users.detail', $provider->active_subscription->id) }}" class="btn btn-sm btn-primary" target="_blank">
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
@endsection
@section('scripts')
   <script>

   $(document).ready(function () {
         $('#planTable').DataTable();
   });

</script>
@endsection
