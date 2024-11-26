<div class="modal fade" id="product_insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa-duotone fa-pencil"></i>&nbsp;&nbsp;แก้ไขสินค้า</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-10 m-cent ">
                    <div class="mb-2 ">
                        <p class="m-0">จำนวนสินค้าพร้อมจำหน่าย <span class="text-danger">*</span></p>
                        <input type="text" id="s_count" class="form-control" value="<?php echo $static['s_count']; ?>">
                    </div>
                    <div class="mb-2 ">
                        <p class="m-0">จำนวนการเปิดกล่องสุ่ม <span class="text-danger">*</span></p>
                        <input type="text" id="b_count" class="form-control" value="<?php echo $static['b_count']; ?>">
                    </div>
                    <div class="mb-2 ">
                        <p class="m-0">จำนวนสินค้าผู้ใช้ <span class="text-danger">*</span></p>
                        <input type="text" id="m_count" class="form-control" value="<?php echo $static['m_count']; ?>">
                    </div>
                    <div class="mb-2 ">
                        <center><small class="m-0 text-danger">* ข้อมูลจะถูกนำไปบวกกับจำนวนจริงในเว็บของท่านก่อนแสดงโชว์ * </small></center>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิดหน้านี้</button>
                <button type="button" class="btn btn-primary ps-4 pe-4" id="insert_btn" data-id="">บันทึกข้อมูล</button>
            </div>
        </div>
    </div>
</div>
<div class="container-sm bg-white border border-2 mt-5 border-2 shadow-sm p-4 mb-4 rounded">
    <center>
        <h1 class="text-dark">&nbsp;<i class="fa-duotone fa-browser"></i>&nbsp;จัดการเว็บไซต์</h1>
    </center>
    <hr class="mt-1 mb-1 border-secondary">
    <div class="col-lg-6 m-auto">
        <div class="mb-4 mt-4">
            <button class="btn w-100 btn-primary" id="open_insert">ตั้งค่าจำนวนโชว์บนเว็บไซต์</button>
        </div>
        <div class="mb-2 mt-4">
            <p class="m-0 text-secondary ">ชื่อเว็บไซต์ <span class="text-danger">*</span></p>
            <input type="text" id="site_name" class="form-control" value="<?php echo $config['name']; ?>">
        </div>
        <div class="mb-2 ">
            <p class="m-0 text-secondary ">ภาพ Logo (ลิงค์) <span class="text-danger">*</span></p>
            <input type="text" id="site_logo" class="form-control" value="<?php echo $config['logo']; ?>">
        </div>
        <div class="mb-2 ">
            <p class="m-0 text-secondary ">ภาพ Background (ลิงค์) <span class="text-danger">*</span></p>
            <input type="text" id="site_bg" class="form-control" value="<?php echo $config['bg']; ?>">
        </div>
        <div class="mb-2 ">
            <p class="m-0 text-secondary ">Webhook Discord (ลิงค์) <span class="text-danger">*</span></p>
            <input type="text" id="webhook_dc" class="form-control" value="<?php echo $config['webhook_dc']; ?>">
        </div>
        <div class="mb-2 ">
            <p class="m-0 text-secondary ">เบอร์รับเงิน (TrueWallet) <span class="text-danger">*</span></p>
            <input type="text" id="site_phone" class="form-control" value="<?php echo $config['wallet']; ?>">
        </div>
        <div class="row justify-content-between">
            <div class="mb-5 col">
                <div class="text-center">
                    <p class="m-0 text-secondary">สีหลักของเว็บไซต์ <span class="text-danger">*</span></p>
                    <input type="color" class="form-control form-control-color w-100" id="site_main_color" value="<?php echo $config['main_color']; ?>">
                </div>
            </div>
            <div class="mb-5 col">
                <div class="text-center">
                    <p class="m-0 text-secondary">สีรองของเว็บไซต์ <span class="text-danger">*</span></p>
                    <input type="color" class="form-control form-control-color w-100" id="site_sec_color" value="<?php echo $config['sec_color']; ?>">
                </div>
            </div>
        </div>
        <div class="mb-2">
            <p class="m-0 text-secondary ">ช่องทางการติดต่อ (ลิงค์) <span class="text-danger">*</span></p>
            <input type="text" id="site_contact" class="form-control" value="<?php echo $config['contact']; ?>">
        </div>
        <div class="mb-2">
            <p class="m-0 text-secondary ">ประกาศ<span class="text-danger">*</span></p>
            <input type="text" id="ann" class="form-control" value="<?php echo $config['ann']; ?>">
        </div>
        <div class="mb-2 ">
            <p class="m-0 text-secondary ">คำอธิบายร้านค้า <span class="text-danger">*</span></p>
            <textarea id="site_des" rows="10" class="form-control"><?php echo $config['des']; ?></textarea>
        </div>
        <div class="mb-2 ">
            <input class="form-check-input" type="checkbox" value="1" id="pc" <?php if ($config['fee'] == "on") {
                                                                                    echo "checked";
                                                                                } ?>>
            <label class="form-check-label" for="pc">
                เก็บ 2.3% ไม่เกิน 10 บาท
            </label>
        </div>
        <div class="mb-2">
            <button class="btn btn-success w-100" id="btn_regis">บันทึกข้อมูล</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#insert_btn").click(function() {
        var formData = new FormData();
        formData.append('s_count', $("#s_count").val());
        formData.append('m_count', $("#m_count").val());
        formData.append('b_count', $("#b_count").val());
        $.ajax({
            type: 'POST',
            url: 'system/backend/static_udpate.php',
            data: formData,
            contentType: false,
            processData: false,
        }).done(function(res) {
            result = res;
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: result.message
            }).then(function() {
                window.location = "?page=<?php echo $_GET['page']; ?>";
            });
        }).fail(function(jqXHR) {
            console.log(jqXHR);
            res = jqXHR.responseJSON;
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: res.message
            })
            //console.clear();
        });
        // $("#save_btn").attr("data-id") <- id user
    });
    $("#open_insert").click(function() {
        const myModal = new bootstrap.Modal('#product_insert', {
            keyboard: false
        })
        myModal.show();
    });
    $("#btn_regis").click(function(e) {
        e.preventDefault();
        var check;
        if ($('#pc').is(':checked')) {
            check = "on";
        } else {
            check = "off";
        }
        var formData = new FormData();
        formData.append('name', $("#site_name").val());
        formData.append('bg', $("#site_bg").val());
        formData.append('phone', $("#site_phone").val());
        formData.append('main_color', $("#site_main_color").val());
        formData.append('logo', $("#site_logo").val());
        formData.append('sec_color', $("#site_sec_color").val());
        formData.append('contact', $("#site_contact").val());
        formData.append('des', $("#site_des").val());
        formData.append('ann', $("#ann").val());
        formData.append('webhook_dc', $("#webhook_dc").val());
        formData.append('fee', check);
        $('#btn_regis').attr('disabled', 'disabled');
        $.ajax({
            type: 'POST',
            url: 'system/backend/website.php',
            data: formData,
            contentType: false,
            processData: false,
        }).done(function(res) {
            result = res;
            console.log(result);
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: result.message
            }).then(function() {
                window.location = "?page=<?php echo $_GET['page']; ?>";
            });
        }).fail(function(jqXHR) {
            console.log(jqXHR);
            res = jqXHR.responseJSON;
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: res.message
            })
            //console.clear();
            $('#btn_regis').removeAttr('disabled');
        });
    });
</script>