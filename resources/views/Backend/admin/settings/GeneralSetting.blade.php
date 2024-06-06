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

                        <h3 class="card-title">General Settings</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form action="{{url('admin/settings/update')}}" method="post" id="UserForm" enctype="multipart/form-data">
                       @csrf

                       <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Address</label>
                        <div class="card-body col-md-12">
                            <textarea id="summernote"class="form-control" name="address">
                             {!!$setting->address!!}
                        </textarea>
                        </div>
                    </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="phone"class="form-control" id=""
                                    placeholder="Enter name" value="{{$setting->phone}}">
                                    <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email"class="form-control" id=""
                                    placeholder="Enter name"value="{{$setting->email}}">
                                    <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Facebook</label>
                                <input type="text" name="facebook"class="form-control" id=""
                                    placeholder="Enter name"value="{{$setting->facebook}}">
                                    <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Youtube</label>
                                <input type="text" name="youtube"class="form-control" id=""
                                    placeholder="Enter name" value="{{$setting->youtube}}">
                                    <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Twitter</label>
                                <input type="text" name="twitter"class="form-control" id=""
                                    placeholder="Enter name"value="{{$setting->twitter}}">
                                    <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Instagram</label>
                                <input type="text" name="instragram"class="form-control" id=""
                                    placeholder="Enter name"value="{{$setting->instragram}}">
                                    <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                            </div>




                            <div class="form-group">
                                <label for="exampleInputFile">Logo</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" accept="image/*" name="logo">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <font style="color:red">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                                  </div>

                                </div>

                                <div>
                                    <img src="{{asset($setting->logo)}}" alt="" height="50" width="50">
                                </div>
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
@push('script')
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>
@endpush
