@extends('layouts.backend')
@section('main')
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-9 main-chart">
                <!--CUSTOM CHART START -->
                <div class="border-head">
                    <h3>Category Form Role</h3>
                </div>
                <!--custom chart end-->
                <div class="row mt">
                    <div class="col-lg-12">
                        @if(Session::has('message'))

                            {{Session::get('message')}}

                        @endif
                        <div class=" form">
                            <form action="{{route('productsave')}}" method="post" class="cmxform form-horizontal style-form" id="commentForm" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-2">Select Category</label>

                                    <div class="col-lg-10">

                                        <select name="category_id" id="cat_id" class=" form-control browser-default custom-select">
                                            @foreach($categories as $category)

                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                </div>



                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Product Name/title (required)</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="cname" name="title" minlength="2" type="text" required="">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">Buy price (required)</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="cname" name="buy_price" minlength="2" type="number" required="">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">regular price (required)</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="cname" name="regular_price" minlength="2" type="number" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-2"> flat price  (required)</label>

                                    <div class="col-lg-10">
                                        <input class="form-control " id="cemail" type="number" name="flate_price" required="">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-2">Tag</label>

                                    <div class="col-lg-10">
                                        <input class="form-control " id="cemail" type="text" name="tag" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="cemail" class="control-label col-lg-2"> Product Short Description</label>

                                    <div class="col-lg-10">
                                        <textarea name="shortdes" >Mamurjor!</textarea>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-2"> Product Info  </label>

                                    <div class="col-lg-10">
                                        <textarea name="product_info" > Prouct Info!</textarea>
                                    </div>

                                </div>
                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-2"> Product Position   </label>

                                    <div class="col-lg-10">
                                        <textarea name="product_position" > Product Position</textarea>
                                    </div>

                                </div>
                                <div class="form-group ">

                                    <label for="cemail" class="control-label col-lg-2"> Product Photo  (required)</label>

                                    <div id="input_fields" class="col-lg-10">


                                        <input type="file" class="form-control" name="images[]" required>

                                    </div>
                                    <div class="col-lg-offset-2 col-lg-10">
                                    <button type="button" onclick="add()" id="addNew" class="mt-md-6 mt-0 mb-2 mb-md-0 btn btn-success">Add More Photo</button>
                                    </div>

                                </div>



                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-theme">Sign in</button>
                                        <button class="btn btn-theme04" type="button">Cancel</button>
                                    </div>
                                </div>

                            </form>


                        </div>
                        <!-- /form-panel -->
                    </div>
                    <!-- /col-lg-12 -->
                </div>
                <!-- /row -->

                <!-- /row -->

                <!-- /row -->

                <script>

                    function add(){



                        let field = `
                <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">

                                    <input type="file" class="form-control" name="images[]" required>
                                </div>
                            </div>

                            <div class="col-md-1 col pt-md-2 pt-0">
                                 <button type="button" class="remove mt-md-4 mt-0 mb-2 mb-md-0 btn btn-danger"><i class="fa fa-times-circle"></i></button>
                            </div>
                        </div>
            `;
                        $("#input_fields").append(field);


                        $(document).on('click', '.remove', function(){
                            $(this).parent('.col').parent('.row').remove();
                        });

                    }
                </script>



            </div>
        </div>
        <!-- /row -->
    </section>
@endsection
