<div>
   {{-- Close your eyes. Count to one. That is how long forever feels. --}}


   <div>
     <div class="row">
         <div class="col-md-6">
             <h4>Newsletter Signups</h4>
         </div>
     </div>
     <div class="table-responsive">
         @if (session()->has('deleted'))
             <h6 class="text-success">{{session('deleted')}}</h6>
         @endif 
         @if (session()->has('failed'))
             <h6 class="text-danger">{{session('failed')}}</h6>
         @endif 
         <table class="table table-stripeddd">
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Email</th>
                     <th>Created_at</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                 @php
                    $sn = 1; 
                 @endphp
                 @forelse ($emails as $email)
                     <tr>
                         <td>{{$sn++}}</td>
                         <td>{{$email->email}}</td>
                         <td>{{$email->created_at}}</td>
                         <td>
                             <button class="btn btn-sm btn-danger" wire:click="delete({{$email->id}})"><i class="ti ti-trash"></i></button>
                         </td>
                     </tr>
                 @empty
                     <tr>
                       <td colspan="6" class="text-center">
                          <h5 class="text-danger">No newsletter signups found!</h5>
                       </td>
                     </tr>
                 @endforelse
             </tbody>
         </table>
     </div>
  </div>



</div>

