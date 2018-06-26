@extends('admin/layouts/ace')
@section('content')
        <div class="page-header">
            <h1>
                Dashboard
               {{--  <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    top menu &amp; navigation
                </small> --}}
            </h1>
        </div>
        @include('admin/include/alert')
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <?php 
                        $artistArray = []; 
                        $artistImage = [];
                    ?>
                    @if(sizeof($userWiseVote))
                    <h3>{!!$userWiseVote->name!!} Voting Details</h3>
                    <hr>
                        @foreach($userWiseVote->artist_on_round_active as $UserIRound)
                        @if(sizeof($UserIRound->artist_active))
                            <?php
                                $sum_vote = 0;
                                foreach ($UserIRound->votes as $index => $per_voter) {
                                    $sum_vote += $per_voter->total_vote;
                                }
                                $artistArray[$UserIRound->artist_active->name] = $sum_vote;
                                $artistImage[$UserIRound->artist_active->name] = [
                                    'code' => $UserIRound->artist_active->code,
                                    'image' => $UserIRound->artist_image
                                ];

                            ?>
                            @endif
                        @endforeach
                        <?php 
                        if ($artistArray) {
                            arsort($artistArray); 
                        }
                            $widgetColor = [
                                'orange',
                                'blue',
                                'green',
                                'grey',
                            ];
                        ?>
                        <div class="row">
                            <?php 
                                $counter = 1; 
                                $label_color = "";
                                $prev_vote = 0;
                                $sl = 1;
                            ?>
                            @foreach($artistArray as $name => $total_vote)
                            <?php
                            //if two artist have same vote then
                                switch ($counter) {
                                    case 1:
                                        $label_color = "success";
                                        break;
                                    
                                    case 2:
                                        $label_color = "danger";
                                        break;
                                    
                                    
                                    case 3:
                                        $label_color = "info";
                                        break;
                                    
                                    default:
                                        $label_color = "inverse";
                                        break;
                                }
                            ?>
                                <div class="col-sm-6 col-md-3">
                                    <div class="widget-box ui-sortable-handle" id="widget-box-5">
                                        <div class="widget-header">
                                            <h5 class="widget-title smaller"><strong>{{$name}} | {{$artistImage[$name]['code']}}</strong></h5>

                                            {{-- <div class="widget-toolbar">
                                                <span class="label label-success">
                                                    16%
                                                    <i class="ace-icon fa fa-arrow-up"></i>
                                                </span>
                                            </div> --}}
                                        </div>

                                        <div class="widget-body">
                                            <div class="widget-main padding-6 text-center">
                                                {{-- <div class="alert alert-info"> Hello World! </div> --}}
                                                <img class="img-responsive" src="{{$artist_image_dir.$artistImage[$name]['image']}}">
                                            </div>
                                        </div>
                                        <div class="widget-toolbox padding-8 clearfix">
                                            {{-- <button class="btn btn-xs btn-danger pull-left"> --}}
                                            <label class="label label-{{$label_color}} arrowed-in arrowed-in-right">Total Vote : {{$total_vote}}</label>
                                            {{-- </button> --}}
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <?php 
                                    if ($sl%4 == 0) {
                                        //echo '<div class="hidden-sm hidden-xs"><hr></div>';
                                    }
                                    if ($sl%2 == 0) {
                                        //echo '<div class="hidden-lg hidden-md"><hr></div>';
                                    }

                                $counter ++;
                                $sl ++;
                                ?>
                            @endforeach                      
                        </div>
                    @else
                        <h3>No Active Round Found</h3>
                    @endif
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
@stop
@section('js_page')
<script type="text/javascript">
    $(document).ready(function(){
        console.log("Ready");
    });
</script>
    
@stop