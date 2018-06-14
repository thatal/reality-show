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
                    <!-- PAGE CONTENT BEGINS -->
                    {{-- <div class="widget-box  ui-sortable-handle" id="widget-box-1">
                        <div class="widget-header">
                            <h5 class="widget-title"><i class="ace-icon fa fa-table"></i> Default Widget Box</h5>

                            <div class="widget-toolbar">
                                <div class="widget-menu">
                                    <a href="#" data-action="settings" data-toggle="dropdown">
                                        <i class="ace-icon fa fa-bars"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
                                        <li>
                                            <a data-toggle="tab" href="#dropdown1">Option#1</a>
                                        </li>

                                        <li>
                                            <a data-toggle="tab" href="#dropdown2">Option#2</a>
                                        </li>
                                    </ul>
                                </div>

                                <a href="#" data-action="fullscreen" class="orange2">
                                    <i class="ace-icon fa fa-expand"></i>
                                </a>

                                <a href="#" data-action="reload">
                                    <i class="ace-icon fa fa-refresh"></i>
                                </a>

                                <a href="#" data-action="collapse">
                                    <i class="ace-icon fa fa-chevron-up"></i>
                                </a>

                                <a href="#" data-action="close">
                                    <i class="ace-icon fa fa-times"></i>
                                </a>
                            </div>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main"> --}}
                                <div class="tabbable">
                                    <ul class="nav nav-tabs" id="myTab">
                                        <li class="active">
                                            <a data-toggle="tab" href="#home">
                                                <i class="green ace-icon fa fa-home bigger-120"></i>
                                                Create
                                            </a>
                                        </li>

                                        <li>
                                            <a data-toggle="tab" href="#messages">
                                                <i class="green ace-icon fa fa-eye bigger-120"></i>
                                                View
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <h4>New Show</h4>
                                                    <hr>
                                                    <form class="form-horizontal form-validator">
                                                        <div class="form-group row">
                                                            <label class="control-label col-xs-3 no-padding-right">Show name</label>
                                                            <div class="col-xs-6">
                                                                <input type="text" name="name" class="form-control" placeholder="name"required minlength="6">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="control-label col-xs-3 no-padding-right">Show name</label>
                                                            <div class="col-xs-6">
                                                                <input type="text" name="name" class="form-control" placeholder="name"required minlength="6">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="control-label col-xs-3 no-padding-right">Show name</label>
                                                            <div class="col-xs-6">
                                                                <input type="text" name="name" class="form-control" placeholder="name"required minlength="6">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix form-actions">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button class="btn btn-sm btn-success" type="submit">
                                                                    <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                                                                    Submit
                                                                </button>

                                                                &nbsp; &nbsp; &nbsp;
                                                                <button class="btn btn-sm" type="reset">
                                                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                                                    Reset
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="messages" class="tab-pane fade">
                                            <table class="table table-bordered table-condensed table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Show 1</td>
                                                        <td><span class="label label-success arrowed-in">Active</span></td>
                                                        <td><button type="button" class="btn btn-xs btn-info">Edit</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            {{-- </div>
                        </div>
                    </div> --}}
                    <!-- PAGE CONTENT ENDS -->
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