<div class="container-fluid">

    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="dashboard-card bg-gradient-primary border-0">
                <div class="board-img"><img src="{{asset('/bsbmd/images/italy.png')}}"></div>
                <div class="dashboard-card-inner">
                     <div class="board-item row m-0">
        	          <div class="board-tit">Total Properties</div>
        	          <div class="board-txt">{{isset($total_prop_count)? $total_prop_count :'0'}}</div>
        	     </div>
                     <div class="board-item row m-0">
        	          <div class="board-tit">Total Property Enquiries</div>
        	          <div class="board-txt">{{$prop_enq_cnt or '0'}}</div>
        	     </div>
                     <div class="board-item row m-0">
        	          <div class="board-tit">Total Property Offer</div>
        	          <div class="board-txt">{{$prop_offers_cnt or '0'}}</div>
        	     </div>
                </div>
                <p class="m-0">
                    <a href="{{url('')}}/admin/properties" class="board-link">See details</a>
                </p>
            </div>
        </div>
    <div class="col-md-3">
        <div class="dashboard-card bg-gradient-info border-0">
             <div class="board-img"><img src="{{asset('/bsbmd/images/blog-board.svg')}}"></div>
             <div class="dashboard-card-inner">
        	  <div class="board-item row m-0">
        	      <div class="board-tit">Total Blog</div>
        	       <div class="board-txt">{{isset($total_blog_count)? $total_blog_count : '0'}}</div>
        	  </div>
                  <div class="board-item row m-0">
        	       <div class="board-tit">Total FAQ's</div>
        	       <div class="board-txt">{{$faq_cnt or '0'}}</div>
                  </div>
                  <div class="board-item row m-0">
        	       <div class="board-tit">Total FAQ's Enquiries</div>
        	       <div class="board-txt">{{$contact_faq_enq_cnt or '0'}}</div>
        	  </div>
            </div>
            <p class="m-0">
                <a href="{{url('')}}/admin/add-post" class="board-link">See details</a>
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="dashboard-card bg-gradient-danger border-0">
             <div class="board-img"><img src="{{asset('/bsbmd/images/inbox.svg')}}"></div>
             <div class="dashboard-card-inner">
        	  <div class="board-item row m-0">
        	       <div class="board-tit">Total Inbox</div>
        	       <div class="board-txt">{{isset($total_inbox_count)? $total_inbox_count : ''}}</div>
        	  </div>
                  <div class="board-item row m-0">
        	       <div class="board-tit">Total Contact Enquiries</div>
        	       <div class="board-txt">{{$contact_enq_cnt or '0'}}</div>   
                  </div>
                  <div class="board-item row m-0">
        	       <div class="board-tit">Unread</div>
        	       <div class="board-txt">{{isset($total_inbox_unread)? $total_inbox_unread : ''}}</div>
        	  </div>
            </div>
            <p class="m-0">
                <a href="{{url('')}}/admin/inbox" class="board-link">See details</a>
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="dashboard-card bg-gradient-default border-0">
             <div class="board-img"><img src="{{asset('/bsbmd/images/employee.svg')}}"></div>
             <div class="dashboard-card-inner">
        	  <div class="board-item row m-0">
        	       <div class="board-tit">Total Users</div>
        	       <div class="board-txt">{{isset($total_user_count)? $total_user_count :'0'}}</div>
        	  </div>
                  <div class="board-item row m-0">
        	       <div class="board-tit">Total Agents</div>
        	       <div class="board-txt">{{isset($total_agents)? $total_agents :'0'}}</div>
                  </div>
                  <div class="board-item row m-0">
        	       <div class="board-tit">Total Destinations</div>
        	       <div class="board-txt">{{$dest_cnt or '0'}}</div>
        	  </div>
            </div>
            <p class="m-0">
                <a href="{{url('')}}/admin/users" class="board-link">See details</a>
            </p>
        </div>
    </div>
</div>
    <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Recent Properties</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>Property ID</th>
                                    <th>Property Name</th>
                                    <th>Availability</th>
                                    <th>Agency</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- {{ count($property_obj)}} -->
                            @php
                           
                              foreach($properties as $prop){
                                
                            @endphp

                             
                                <tr>
                                    <td>{{$prop->property_id}}</td>
                                    <td>{{$prop->name}}</td>
                                    @if($prop->availability == 'Y')

                                        <td><span class="label bg-green">Yes</span></td>
                                    @else 
                                        <td><span class="label bg-red">No</span></td>
                                    @endif

                                    <td>{{$prop->property_agent['agent_name']}}</td>
                                </tr>
                            @php
                        
                        }
                           @endphp
                                
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Task Info -->
    </div>
    <div class="row">
       <!-- Browser Usage -->
       <div class="col-md-9">
            <div class="card chartbox">
                <h3 class="chart-tit">Chart</h3>
                <div id="chartdiv"></div>
            </div>
        </div>
        <!-- #END# Browser Usage -->
        @role('admin|superadmin')
        <div class="col-md-3">
            <div class="create-box-wrap">
                 <div class="create-box">
                      <h4>Create New Property</h4>
                      <div><a href="{{url('')}}/admin/properties/create" class="create-link">Create</a></div>
                 </div>
                 <div class="create-box">
                      <h4>Create New Blog</h4>
                      <div><a href="{{url('')}}/admin/add-post/create" class="create-link">Create</a></div>
                 </div>
            </div>
        </div>
        @endrole
   </div>
</div>

@section('extra-script')
{{--{{Html::script('bsbmd/plugins/jquery-countto/jquery.countTo.js')}}
{{Html::script('bsbmd/plugins/raphael/raphael.min.js')}}
{{Html::script('bsbmd/plugins/morrisjs/morris.js')}}
{{Html::script('bsbmd/plugins/chartjs/Chart.bundle.js')}}
{{Html::script('bsbmd/plugins/flot-charts/jquery.flot.js')}}
{{Html::script('bsbmd/plugins/flot-charts/jquery.flot.resize.js')}}
{{Html::script('bsbmd/plugins/flot-charts/jquery.flot.pie.js')}}
{{Html::script('bsbmd/plugins/flot-charts/jquery.flot.categories.js')}}
{{Html::script('bsbmd/plugins/flot-charts/jquery.flot.time.js')}}
{{Html::script('bsbmd/plugins/jquery-sparkline/jquery.sparkline.js')}}
{{Html::script('bsbmd/js/pages/index.js')}}--}}



@endsection