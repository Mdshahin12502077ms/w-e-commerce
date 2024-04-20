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

                        <h3 class="card-title">Add Category</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form action="{{url('admin/category/store')}}" method="post" id="UserForm" enctype="multipart/form-data">
                       @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name"class="form-control" id=""
                                    placeholder="Enter name">
                                    <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" accept="image" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <font style="color:red">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                                  </div>

                                </div>
                              </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
