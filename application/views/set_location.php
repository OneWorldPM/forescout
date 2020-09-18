<!-- SECTION -->
<style>
    #home_first_section{
        background-image: url(<?= base_url() ?>front_assets/images/bg_login.jpg); 
        background-size: cover !important; 
        background-origin: content-box; 
        background-attachment: fixed;
    }
    @media (min-width: 768px) and (max-width: 1000px)  {
        #home_first_section{
            height: 170px;
        }
    }

    @media (min-width: 1000px) and (max-width: 1400px)  {
        #home_first_section{
            height: 230px;
        }
    }

    @media (min-width: 1400px) and (max-width: 1600px)  {
        #home_first_section{
            height: 270px;
        }
    }

    @media (min-width: 1600px) and (max-width: 1800px)  {
        #home_first_section{
            height: 320px;
        }
    }

    @media (min-width: 1800px) and (max-width: 2200px)  {
        #home_first_section{
            height: 360px;
        }
    }

    @media (min-width: 2200px) and (max-width: 2800px)  {
        #home_first_section{
            height: 700px;
        }
    }
    @media (min-width: 2800px) and (max-width: 3200px)  {
        #home_first_section{
            height: 800px;
        }
    }

    @media (min-width: 3200px) and (max-width: 4200px)  {
        #home_first_section{
            height: 900px;
        }
    }

    @media (min-width: 4200px) and (max-width: 6000px)  {
        #home_first_section{
            height: 1000px;
        }
    }
</style>
<style>
    .icon-home {
        color: #ae0201;
        font-size: 1.5em;
        font-weight: 700;
        vertical-align: middle;
    }

    .box-home {
        background-color: #444;
        border-radius: 30px;
        background: rgba(250, 250, 250, 0.8);
        max-width: 270px;
        min-width: 270px;
        min-height: 270px;
        max-height: 270px;
        padding: 15px;
    }
</style>
<section class="parallax fullscreen" style="padding: 0px;">
    <div class="container-fullscreen" id="home_first_section">
        <div class="row">
            <div class="col-md-12">
                <p style="padding:50px; color: #ffffff; font-size: 16px;">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                </p>
            </div>
        </div>
    </div>
    <div class="container-fullscreen">
        <div class="row" style="text-align: center; margin-top: 15px;">
            <a href="<?= base_url() ?>login" class="button yellow button-3d p-10" style="margin: 0px 0; margin-right: 60px;"><span>Already registered? Click here to login</span></a> 
        </div>
        <div class="row">
            <div class="col-md-10 m-t-30 col-md-offset-1">
                <input type="hidden" id="type" value="<?= $type ?>">
                <input type="hidden" id="cust_id" value="<?= $cust_id ?>">
                <input type="hidden" id="partner_id" value="<?= isset($partner_id) ? $partner_id : '' ?>">
                <div class="col-md-4 col-sm-12"> 
                    <div class="col-lg box-home p-0 text-center">
                        <img src="<?= base_url() ?>front_assets/images/America.jpg" alt="Americas" class="m-t-0" style="width: 100%;">
                        <p style="font-size:17px; margin-top: 10px; font-weight: 600;">Register Below for live Virtual Test Drives across the Americas</p>
                        <a class="col-md-12  button yellow button-3d fullwidth p-10 btn_regiser" data-location="Americas" style="margin: 0px 0;"><span>Register Here</span></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="col-lg box-home p-0 text-center">
                        <img src="<?= base_url() ?>front_assets/images/Emea.jpg" alt="Emea" class="m-t-0" style="width: 100%;">
                        <p style="font-size:17px; margin-top: 10px; font-weight: 600;">Register Below for live Virtual Test Drives across the Emea</p>
                        <a class="col-md-12 button yellow button-3d fullwidth p-10 btn_regiser" data-location="Emea" style="margin: 0px 0;"><span>Register Here</span></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="col-lg box-home p-0 text-center">
                        <img src="<?= base_url() ?>front_assets/images/APJ.jpg" alt="APJ" class="m-t-0" style="width: 100%;">
                        <p style="font-size:17px; margin-top: 10px; font-weight: 600;">Register Below for live Virtual Test Drives across the APJ</p>
                        <a class="col-md-12 button yellow button-3d fullwidth p-10 btn_regiser" data-location="APJ" style="margin: 0px 0;"><span>Register Here</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-sm-12 col-md-offset-1" style="padding: 20px;">
                <span id="msg_display" style="color: #ae0201; font-size: 16px;"></span>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $(".btn_regiser").on("click", function () {
            var set_location = $(this).attr("data-location");
            var type = $("#type").val();
            var cust_id = $("#cust_id").val();
            var partner_id = $("#partner_id").val();
            $.ajax({
                url: "<?= base_url() ?>setlocation/update_location",
                type: "post",
                data: {'set_location': set_location, 'type': type, 'cust_id': cust_id, 'partner_id': partner_id},
                dataType: "json",
                success: function (data) {
                    if (data.status == "success") {
                        window.location = "<?= base_url() ?>register/add_user/" + data.cust_id + "?type=" + data.type;
                    }
                }
            });
        });
    });
</script>

