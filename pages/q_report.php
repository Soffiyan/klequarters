
<?php

include 'head_foot/qheader.php';
include 'head_foot/qsidebar.php';
?>
<script>
    function get_stat(val) {
        $.ajax({
            type: 'post',
            url: 'pages/jfunctions.php',
            data: {
                get_stat: val
            },
            success: function (response) {
                document.getElementById("her").innerHTML = response;
            }
        });
    }
</script>
<style>
    .info-box-number {
        font-size: 27px!important;
    }
    label 
    {
        font-size: 17px!important;
    }
</style>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Quarter's Report</h1>
        </div>        
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <div class="row">                   
                    <fieldset>
                        <div class="col-lg-4">

                            <div class="form-group">
                                <label  for="select_institute">Select Status</label>
                                <select style="width:100%" class="form-control" id="demoSelect4" name="sd" onchange="get_stat(this.value);">
                                    <optgroup >
                                        <option value="">Select</option>
                                        <option value='all'>All-Quarters</option>
                                        <option value='used'>Alloted</option>
                                        <option value=''>Not-Alloted</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <div class="row">                   
                    <fieldset>
                        <div class='col-md-12'>
                            <div id='her'></div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

include 'head_foot/footer.php';
?>
