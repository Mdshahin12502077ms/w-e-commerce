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

                        <h3 class="card-title">Privacy And Policy</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form action="{{url('admin/settings/privacy_policy_update')}}" method="post" id="UserForm" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Privacy and Policy</label>
                        <div class="card-body col-md-12">
                            <textarea id="summernote"class="form-control" name="privacy_desc">
                           {!!$privacy->privacy_desc!!}
                        </textarea>
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
