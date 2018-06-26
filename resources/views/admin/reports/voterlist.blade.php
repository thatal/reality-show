@extends('admin/layouts/ace')
@section('title')
Voter List
@stop
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
                    <div class="table-header">
                        <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer white"></i> Voter List
                    </div>
                    <div class="clearfix">
                        <div class="pull-right tableTools-container"></div>
                    </div>

                    @if(sizeof($all_voters))
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover data_table1">
                            <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Mobile Number</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Total Votes</th>
                                    <th>Date of Registration</th>
                                    <th>Date of Activation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_voters as $k => $v)
                                    <tr>
                                        <td>{{$k+1}}</td>
                                        <td>{{$v->mobile}}</td>
                                        <td>{{$v->name == ''? 'NA' : $v->name }}</td>
                                        <td><span class="label label-{{$v->status == 'active' ? 'success' : 'danger'}}">{{str_replace('_', ' ', $v->status)}}</span></td>
                                        <td>{{$v->sum_votes()}}</td>
                                        <td>{{date('Y-m-d h:i a', strtotime($v->date_of_registration)) }}</td>
                                        <td>{{date('Y-m-d h:i a', strtotime($v->date_of_activation)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $all_voters->links() }}
                    </div>
                    @else
                        <h3 class="bg-danger">Sorry Records not found.</h3>
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