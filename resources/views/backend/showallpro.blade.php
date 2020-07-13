@extends('layouts.backend')

@section('main')

        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Advanced Table Example</h3>
            <div class="row mb">
                <!-- page start-->
                <div class="content-panel">
                    <div class="adv-table">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                            <thead>
                            <tr>

                                <th>Serial</th>
                                <th class="hidden-phone">Product Name</th>
                                <th class="hidden-phone">Buy price</th>
                                <th class="hidden-phone">Tag</th>
                                <th class="hidden-phone">Product Photo</th>
                                <th class="hidden-phone">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $serial =0;
                            foreach ($products as $product){
                                $serial+=1;


                                ?>
                            <tr class="gradeX">
                                <th><?php echo $serial;?></th>
                                <th><?php echo $product ->title;?> </th>
                                <th> <?php echo $product ->buy_price;?> </th>
                                <th> <?php echo $product ->tag;?> </th>
 
                               <th>  <img src="{{$product->feature_image}}"  style="height: 60px; width: 60px;"/>  </th>
                                <th> <a href=" "  > Edit </a> || <a href=" {{url('prodelete')}}/{{$product->id}}" > Delete </a> </th>

                            </tr>

                            <?php

                            }   ?>


                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- page end-->
            </div>
        </section>

@stop
