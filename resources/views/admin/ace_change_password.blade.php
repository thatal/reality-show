@extends('admin/layouts/ace')
@section('content')
        <div class="page-header">
            <h1>
                Dashboard
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Change Password
                </small>
            </h1>
        </div>
        @include('admin/include/alert')
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="widget-box  ui-sortable-handle" id="widget-box-1">
                        <div class="widget-header">
                            <h5 class="widget-title"><i class="ace-icon fa fa-table"></i> Change Password</h5>

                           {{--  <div class="widget-toolbar">
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
                            </div> --}}
                        </div>

                        <div class="widget-body">
                            <div class="widget-main">
                                
                                {!!Form::open(['url' => route('admin.change_pass.post'), 'class' => 'form-horizontal form-validator'])!!}
                                    <br>
                                    @if (\Session::has('message'))
                                        <div class="alert {!!\Session::get('alert')!!}">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{!!\Session::get('message')!!}</strong> 
                                        </div>
                                    @endif
                                    <div class="form-group row {{ $errors->has('old_password') ? ' has-error' : '' }}">
                                        <label class="control-label col-xs-3 no-padding-right">Current Password</label>
                                        <div class="col-xs-6">
                                            <input type="password" name="old_password" class="form-control" placeholder="Current Password" required minlength="6">
                                                <div class="help-block with-errors">
                                                    @if($errors->has('old_password')) 
                                                            {!!$errors->first('old_password')!!}
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('new_password') ? ' has-error' : '' }}">
                                        <label class="control-label col-xs-3 no-padding-right">New Password</label>
                                        <div class="col-xs-6">
                                            <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password" required minlength="6">
                                            <div class="help-block with-errors">
                                                @if($errors->has('new_password')) 
                                                    {!!$errors->first('new_password')!!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                                        <label class="control-label col-xs-3 no-padding-right">Confirm Password</label>
                                        <div class="col-xs-6">
                                            <input type="password" name="new_password_confirmation" class="form-control" placeholder="Confirm Password"required minlength="6" data-match="#new_password" data-match-error="Woops! Confirm password doesnot match.">
                                            <div class="help-block with-errors">
                                                @if($errors->has('new_password_confirmation')) 
                                                    {!!$errors->first('new_password_confirmation')!!}
                                                @endif
                                            </div>
                                            
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
                                {!!Form::close()!!}

                            </div>
                        </div>
                    </div>
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