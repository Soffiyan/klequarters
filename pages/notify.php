<?php
include 'head_foot/header.php';
include 'head_foot/leftside.php';
?>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1><i class="fa fa-bell-o"></i> Form Notifications</h1>
            <p>Jquery Plugins to notify user status about some action.</p>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">Form Notifications</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-title-w-btn">
                    <h3 class="title">Bootstrap Notify</h3>
                    <p><a class="btn btn-primary icon-btn" href="http://bootstrap-notify.remabledesigns.com/" target="_blank"><i class="fa fa-file"></i>Docs</a></p>
                </div>
                <div class="card-body">
                    <p>This plugin can be used to notify user about status of some action which he has performed.</p>
                    <h4>Demo</h4><a class="btn btn-info" id="demoNotify" href="#">Sample Notification</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-title-w-btn">
                    <h3 class="title">SweetAlert</h3>
                    <p><a class="btn btn-primary icon-btn" href="http://t4t5.github.io/sweetalert/" target="_blank"><i class="fa fa-file"></i>Docs</a></p>
                </div>
                <div class="card-body">
                    <p>This plugin can be used as the replacement of native javascript alert, confirm and prompt functions.</p>
                    <h4>Demo</h4><a class="btn btn-info" id="demoSwal" href="#">Sample Alert</a>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="view/theme/dist/js/jquery-2.1.4.min.js"></script>
    <script src="view/theme/dist/js/bootstrap.min.js"></script>
    <script src="view/theme/dist/js/plugins/pace.min.js"></script>
    <script src="view/theme/dist/js/main.js"></script>
    <script type="text/javascript" src="view/theme/dist/js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript" src="view/theme/dist/js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript">
      $('#demoNotify').click(function(){
      	$.notify({
      		title: "Update Complete : ",
      		message: "Something cool is just updated!",
      		icon: 'fa fa-check' 
      	},{
      		type: "info"
      	});
      });
      $('#demoSwal').click(function(){
      	swal({
      		title: "Are you sure?",
      		text: "You will not be able to recover this imaginary file!",
      		type: "warning",
      		showCancelButton: true,
      		confirmButtonText: "Yes, delete it!",
      		cancelButtonText: "No, cancel plx!",
      		closeOnConfirm: false,
      		closeOnCancel: false
      	}, function(isConfirm) {
      		if (isConfirm) {
      			swal("Deleted!", "Your imaginary file has been deleted.", "success");
      		} else {
      			swal("Cancelled", "Your imaginary file is safe :)", "error");
      		}
      	});
      });
    </script>

<?php
include 'head_foot/footer.php';
?>