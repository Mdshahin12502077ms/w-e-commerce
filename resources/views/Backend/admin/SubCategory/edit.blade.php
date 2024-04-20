@extends('Backend.includes.master')

@section('content')
<section>
    <div class="container-fluid mt-2">
        <div class="row">
            <!-- left column -->
            <div class="col-md-4">
            </div>

            <div class="col-md-6 mb-5">

                <div class="card card-primary ">

                    <div class="card-header">

                        <h3 class="card-title">Edit Sub Category</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form action="{{url('admin/subCategory/update',$subCategory->id)}}" method="post" id="UserForm" enctype="multipart/form-data">
                       @csrf


                       <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                       <select name="category_id" id="" class="form-control">
                        <option value="" selected disabled>Select Category Name</option>
                        @foreach ( $category as $category )
                        <option {{ ($subCategory->category_id==$category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                       </select>
                            <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                    </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Category Name</label>
                                <input type="text" name="name"class="form-control" id=""
                                 value="{{$subCategory->name}}">
                                    <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                            </div>




                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
