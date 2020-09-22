<!-- SECTION -->
<style>
    .alert {
        padding: 20px;
        background-color: #4BB543;
        color: white;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>
<section class="parallax fullscreen" style="background-image: url(<?= base_url() ?>front_assets/images/tiada.jpg); top: 0; padding-top: 0px;">
    <div class="container container-fullscreen">
        <div class="text-middle">
            <?php if ($this->session->flashdata('msg') != "") { ?>
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> 
                    <strong><?php echo ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : ''; ?></strong> 
                </div>
            <?php } ?>
            <?php if (isset($message)) echo $message; ?>
            <div class="row">   
                <div class="col-md-12" style="text-align: center;">
                    <a href="<?= base_url() ?>event/addEvent/<?= $location_status ?>" class="btn btn-success">Add to my Google Calendar</a>
                    <a href="<?= base_url() ?>outlookcalendar/addEvent/<?= $location_status ?>" class="btn btn-success">Add to my Outlook Calendar</a>
                </div>
            </div>
            <?php
            $session_set = array(
                'location_status' => $location_status
            );
            $this->session->set_userdata($session_set);
           
            ?>
        </div>
    </div>
</section>


