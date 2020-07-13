@extends('layouts.backend')

@section('main')
     <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>Create Role </h3>
            </div>

            <!--custom chart end-->
            <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Create Category </h4>

              <?php
                foreach($category as $category){


              ?>
               <form class="form-login" action="{{ url('catupdate') }}/{{ $category->id }}" method="post">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">



                <div class="form-group">
                  <label class="sr-only" for="exampleInputEmail2">Name </label>
                  <input type="text" name="name" value="<?php echo $category->name; ?>" class="form-control" id="exampleInputEmail2">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="exampleInputPassword2">Code</label>
                  <input type="text" name="code" value="<?php echo $category->code; ?>" class="form-control" id="exampleInputPassword2">
                </div>

                <?php } ?>
                <button type="submit" class="btn btn-theme">Save </button>
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
            <!-- /row -->

            <!-- /row -->

            <!-- /row -->
          </div>

@endsection
