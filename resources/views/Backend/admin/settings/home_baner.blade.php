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

                        <h3 class="card-title">Banner Image</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form action="{{url('admin/settings/home_baner_update')}}" method="post" id="UserForm" enctype="multipart/form-data">
                       @csrf
                            <div class="form-group">
                                <label for="exampleInputFile">Banner Image </label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" accept="image/*" name="Baner_image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <font style="color:red">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                                  </div>

                                </div>

                                <div>
                                    <img src="{{asset($baner->Baner_image)}}" alt="" height="50" width="50">
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
