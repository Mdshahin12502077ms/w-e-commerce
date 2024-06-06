@extends('Backend.includes.master')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    @if (Session::has('success'))
                    <div class="alert alert-success {{ Session::has('penting') ? 'alert-important' : '' }}">
                        <button type="button" class="close btn btn-info" data-dismiss="alert"
                            aria-hidden="true">&times;</button>
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger {{ Session::has('penting') ? 'alert-important' : '' }}">
                    <button type="button" class="close btn btn-info" data-dismiss="alert"
                        aria-hidden="true">&times;</button>
                    {{ Session::get('error') }}
                </div>
            @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Order List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Serial No:</th>
                                        <th>Invoice Id</th>
                                        <th>Customer Info</th>
                                        <th>Product Info</th>
                                        <th>Courier Name</th>
                                        <th>Status</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                               <tbody>
                              @foreach ( $order as $order )

                              <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->invoice_id}}</td>
                                <td>{{$order->c_name}},<br>
                                       {{$order->c_phone}},<br>
                                       {{$order->address

                                      }}
                                </td>

                                   <td>
                                    @foreach ( $order->orderDetails as $orderDetails )
                                    <img src="{{asset($orderDetails->product->image)}}" alt="" height="50px" width="50px">
                                    {{$orderDetails->product->name}}
                                    quantity:{{$orderDetails->quantity}}
                                    size:{{$orderDetails->size}}
                                    color:{{$orderDetails->color}}
                                    <br>
                                    @endforeach
                                   </td>
                                   
                                  <td>{{$order->currier_name}}</td>

                                <td>{{$order->status}}</td>

                                <td>
                                    <a href="{{url('Order/status/status_confirmed',$order->id)}}" class="btn btn-info btn-sm mt-2">Confirmed</a>
                                    <a href="{{url('Order/status/status_Delivered',$order->id)}}" class="btn btn-success btn-sm mt-2">Deliverd</a>
                                    <a href="{{url('Order/status/status_canceled',$order->id)}}" class="btn btn-danger btn-sm mt-2">Canceled</a>
                                    <a href="{{url('Order/status/details',$order->id)}}" class="btn btn-info btn-sm mt-2">Details</a>
                                </td>

                              </tr>

                              @endforeach
                               </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection




