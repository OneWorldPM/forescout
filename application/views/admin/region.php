<div class="main-content" >
    <div class="wrap-content container" id="container">
        <form name="frm_credit" id="frm_credit" method="POST" action="">
            <div class="container-fluid container-fullw bg-white">
                <div class="row" id="add_region_session" style="display: none">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-primary" id="panel5">
                            <div class="panel-heading">
                                <h4 class="panel-title text-white">Add Region</h4>
                            </div>
                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb;">
                                <div class="row" >
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="form-group">
                                            <label class="text-large">Title:</label>
                                            <input type="text" name="title" id="title" placeholder="Title" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-large">Description:</label>
                                            <textarea type="text" name="description" id="description" placeholder="Description" style="color: #000;" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-large">Start Date:</label>
                                            <input type="text" name="start_date" id="start_date" class="form-control datepicker">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-large">End Date:</label>
                                            <input type="text" name="end_date" id="end_date" class="form-control datepicker">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-large">Start Time:</label>
                                            <input type="time" name="start_time" id="start_time" placeholder="Start Time" class="form-control">
                                            <input type="hidden" name="tbl_region_id" id="tbl_region_id" value="0">
                                            <input type="hidden" name="cr_type" id="cr_type" value="save">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-large">End Time:</label>
                                            <input type="time" name="end_time" id="end_time" class="form-control">
                                        </div>
                                        <h5 class="over-title margin-bottom-15">
                                            <button type="button" id="save_region" name="save_region" class="btn btn-green add-row">
                                                Submit
                                            </button>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">                     
                    <div class="col-md-12">
                        <div class="panel panel-light-primary" id="panel5">
                            <div class="panel-heading">
                                <h4 class="panel-title text-white">Region</h4>
                            </div>
                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb;">
                                <span id="errortxtsendemail" style="color:red;"></span>
                                <h5 class="over-title margin-bottom-15 margin-top-5">Region<span class="text-bold"></span></h5>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-full-width" id="plan_table">
                                        <thead>
                                            <tr>
                                                <th>Region</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Action</th>                          
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($region)) {
                                                foreach ($region as $val) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $val->region_name ?></td>
                                                        <td><?= $val->title ?></td>
                                                        <td><?= $val->description ?></td>
                                                        <td><?= date("Y-m-d", strtotime($val->start_date)) ?></td>
                                                        <td><?= date("Y-m-d", strtotime($val->end_date)) ?></td>
                                                        <td><?= date("h:i:s", strtotime($val->start_time)) ?></td>
                                                        <td><?= date("h:i:s", strtotime($val->end_time)) ?></td>
                                                        <td> 
                                                            <a class="btn btn-primary btn-sm edit_region" data-id="<?= $val->tbl_region_id ?>" href="#">
                                                                <i class="fa fa-pencil"></i> Edit
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>   
        <!-- end: DYNAMIC TABLE -->
    </div>
</div>

</div>

<?php
$msg = $this->input->get('msg');
switch ($msg) {
    case "S":
        $m = "Region Added Successfully...!!!";
        $t = "success";
        break;
    case "U":
        $m = "Region Updated Successfully...!!!";
        $t = "success";
        break;
    case "D":
        $m = "Region Delete Successfully...!!!";
        $t = "success";
        break;
    case "E":
        $m = "Something went wrong, Please try again!!!";
        $t = "error";
        break;
    default:
        $m = 0;
        break;
}
?>

<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({dateFormat: 'mm/dd/yyyy'});
<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>

        $('#plan_table').dataTable({
            "aaSorting": []
        });

        $('#save_region').click(function () {
            if ($('#title').val() == '') {
                alertify.error('Please Enter Title');
                return false;
            } else if ($('#description').val() == '') {
                alertify.error('Please Enter Description');
                return false;
            } else if ($('#start_date').val() == '') {
                alertify.error('Select Start Date');
                return false;
            } else if ($('#end_date').val() == '') {
                alertify.error('Select End Date');
                return false;
            } else if ($('#start_time').val() == '') {
                alertify.error('Select Start Time');
                return false;
            } else if ($('#end_time').val() == '') {
                alertify.error('Select End Time');
                return false;
            } else {
                $('#frm_credit').attr('action', '<?= base_url() ?>admin/region/add_region');
                $('#frm_credit').submit();
                return true;
            }
        });

        $('.edit_region').click(function () {
            $("#add_region_session").show();
            var cr_id = $(this).attr('data-id');
            if (cr_id != '') {
                $.ajax({
                    url: "<?= base_url() ?>admin/region/getRegionById/" + cr_id,
                    type: "post",
                    success: function (response) {
                        cr_data = JSON.parse(response);
                        if (cr_data.msg == "success")
                        {
                            $('#title').val(cr_data.data.title);
                            $('#description').val(cr_data.data.description);
                            $('#start_date').val(cr_data.data.start_date);
                            $('#end_date').val(cr_data.data.end_date);
                            $('#start_time').val(cr_data.data.start_time);
                            $('#end_time').val(cr_data.data.end_time);
                            $('#tbl_region_id').val(cr_data.data.tbl_region_id);
                            $('#cr_type').val('update');
                        } else {
                            alertify.error('Something went wrong, Please try again!');
                            window.setTimeout('location.reload()', 3000);
                        }
                    }
                });
            } else {
                alertify.error('Something went wrong, Please try again!');
                window.setTimeout('location.reload()', 3000);
            }
        });

    });

</script>









