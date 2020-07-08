@extends('layouts.backend')

@section('main')

        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Advanced Table Example
 {{--Session message show from controller  catsave method--}}
                @if(Session::has('message'))
                    {{Session::get('message')}}
                @endif

            </h3>
            <div class="row mb">
                <!-- page start-->
                <div class="content-panel">
                    <div class="adv-table">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                            <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Role Name</th>
                                <th> Role Code</th>
                                <th> Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $serial =0;
                                foreach ($categories as $category){
                                    $serial+=1;


                            ?>


                            <tr class="gradeX">
                                <th><?php echo $serial;?></th>
                                <th><?php echo $category ->name;?> </th>
                                <th> <?php echo $category ->code;?> </th>
                                <th> <a href="{{url('cateedit')}}/{{$category->id}}"<?php echo $category->id;?> > Edit </a> || <a href="{{url('catdelete')}}/{{$category->id}}" > Delete </a> </th>
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
