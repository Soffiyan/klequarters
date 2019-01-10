<?php
include 'head_foot/header.php';
include 'head_foot/leftside.php';
?>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1>Add User</h1>
        </div>        
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <form class="form-horizontal" method = "post" action = "?page=adduser&action=add"enctype="multipart/form-data">
                    <fieldset>
                        <div class="col-lg-4">

                            <div class="form-group">
                                <label for="uname">User Name</label>
                                <input class="form-control" name="uname" value="" id="uname" type="text" placeholder="Enter User Name"required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label  for="pass">Password</label>
                                <input class="form-control" name="pass" id="pass" type="password" placeholder="Enter Password"required>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label  for="mobile">Mobile No</label>
                                <input class="form-control" name="mobile" id="mobile" type="number" placeholder="Enter Mobile Number"required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3"></textarea><span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group" style="margin-top: 6px; text-align: ">
                                <input type="submit" value="Add User" class="btn btn-primary">
                            </div>
                        </div>
                    </fieldset>
                </form>
                <hr>
                <?php
                $result = mysql_query("select * from admin order by id desc");
                ?>
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>SI.no</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($row = mysql_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row[username] ?></td>
                                <td><?php echo $row[address] ?></td>
                                <td><?php echo $row[mobile] ?></td>
                                <td><a title="update" href='' onclick="return confirm('Are you sure want to edit')"><i class="fa fa-pencil fa-2x"style="font-size: 25px!important;color:blue!important;"  aria-hidden="true"></i></a>
                                    <a title="delete" href='?page=delusr&id=<?php echo $row[id]; ?>' onclick="return confirm('Are you sure want to delete')"><i class="fa fa-trash fa-2x" style="font-size: 25px!important;color:red!important;"  aria-hidden="true"></i></a>
                                </td> 
                            </tr>
                            <?php
                            $i = $i + 1;
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <?php
    include 'head_foot/footer.php';
    ?>