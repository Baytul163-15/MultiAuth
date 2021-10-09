@extends('admin.admin_master')
@section('admin')
{{-- JQUERY CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container-full">
      <section class="content">
       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Product Edit</h4>
            <h6 class="box-subtitle">Bootstrap Form Validation check the</h6>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form action="{{ route('product.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $products->id }}">
                    <div class="row">
                      <div class="col-12">
                          
                        <div class="row">  {{-- 1st Row --}}
                            <div class="col-md-4">
                                <div class="form-group validate">
                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id" class="form-control" required="">
                                            <option value="" selected="" disabled="">Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected':'' }}> 
                                                    {{ $brand->brand_name_eng }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group validate">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control" required="">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected':'' }}> 
                                                    {{ $category->category_name_eng }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group validate">
                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" class="form-control" required="">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach ($subcategories as $subcat)
                                                <option value="{{ $subcat->id }}" {{ $subcat->id == $products->subcategory_id ? 'selected':'' }}>
                                                    {{ $subcat->subcategory_name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>  {{-- Row End --}}

                        <div class="row">  {{-- 2nd Row --}}
                            <div class="col-md-4">
                                <div class="form-group validate">
                                    <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subsubcategory_id" class="form-control" required="">
                                            <option value="" selected="" disabled="">Select SubSubCategory</option>
                                            @foreach ($subsubcategories as $subsubcat)
                                                <option value="{{ $subsubcat->id }}" {{ $subsubcat->id == $products->subsubcategory_id ? 'selected':'' }}>
                                                    {{ $subsubcat->subsubcategory_name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('subsubcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_en" class="form-control" value="{{ $products->product_name_en }}" required="">
                                        @error('product_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name Ban <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_hin" class="form-control" value="{{ $products->product_name_hin }}" required="">
                                        @error('product_name_hin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> {{-- Row End --}}

                        <div class="row">  {{-- 3rd Row --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_code" class="form-control" value="{{ $products->product_code }}" required="">
                                        @error('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_qty" class="form-control" value="{{ $products->product_qty }}" required="">
                                        @error('product_qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Tags En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_en" value="{{ $products->product_tags_en }}" value="Lorem,Ipsum,Amet" data-role="tagsinput" class="form-control" required="">
                                        @error('product_tags_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> {{-- Row End --}}

                        <div class="row">  {{-- 4th Row --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Tags Ban <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_hin" value="{{ $products->product_tags_hin }}" value="Lorem,Ipsum,Amet" data-role="tagsinput" class="form-control" required="">
                                        @error('product_tags_hin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Size En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_en" value="{{ $products->product_size_en }}" value="Large,Small,Medium" data-role="tagsinput" class="form-control">
                                        @error('product_size_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Size Ban <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_hin" value="{{ $products->product_size_hin }}" value="Large,Small,Medium" data-role="tagsinput" class="form-control" >
                                        @error('product_size_hin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>                        
                        </div> {{-- Row End --}}

                        <div class="row">  {{-- 5th Row --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Color En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_en" value="{{ $products->product_color_en }}" value="Black,red,white" data-role="tagsinput" class="form-control" required="">
                                        @error('product_color_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Color Ban <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_hin" value="{{ $products->product_color_hin }}" value="Black,red,white" data-role="tagsinput" class="form-control" required="">
                                        @error('product_color_hin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Seeling Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="selling_price" value="{{ $products->selling_price }}" class="form-control" required="">
                                        @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>                        
                        </div> {{-- Row End --}}

                        <hr/>
                        <div class="row">  {{-- 6th Row --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="discount_price" value="{{ $products->discount_price }}" class="form-control"> 
                                        @error('discount_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                
                            </div>
                            <div class="col-md-4">
                                
                            </div> --}}
                        </div> {{-- Row End --}}
                        <hr/>

                        <div class="row">  {{-- 7th Row --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_descp_en" id="textarea" class="form-control" required="" placeholder="Short Description">{{ $products->short_descp_en }}</textarea>
                                        @error('short_descp_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description Bangla <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_descp_hin" id="textarea" class="form-control" required="" placeholder="Short Description">{{ $products->short_descp_hin }}</textarea>
                                        @error('short_descp_hin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>                       
                        </div> {{-- Row End --}}

                        <div class="row">  {{-- 8th Row --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Long Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor1" name="long_descp_en" required="" rows="10" cols="80">
                                            {{ $products->long_descp_en }}
                                        </textarea>
                                        @error('long_descp_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Long Description Bangla <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor2" name="long_descp_hin" required="" rows="10" cols="80">
                                            {{ $products->long_descp_hin }}
                                        </textarea>
                                        @error('long_descp_hin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>                       
                        </div> {{-- Row End --}}
                        <hr/>  
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{ $products->hot_deals == 1 ? 'checked':'' }}>
                                            <label for="checkbox_2">Hot Deals</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $products->featured == 1 ? 'checked':'' }}>
                                            <label for="checkbox_3">Featured</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{ $products->special_offer == 1 ? 'checked':'' }}>
                                            <label for="checkbox_4">Special Offer</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{ $products->special_deals == 1 ? 'checked':'' }}>
                                            <label for="checkbox_5">Special Deals</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <div class="text-xs-right">
                          <input type="submit" value="Update Product" class="btn btn-rounded btn-info mb-5 mb-5">
                      </div>
                  </form>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->

      <section class="content">
          <div class="row">
              <div class="col-md-12">
                  <div class="box bt-3 border-info">
                      <div class="box-header">
                        <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                      </div>
                      <form action="{{ route('product.img.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            @foreach($multiimage as $img)
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="width:280px; height:130px">
                                    <div class="card-body">
                                      <h5 class="card-title">
                                          <a href="{{ route('product.multiimg.delete',$img->id) }}" class="btn btn-danger btn-sm" title="Delete Data"><i class="fa fa-trash"></i></a>
                                      </h5>
                                      <p class="card-text">
                                          <div class="form-group">
                                              <label class="form-control-label">Change Image<span class="text-danger">*</span></label>
                                              <input type="file" class="form-control" name="multi_img[{{ $img->id }}]">
                                          </div>
                                      </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" value="Update Image" class="btn btn-rounded btn-info mb-5 mb-5">
                        </div>
                      </form>
                  </div>
              </div>
          </div>
      </section>

      <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                      <h4 class="box-title">Product Thambnile Image <strong>Update</strong></h4>
                    </div>
                    <form action="{{ route('product.thambnail.update') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value={{ $products->id }}>
                      <input type="hidden" name="old_img" value="{{ $products->product_thambnail }}">
                      <div class="row row-sm">
                          <div class="col-md-3">
                              <div class="card">
                                  <img src="{{ asset($products->product_thambnail) }}" class="card-img-top" style="width:280px; height:130px">
                                  <div class="card-body">
                                    <p class="card-text">
                                        <div class="form-group">
                                            <label class="form-control-label">Change Image<span class="text-danger">*</span></label>
                                            <input type="file" name="product_thambnail" class="form-control" onchange="mainThamUrl(this)" required="">
                                            <img src="" id="mainThmb">
                                        </div>
                                    </p>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="text-xs-right">
                          <input type="submit" value="Update Image" class="btn btn-rounded btn-info mb-5 mb-5">
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id){
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="subsubcategory_id"]').html('');
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">'+ value.subcategory_name_en +'</option>');
                            });
                        },
                    });
                }else{
                    alert('danger');
                }
            });

            $('select[name="subcategory_id"]').on('change', function(){
                var subcategory_id = $(this).val();
                if(subcategory_id){
                    $.ajax({
                        url: "{{ url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            var d =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">'+ value.subsubcategory_name_en +'</option>');
                            });
                        },
                    });
                }else{
                    alert('danger');
                }
            });
        });
    </script>

    {{-- Main_Thambnail --}}
    <script type="text/javascript">
        function mainThamUrl(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data
                    
                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                            .height(80); //create image element 
                                $('#preview_img').append(img); //append image to output element
                            };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });
                    
                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endsection