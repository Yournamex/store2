<div class="container-sm  bg-white border border-2   mt-5 border-2 shadow-sm p-4 mb-4 rounded">
    <center>
        <h1 class="text-dark">&nbsp;<i class="fa-duotone fa-fire"></i>&nbsp;ตั้งค่าหมวดหมู่แนะนำ</h1>
    </center>
    <hr class="mt-1 mb-1 border-secondary">
    <div class="col-lg-6 m-auto">
        <div class="mb-2 mt-4">
            <p class="m-0 text-dark">หมวดหมู่แนะนำ #1 <span class="text-danger">*</span></p>
            <select class="form-select" id="pop_1" aria-label="Default select example">
                <?php
                $find = dd_q("SELECT * FROM crecom ");
                $data =  $find->fetch(PDO::FETCH_ASSOC);
                if ($data['recom_1'] != "0") {
                    $get_pd = dd_q("SELECT * FROM category WHERE c_id = ? ", [$data['recom_1']]);
                    $data_pd = $get_pd->fetch(PDO::FETCH_ASSOC);
                ?>
                    <option value="<?php echo $data['recom_1'] ?>"><?php echo $data_pd['c_name']; ?></option>
                    <?php
                    $all_p = dd_q("SELECT * FROM category ORDER BY c_id DESC");
                    while ($row = $all_p->fetch(PDO::FETCH_ASSOC)) {
                        if ($row['c_id'] == $data['recom_1']) {
                            continue;
                        }
                    ?>
                        <option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></option>
                    <?php
                    }
                } else {
                    ?>
                    <option value="0">โปรดทำการเลือกหมวดหมู่แนะนำ</option>
                    <?php
                    $all_p = dd_q("SELECT * FROM category ORDER BY c_id DESC");
                    while ($row = $all_p->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="mb-2 mt-4">
            <p class="m-0 text-dark">หมวดหมู่แนะนำ #2 <span class="text-danger">*</span></p>
            <select class="form-select" id="pop_2" aria-label="Default select example">
                <?php
                $find = dd_q("SELECT * FROM crecom ");
                $data =  $find->fetch(PDO::FETCH_ASSOC);
                if ($data['recom_2'] != "0") {
                    $get_pd = dd_q("SELECT * FROM category WHERE c_id = ? ", [$data['recom_2']]);
                    $data_pd = $get_pd->fetch(PDO::FETCH_ASSOC);
                ?>
                    <option value="<?php echo $data['recom_2'] ?>"><?php echo $data_pd['c_name']; ?></option>
                    <?php
                    $all_p = dd_q("SELECT * FROM category ORDER BY c_id DESC");
                    while ($row = $all_p->fetch(PDO::FETCH_ASSOC)) {
                        if ($row['c_id'] == $data['recom_2']) {
                            continue;
                        }
                    ?>
                        <option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></option>
                    <?php
                    }
                } else {
                    ?>
                    <option value="0">โปรดทำการเลือกหมวดหมู่แนะนำ</option>
                    <?php
                    $all_p = dd_q("SELECT * FROM category ORDER BY c_id DESC");
                    while ($row = $all_p->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="mb-2">
            <button class="btn btn-success w-100" id="btn_regis">บันทึกข้อมูล</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#btn_regis").click(function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append('pop_1', $("#pop_1").val());
        formData.append('pop_2', $("#pop_2").val());
        $('#btn_regis').attr('disabled', 'disabled');
        $.ajax({
            type: 'POST',
            url: 'system/backend/crecom_update.php',
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