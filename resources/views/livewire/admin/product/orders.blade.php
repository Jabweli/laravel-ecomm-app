<div>
   
   <div>
      <div class="row border-0 border-bottomdd pb-1 mb-2">
         <div class="col-md-8">
            <h3>Orders</h3>
         </div>
      </div>

      <div class="table-responsive">
         <table class="table table-smdd">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Subtotal</th>
                  <th>Discount</th>
                  <th>Tax</th>
                  <th>Total</th>
                  <th>FirstName</th>
                  <th>LastName</th>
                  <th>Status</th>
                  <th style="text-wrap: nowrap">Order Date</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @php
                  $sn=1;
               @endphp
                  @forelse ($orders as $order)
                     <tr>
                        <td>{{$order->id}}</td>
                        <td>
                           ${{$order->subtotal}}
                        </td>
                        <td>
                           ${{$order->discount}}
                        </td>
                        <td>${{$order->tax}}</td>
                        <td>${{$order->total}}</td>
                        <td style="text-wrap: nowrap">
                           {{$order->firstname}}
                        </td>
                        <td style="text-wrap: nowrap">{{$order->lastname}}</td>
                        <td>{{$order->status}}</td>
                        <td style="text-wrap: nowrap">{{date('d M Y', strtotime($order->created_at))}}</td>
                        <td>
                           <a href="{{url('admin/order/view/'.$order->id)}}" class="btn btn-sm btn-success">
                              <i class="ti ti-eye"></i>
                           </a>
                        </td>
                     </tr>
                  @empty
                     <tr>
                        <td colspan="12" class="text-center">
                           <h6 class="text-danger">No products found!</h6>
                        </td>
                     </tr>
                  @endforelse
            </tbody>
         </table>

         <div>
         {{ $orders->links() }}
         </div>
      </div>
   </div> 
   
   
   
</div>
