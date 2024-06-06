@extends('Backend.includes.master')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="row">



                    <div class=" col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Order Details</h3>
                            </div>
                            <form action="{{url('Order/status/details/'.$details->id)}}" method="post" id="my-form">
                                @csrf
                                <div class="row">
                                    <div class="card-body col-md-6">
                                        <div><label for="">Invoice Id</label>
                                            <input type="text" class="form-control" value="{{$details->invoice_id}}" readonly>
                                        </div>

                                        <div>
                                            <label for="">Customer Name</label>
                                            <input type="text" class="form-control" name="c_name" value="{{$details->c_name}}" >
                                        </div>

                                        <div>
                                            <label for="">Customer Phone</label>
                                            <input type="text" class="form-control" name="c_phone"value="{{$details->c_phone}}" >
                                        </div>

                                        <div>
                                            <label for="">Customer e-mail</label>
                                            <input type="text" class="form-control" name="email"value="{{$details->email}}" >
                                        </div>

                                        <div>
                                            <label for="">Customer Address</label>
                                           <textarea name="address" id="" class="form-control">{{$details->address}}</textarea>
                                        </div>

                                        <div>
                                            <label for="">Customer Area</label>
                                            <input type="text" class="form-control" value="{{($details->area==150)?'Outside Dhaka':'Inside Dhaka'}}" readonly>
                                        </div>

                                      </div>
                                      <div class="card-body col-md-6">
                                        <div>
                                            <label for="">Select Courier Name</label>
                                            <select name="courier_name" id="courier_name" class="form-control" onchange="courierselect()">
                                                <option value="" selected disabled >Select Courier Name</option>
                                                <option value="steadfast" {{($details->currier_name=='steadfast')?'selected':''}}>Steadfast Courier</option>
                                                <option value="other"  {{($details->currier_name!='steadfast'&& $details->currier_name!=null )?'selected':''}} >Other</option>
                                            </select>
                                            @if($details->currier_name!='steadfast' && $details->currier_name!=null )
                                            <div class="mt-2">
                                                <input type="text" class="form-control"  name="other_courier" value="{{$details->currier_name}}" id="other_courier" placeholder="enter courier name">
                                            </div>
                                            @endif
                                            @if ($details->courier_name!='steadfast')
                                            <div class="mt-2">
                                                <input type="text" class="form-control" style="display:none" name="other_courier" id="other_courier" placeholder="enter courier name">
                                            </div>
                                            @endif

                                        </div>


                                        <div>
                                            <label for="">Product information</label>
                                            @foreach ( $details->orderDetails as $orderDetails )<br>
                                            <img src="{{asset($orderDetails->product->image)}}" alt="" height="50px" width="50px">
                                                {{$orderDetails->product->name}}
                                                    quantity:{{$orderDetails->quantity}}
                                                    size:{{$orderDetails->size}}
                                                    color:{{$orderDetails->color}}
                                                  <br>
                                                 @endforeach
                                        </div>

                                        <div>
                                            <label for="">Total Price</label>
                                            <input type="text" name="price" class="form-control" value="{{$details->price}}">
                                        </div>

                                        <div class="mt-2">
                                         <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                      </div>
                                </div>
                            </form>

                        </div>




                    </div>



            </div>
        </div>
    </section>
</div>
@endsection


@push('script')
<script>
    function courierselect(){
        var courier_name=document.getElementById('courier_name').value;
if(courier_name=='other'){
    document.getElementById('other_courier').style.display='inline';
}
else{
    document.getElementById('other_courier').style.display='none';
}


    }

</script>
@endpush

