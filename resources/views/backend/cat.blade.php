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
                <!-- INLINE FORM ELELEMNTS -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Category Form</h4>
                            <form class="form-login" action="{{route('catsave')}}" method="POST">
                                <input type ="hidden" name="_token" value="<?php echo csrf_token();?>">
                                <h2>
                                    @if(Session::has('message'))
                                        {{Session::get('message')}}
                                    @endif

                                </h2>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail2">Name</label>
                                    <input type="text" name="name"  class="form-control" id="exampleInputEmail2" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputPassword2">Code</label>
                                    <input type="text" name="code" class="form-control" id="exampleInputPassword2" placeholder="Enter Code">
                                </div>
                                <button type="submit" class="btn btn-theme">Sign in</button>
                            </form>
                        </div>
                        <!-- /form-panel -->
                    </div>
                    <!-- /col-lg-12 -->
                </div>
                <!-- /row -->

                <!-- /row -->
            </div>
            <!-- /col-lg-9 END SECTION MIDDLE -->
            <!-- **********************************************************************************************************************************************************
                RIGHT SIDEBAR CONTENT
                *********************************************************************************************************************************************************** -->

        </div>
        <!-- /row -->
    </section>
@stop
