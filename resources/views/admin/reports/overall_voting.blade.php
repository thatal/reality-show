@extends('admin/layouts/ace')
@section('css_page')
<style type="text/css">
    .pointer{
        cursor: pointer;
    }
</style>
@stop
@section('content')
        <div class="page-header">
            <h1>
                Dashboard
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Reports
                </small>
            </h1>
        </div>
        @include('admin/include/alert')
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <h3>Overlall Voting Details</h3>
                    @if(sizeof($artistArrayList))
                        <?php 
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
                            @foreach($artistArrayList as $name => $total_vote)
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
                                                <img class="img-responsive pointer" src="{{$artist_image_dir."/".$artistImage[$name]['image']}}" onClick="getArtistData(this);" sun-data-id="{{Crypt::encrypt($artistImage[$name]['id'])}}">
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
                        <h3 class="bg-danger">Sorry Details not found.</h3>
                    @endif
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
        <div class="modal fade" id="artistDetailsVotes">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-calendar"></i> Round wise vote</h4>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
@stop
@section('js_page')
<script type="text/javascript">
    $(document).ready(function(){
        console.log("Ready");
    });
    function getArtistData(Obj){
        var $thisObj = $(Obj);
        var url = '{{url('system/ajax/artist_data')}}';
        url +="/"+$thisObj.attr('sun-data-id');
        $.get(url)
        .done(function(result){
            var html = "";
            html += "<table class='table table-bordered table-hover table-condensed'><thead><tr><th>Round</th><th>Vote</th></tr></thead><tbody>";
            console.log(result);
            var total = 0;
            $.each(result, function(index, el) {
                html +="<tr>";
                html += "<td>"+index+"</td>";
                html += "<td><strong> "+el+"</strong></td>";
                html +="</tr>";
                total +=el;
            });
            html +="<tbody><tr><th>Total</th><th><span class='label label-success arrowed-in'>  "+total+"</span></th></tr></tbody>";
            html +="</tbody></table>";
            $('#artistDetailsVotes').find('.modal-body').html(html);
            $('#artistDetailsVotes').modal();
        })
        .fail(function(){
            swal("Oops!!", "Something went Wrong",'error');
        })
        .always(function(){
        });
    }
</script>
    
@stop