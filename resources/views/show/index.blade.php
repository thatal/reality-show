@extends('admin/layouts/admin')
@section('title')
Change Password
@stop
@section('content')
    <div class="container">
        <div class="row">
           <div class="span12"> 	      		
	      		<div class="widget ">	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>Show Details</h3>
	  				</div> <!-- /widget-header -->
					<div class="widget-content">						
						<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li class="active">
						    <a href="#formcontrols" data-toggle="tab">Create </a>
						  </li>
						  <li><a href="#jscontrols" data-toggle="tab">Views</a></li>
						</ul>
						<br>						
							<div class="tab-content">
								<div class="tab-pane active" id="formcontrols">
                                    <form id="edit-profile" class="form-horizontal">
                                        <fieldset>
                                            <div class="control-group">											
                                                <label class="control-label" for="username">Username</label>
                                                <div class="controls">
                                                    <input type="text" class="span6 form-control disabled input-sm" id="username" value="Example" disabled="">
                                                    <p class="help-block">Your username is for logging in and cannot be changed.</p>
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            <div class="control-group">											
                                                <label class="control-label" for="firstname">First Name</label>
                                                <div class="controls">
                                                    <input type="text" class="span6 form-control input-sm" id="firstname" value="John">
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            <div class="control-group">											
                                                <label class="control-label" for="lastname">Last Name</label>
                                                <div class="controls">
                                                    <input type="text" class="span6 form-control input-sm" id="lastname" value="Donga">
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            
                                            
                                            <div class="control-group">											
                                                <label class="control-label" for="email">Email Address</label>
                                                <div class="controls">
                                                    <input type="text" class="span4 form-control input-sm" id="email" value="john.donga@egrappler.com">
                                                </div> <!-- /controls -->				
                                            </div> <!-- /control-group -->
                                            <div class="form-group row">
                                                <label class="control-label col-sm-5">New Testing</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="name" class="form-control" placeholder="Name Form Control">
                                                </div>

                                            </div>
                                            
                                            
                                                
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">Save</button> 
                                            </div> <!-- /form-actions -->
                                        </fieldset>
                                    </form>
								</div>
								
								<div class="tab-pane" id="jscontrols">
									<table class="table table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Sl.No</th>
                                                <th>Show Name</th>
                                                <th>Status</th>
                                                <th colspan="2">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td id="id" sun-data-val="1">1</td>
                                                <td id="name" sun-data-val="Singing">Singing</td>
                                                <td><span class="badge badge-danger">Active</span></td>
                                                <td><button type="button" class="btn btn-xs btn-info" onclick="EditShow(this)">Edit</button></td>
                                                <td>Disable</td>
                                            </tr>
                                            <tr>
                                                <td id="id" sun-data-val="2">2</td>
                                                <td id="name" sun-data-val="Dancing">Dancing</td>
                                                <td><span class="badge badge-danger">Active</span></td>
                                                <td><button type="button" class="btn btn-xs btn-info" onclick="EditShow(this)">Edit</button></td>
                                                <td>Change Status</td>
                                            </tr>
                                        </tbody>
                                    </table>
								</div>
								
							</div>
						  
						  
						</div>
					</div> <!-- /widget-content -->
				</div> <!-- /widget -->
		    </div>
        </div> 
    </div>
    <div class="modal fade" id="editShow">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Show Edit</h4>
                </div>
                    <form class="" id="showedit" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="show_name">Show Name</label>
                            <input type="hidden" name="show_id" id="modal_show_id">
                            <input type="name" name="show_name" id="modal_show_name" class="form-control" required data-match-error="Show Required">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('js_page')
<script type="text/javascript">
    $(document).ready(function(){
        $('#form-validator').validator();
        $('#showedit').validator();
    });
    EditShow = function (Obj){
        var id      = $(Obj).parents('tr').find('#id').attr('sun-data-val');
        var name    = $(Obj).parents('tr').find('#name').attr('sun-data-val');
        $('#editShow').find('#modal_show_id').val(id);
        $('#editShow').find('#modal_show_name').val(name);
        $('#editShow').modal();
    }
</script>
@stop