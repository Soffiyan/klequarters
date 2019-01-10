<?php
include 'head_foot/header.php';
include 'head_foot/leftside.php';
?>
<script>
    function getparticulars_data(val)
    {
        $.ajax({
            type: 'post',
            url: 'pages/javafun.php',
            data: {
                particular_code: val,
                stepp: 'one'
            },
            success: function (response) {
                document.getElementById("his").innerHTML = response;

            }
        });
    }
</script>    
<div class="content-wrapper">
    <div class="page-title" id="hidden-print">
        <div>
            <h1>Quarters / Particulars Report</h1>
        </div>        
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <form class="form-horizontal" method = "post" action = ""enctype="multipart/form-data">
                    <fieldset>
                        <div class="col-lg-4">
                            <div class="form-group" id="hidden-print">
                                <label  for="particulars">Select Particulars</label>
                                <select class="form-control hidden-print mt-20" id="demoSelect" name="particulars"onchange="getparticulars_data(this.value)">
                                    <optgroup >
                                        <option value="">Select</option>
                                        <?php
                                        $select = mysql_query("SELECT DISTINCT `particular` FROM `add_particulars`");

                                        while ($row = mysql_fetch_array($select)) {
                                            $rms = $row['particular'];
                                            $sels_id = mysql_query("SELECT particular_code FROM `add_particulars` where particular='$rms'");
                                            $rows_id = mysql_fetch_array($sels_id);
                                            ?>
                                            <option value="<?php echo $rows_id['particular_code']; ?>"><?php echo $row['particular']; ?></option>
                                        <?php } ?>    
                                    </optgroup>
                                </select>
                            </div>

                        </div>
                        <div id="his"></div>
                        
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <?php
    include 'head_foot/challanfooter.php';
    ?>