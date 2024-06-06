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
                            <h3 class="card-title">Category List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Serial No:</th>
                                        <th>Product Image</th>
                                        <th>Product name</th>
                                        <th>Category Name</th>
                                        <th>Subcategory Name</th>
                                        <th>Product Code</th>

                                        <th>Quantity</th>
                                        <th>Regular Price</th>
                                        <th>Buy Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                               <tbody>
                                @foreach ($product as $item)
                                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{asset($item->image)}}" height="100px" width="100px" alt="Category Image" style="border-radius: 30%"></td>
                                    <td>{{$item->name}}</td>

                                    <td>{{$item->category->name}}</td>
                                    <td>{{$item->subcategory->name}}</td>
                                    <td>{{$item->sku_code}}</td>


                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->regular_price}}</td>
                                    <td>{{$item->buy_price}}</td>
                                    <td class="d-flex">
                                    <a href="{{url('admin/Product/edit/'.$item->id)}}" class="btn btn-success" style="margin-right: 2%">Edit</a>
                                    <a href="{{url('admin/Product/delete/'.$item->id)}}" class="btn btn-danger" onclick="return confirm('Are You Want To Delete it?')">Delete</a>
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



@push('script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
