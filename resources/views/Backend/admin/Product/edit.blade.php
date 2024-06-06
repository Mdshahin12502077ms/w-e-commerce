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

                            <h3 class="card-title">Add Product</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form action="{{ url('admin/Product/update',$product->id) }}" method="post" id="UserForm"
                            enctype="multipart/form-data">

                            @csrf
                    <div class="row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="text" name="name"class="form-control" id=""
                                    placeholder="Enter Product name" value="{{$product->name}}">
                                <font style="color:red">{{ $errors->has('name') ? $errors->first('name') : '' }}</font>
                            </div>


                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Product Code</label>
                                <input type="text" name="sku_code"class="form-control" id=""
                                    placeholder="Enter Product Code" value="{{$product->sku_code}}">
                                <font style="color:red">{{ $errors->has('sku_code') ? $errors->first('sku_code') : '' }}</font>
                            </div>




                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="" selected disabled>Select Category Name</option>
                                    @foreach ($category as $category)
                                        <option  {{ ($product->category_id==$category->id) ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <font style="color:red">{{ $errors->has('name') ? $errors->first('name') : '' }}</font>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Sub Category</label>
                                <select name="subcategory_id" id="" class="form-control">
                                    <option value="" selected disabled>Select Category Name</option>
                                    @foreach ($subcategory as $subcategory)
                                        <option {{($product->subcategory_id==$subcategory->id)?'selected':''}} value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                                <font style="color:red">{{ $errors->has('name') ? $errors->first('name') : '' }}</font>
                            </div>



                            <div class="form-group col-md-4">
                                <label for="exampleInputFile">Product Image</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" accept="image" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <font style="color:red">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                                  </div>
                            </div>
                            <div><img src="{{asset($product->image)}}" alt="" height="100px" width="100px"></div>
                            </div>


                              <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Regular PRICE</label>
                                <input type="text" name="regular_price"class="form-control" id=""
                                    placeholder="Enter Product Regular Price" value="{{$product->regular_price}}">
                                <font style="color:red">{{ $errors->has('regular_price') ? $errors->first('regular_price') : '' }}</font>
                            </div>

                              <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Discount Price</label>
                                <input type="text" name="discount_price"class="form-control" id=""
                                    placeholder="Enter Product Discount Price" value="{{$product->discount_price}}">
                                <font style="color:red">{{ $errors->has('discount_price') ? $errors->first('discount_price') : '' }}</font>
                            </div>

                              <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Buying Price</label>
                                <input type="text" name="buy_price"class="form-control" id=""
                                    placeholder="Enter Product Buying Price" value="{{$product->buy_price}}">
                                <font style="color:red">{{ $errors->has('buy_price') ? $errors->first('buy_price') : '' }}</font>
                            </div>

                              <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Quantity</label>
                                <input type="text" name="quantity"class="form-control" id=""
                                    placeholder="Enter Product Quantity" value="{{$product->quantity}}">
                                <font style="color:red">{{ $errors->has('quantity') ? $errors->first('quantity') : '' }}</font>
                            </div>





                            <div class="form-group col-md-4" id="color_fields">
                                <label for="exampleInputEmail1">Product Color</label>
                                @foreach ($product->color as $color )
                                       <input type="text" name="color_name[]"class="form-control" id="product_color"
                                    placeholder="Enter Product color" value="{{$color->name}}">
                                @endforeach

                                <font style="color:red">{{ $errors->has('name') ? $errors->first('name') : '' }}</font>
                            </div>
                            <button type="button" class="btn btn-primary" style="height: 40px;margin-top:5%" id="add_color">Add Color</button>

                            <div class="form-group col-md-4" id="size_fields">
                              <label for="exampleInputEmail1">Product Size</label>
                              @foreach ( $product->size as $size )
                              <input type="text" name="size_name[]"class="form-control" id="product_size"
                              placeholder="Enter Product Size" value="{{$size->name}}">
                              @endforeach

                              <font style="color:red">{{ $errors->has('name') ? $errors->first('name') : '' }}</font>
                          </div>
                              <button type="button" class="btn btn-primary" style="height: 40px;margin-top:5%" id="add_size">Add Size</button>


                              <div class="form-group col-md-4"id="image_fields">
                                <label for="exampleInputFile">Product Image</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" accept="image/*" multiple name="gelary_img[]">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <font style="color:red">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                                  </div>
                                </div>
                                <div style="display:flex">
                                @foreach ($product->galleryImage as $image)

                                    <div style="margin-right: 2%"><img src="{{asset($image->g_image)}}" alt="" height="100px" width="100px"></div>


                                @endforeach
                            </div>
                            </div>
                            <button type="button" class="btn btn-primary" style="height: 40px;margin-top:5%" id="add_img">Add Image </button>



                              <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Product Type</label>
                                <select name="product_type" id="" class="form-control">
                                    <option value="" selected disabled>Select Product Type</option>

                                        <option value="hot"{{($product->product_type=='hot'?'selected':'')}}>Hot Products</option>
                                        <option value="new"{{($product->product_type=='new')?'selected':''}}>New Arrival</option>
                                        <option value="regular"{{($product->product_type=='regular')?'selected':''}}>Regular Products</option>
                                        <option value="discount"{{($product->product_type=='discount')?'selected':''}}>Discount Products</option>

                                </select>
                                <font style="color:red">{{ $errors->has('product_type') ? $errors->first('product_type') : '' }}</font>
                            </div>



                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Short Description</label>
                                <div class="card-body col-md-12">
                                    <textarea id="summernote1"class="form-control" name="short_description">
                                      {{$product->short_description}}
                                </textarea>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Short Description</label>
                                <div class="card-body col-md-12">
                                    <textarea id="summernote2"class="form-control" name="long_description">
                                        {{$product->long_desc}}
                                </textarea>
                                </div>
                            </div>


                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Short Description</label>
                                <div class="card-body col-md-12">
                                    <textarea id="summernote3"class="form-control" name="product_policy">
                                        {{$product->product_policy}}
                                </textarea>
                                </div>
                            </div>


                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">update</button>
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
      $('#summernote1').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>

<script>
    $(function () {
      // Summernote
      $('#summernote2').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>

<script>
    $(function () {
      // Summernote
      $('#summernote3').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>
<script>
    $(document).ready(function(){
        $("#add_color").click(function(){
            $("#color_fields").append('<input type="text" name="color_name[]"class="form-control mt-2" id="product_color"placeholder="Enter Product color">');
        });
    });
</script>

<script>
  $(document).ready(function(){
    $("#add_size").click(function(){
      $("#size_fields").append('<input type="text" name="size_name[]"class="form-control mt-2" id="product_size"placeholder="Enter Product size">')
    });
  });
</script>

<script>
  $(document).ready(function(){
    $("#add_img").click(function(){
      $("#image_fields").append('<div class="input-group"><div class="custom-file"><input type="file" class="custom-file-input" id="exampleInputFile" accept="image" name="gelary_img[]"><label class="custom-file-label" for="exampleInputFile">Choose file</label></div></div>')
    });
  });
</script>
@endpush
