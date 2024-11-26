<style>
    .shops {
        padding: 20px;
        border-radius: 1vh;
    }

    .shops-body {
        position: relative;
        color: #fff;
        font-weight: 600;
        height: 100%;
    }

    .shops-body>.shops-img {
        width: 100%;
        height: 100%;
        border-radius: 1vh;
        transition: all .5s ease;
    }

    .shops-body>.shops-img:hover {
        transform: scale(1.035);
    }

    .shops-body>.shops-text-center {
        position: absolute;
        top: 80%;
        left: 20%;
        transform: translate(-50%, -50%);
        opacity: 0;
        transition: all .5s ease;
    }

    .shops-body:hover>.shops-text-center {
        left: 50%;
        opacity: 1;
        font-size: 30px;
        padding: 0 20px;
        border-radius: 2vh;
        background-color: var(--main);
    }
</style>
<div class="container p-0">
    <div class="container-sm ps-4 pe-4">
        <div class="w-100 bg-white shadow-sw border border-2 ps-3 pe-4 align-contant-center" style="border-radius: 1vh;">
            <div class="row">
                <div class="col-12 ps-5 pe-5 ps-lg-0 pe-lg-0 col-lg-2 p-2 text-white">
                    <div class="p-2" style="background-color: var(--main); border-radius: 1vh; font-weight: 600; font-size: 20px;">
                        <p class="text-center m-0"><img src="https://cdn-icons-png.flaticon.com/512/8306/8306906.png" width="25"> &nbsp;ประกาศ</p>
                    </div>
                </div>
                <div class="col p-2 mt-lg-2">
                    <marquee><?= $config['ann'] ?></marquee>
                </div>
            </div>
        </div>
    </div>
    <div class="container-sm ps-4 pe-4 mt-3">
        <div class="w-100 p-3">
            <div class="row ">
                <?php
                $check = dd_q("SELECT * FROM crecom WHERE recom_1 != 0 AND recom_2 != 0");
                if ($check->rowCount() == 1) {
                    $data = $check->fetch(PDO::FETCH_ASSOC);
                    for ($i = 1; $i <= 2; $i++) {
                        $recom = "recom_" . $i;
                        $find = dd_q("SELECT * FROM category WHERE c_id = ? ", [$data[$recom]]);
                        $row = $find->fetch(PDO::FETCH_ASSOC);
                ?>

                        <div class="col-12 col-lg-6 mb-3">
                            <a href="?page=shop&category=<?= $row['c_name'] ?>">
                                <div class="shops-body w-100">
                                    <img class="shops-img" src="<?= htmlspecialchars($row['img']) ?>">
                                    <div class="shops-text-center">
                                        <?= htmlspecialchars($row['c_name']) ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <?php
                    $find = dd_q("SELECT * FROM category ORDER BY RAND() LIMIT 2");
                    while ($row = $find->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div class="col-12 col-lg-6 mb-3">
                            <a href="?page=shop&category=<?= $row['c_name'] ?>">
                                <div class="shops-body w-100">
                                    <img class="shops-img" src="<?= htmlspecialchars($row['img']) ?>">
                                    <div class="shops-text-center">
                                        <?= htmlspecialchars($row['c_name']) ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
    <div class="container-sm p-4">
        <!-- <div class="row justiy-content-center  justify-content-lg-between">
            <div class="col-lg-12"> -->
        <div class="container-fluid  bg-white shadow-sm border border-2 p-3  " style="border-radius: 1vh;">
            <div class="d-flex justify-content-between">
                <span class="h4 text-secondary "> <img src="assets/icon/shopping-cart.png" class="m-0 mb-2" style="height: 2.5rem;">&nbsp;<b>สินค้าแนะนำจากทางเรา</b></span>
                <a href="?page=shop" class="btn mb-2 bg-main-gra align-self-center ps-4 pe-4 pt-2 pb-2 d-none d-lg-block" style="text-decoration: none;">
                    <h4 class="text-white m-0">เลือกซื้อเพิ่มเติม</h4>
                </a>
            </div>
            <hr class="mt-1">
            <style>
                .cc {
                    width: 100%;
                    max-width: 250px;
                }

                @media only screen and (max-width: 1000px) {
                    .cc {
                        width: 100%;
                        max-width: 100vh;
                    }
                }
            </style>
            <div class="row justify-content-center justify-content-lg-start">
                <?php
                $check = dd_q("SELECT * FROM recom WHERE recom_1 != 0 AND recom_2 != 0 AND recom_3 != 0 AND recom_4 != 0 AND recom_5 != 0 AND recom_6 != 0 AND recom_7 != 0 AND recom_8 != 0 AND recom_9 != 0 AND recom_10 != 0");
                if ($check->rowCount() == 1) {
                    $data = $check->fetch(PDO::FETCH_ASSOC);
                    for ($i = 1; $i <= 10; $i++) {
                        $recom = "recom_" . $i;
                        $find = dd_q("SELECT * FROM box_product WHERE id = ? ", [$data[$recom]]);
                        $row = $find->fetch(PDO::FETCH_ASSOC);
                        $stock = dd_q("SELECT * FROM box_stock WHERE p_id = ? ", [$row["id"]]);
                        $count = $stock->rowCount();
                        if ($count  == NULL) {
                            $count = 0;
                        }
                ?>
                        <div class="col-12 col-lg-3 mb-4 cc" data-aos="zoom-in">
                            <div class="card-body border border-2 shadow-sm p-0 text-white card-body  " style="border-radius: 1vh; overflow: hidden; height: fit-content;  ">
                                <div class="container-fluid p-0 ">
                                    <div class="view overlay">
                                        <center>
                                            <img class="img-fluid " src="<?php echo htmlspecialchars($row["img"]); ?>" style="border-radius: 1vh; width: 100%; max-width: 100vh;">
                                        </center>
                                        <a href="#!">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <div class="card-body p-3 pt-3 pb-1">
                                        <center>
                                            <p class="text-white main-badge bg-main m-0" style="width: fit-content;">สินค้าคงเหลือ <?php echo $count; ?> ชิ้น</p>
                                        </center>
                                        <h5 class="text-dark  text-strongest mb-1" style="word-wrap: break-word;"><?php echo htmlspecialchars($row["name"]); ?></h5>
                                        <div class="d-flex justify-content-between">
                                        <p class="text-main  align-self-center m-0 "><strong><?php echo number_format($row['price'], 2); ?> </strong></p>
                                            <p class="text-white main-badge bg-main align-self-center m-0"><strong>บาท</strong></p>
                                        </div>
                                        <center><button class="btn bg-main w-100 text-white mt-3 mb-2" style="border-radius: 50px;" onclick="tobuy(<?php echo $row['id'] ?>, '<?php echo htmlspecialchars($row['name']); ?>', '<?= $count ?>', '<?= $row['price'] ?>')"><i class="fa-regular fa-shopping-basket"></i>&nbsp;สั่งซื้อตอนนี้เลย </button></center>
                                        <center class="mb-2"><a href="#" style="text-decoration: none;"><span class="w-100 text-secondary mt-4 mb-4" onclick="detail(<?php echo $row['id']; ?>)"><i class="fa-regular fa-info-circle"></i>&nbsp;รายละเอียดสินค้า</span></a></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <?php
                    $find = dd_q("SELECT * FROM box_product ORDER BY id DESC LIMIT 10");
                    while ($row = $find->fetch(PDO::FETCH_ASSOC)) {
                        $stock = dd_q("SELECT * FROM box_stock WHERE p_id = ? ", [$row["id"]]);
                        $count = $stock->rowCount();
                        if ($count  == NULL) {
                            $count = 0;
                        }
                    ?>
                        <div class="col-12 col-lg-3 mb-4 cc" data-aos="zoom-in">
                            <div class="card-body border border-2 shadow-sm p-0 text-white" style="border-radius: 1vh; overflow: hidden; height: fit-content;">
                                <div class="p-1">
                                    <div class="view overlay">
                                        <center>
                                            <img class="img-fluid " src="<?php echo htmlspecialchars($row["img"]); ?>" style="border-radius: 1vh; width: 100%; max-width: 100vh;">
                                        </center>
                                        <a href="#!">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <div class="card-body p-3 pt-3 pb-1">
                                        <center>
                                            <p class="text-white main-badge bg-main m-0" style="width: fit-content;">สินค้าคงเหลือ <?php echo $count; ?> ชิ้น</p>
                                        </center>
                                        <h5 class="text-dark text-strongest mb-1" style="word-wrap: break-word;"><?php echo htmlspecialchars($row["name"]); ?></h5>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-main  align-self-center m-0 "><strong><?php echo number_format($row['price'], 2); ?> </strong></p>
                                            <p class="text-white main-badge bg-main align-self-center m-0"><strong>บาท</strong></p>
                                        </div>
                                        <center><button class="btn bg-main w-100 text-white mt-3 mb-2" style="border-radius: 50px;" onclick="tobuy(<?php echo $row['id'] ?>, '<?php echo htmlspecialchars($row['name']); ?>', '<?= $count ?>')"><i class="fa-regular fa-shopping-basket"></i>&nbsp;สั่งซื้อตอนนี้เลย </button></center>
                                        <center class="mb-2"><a href="#" style="text-decoration: none;"><span class="w-100 text-secondary mt-4 mb-4" onclick="detail(<?php echo $row['id']; ?>)"><i class="fa-regular fa-info-circle"></i>&nbsp;รายละเอียดสินค้า</span></a></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php
                }
                ?>
            </div>
            <a href="?page=shop" class="btn mb-2 bg-main-gra align-self-center ps-4 pe-4 pt-2 pb-2 d-block d-lg-none" style="text-decoration: none;">
                <h4 class="text-white m-0">เลือกซื้อเพิ่มเติม</h4>
            </a>
        </div>
    </div>
    <!-- </div>
</div> -->
    <div class="container m-cent  p-4 pt-2 pb-2 " style="border-radius: 1vh;">

        <?php
        $boxlog = dd_q("SELECT * FROM boxlog");
        $b_count = $boxlog->rowCount() + $static['b_count'];
        $boxlog = dd_q("SELECT * FROM box_stock");
        $s_count = $boxlog->rowCount() + $static['s_count'];
        $boxlog = dd_q("SELECT * FROM users");
        $m_count = $boxlog->rowCount() + $static['m_count'];
        ?>
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <div class="container-sm mb-4 mb-lg-0 p-3 ps-0 pe-0  bg-white border border-2" style="border-radius: 1vh;">
                    <center>
                        <img src="assets/icon/in-stock.png" alt="" style="height: 68px;"> <br>
                        <span class="text-main" id="count" style="font-size: 36px;" data-target="<?php echo $s_count; ?>"></span>
                        <span style="font-size: 36px;" class="text-main">&nbsp;ชิ้น</span>
                        <h5 class="text-secondary">พร้อมจำหน่าย</h5>
                    </center>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="container-sm mb-4 mb-lg-0   p-3 ps-0 pe-0    bg-white border border-2" style="border-radius: 1vh;">
                    <center>
                        <img src="assets/icon/out-of-stock.png" alt="" style="height: 68px;"><br>
                        <span class="text-main" id="count" style="font-size: 36px;" data-target="<?php echo $b_count; ?>"></span>
                        <span style="font-size: 36px;" class="text-main">&nbsp;ครั้ง</span>
                        <h5 class="text-secondary">จำหน่ายไปแล้ว</h5>
                    </center>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="container-sm mb-4 mb-lg-0   p-3 ps-0 pe-0    bg-white border border-2" style="border-radius: 1vh;">
                    <center>
                        <img src="assets/icon/user.png" alt="" style="height: 68px;"><br>
                        <span class="text-main" id="count" style="font-size: 36px;" data-target="<?php echo $m_count; ?>"></span>
                        <span style="font-size: 36px;" class="text-main">&nbsp;คน</span>
                        <h5 class="text-secondary">มีสมาชิกทั้งหมด</h5>
                    </center>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="product_detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-duotone fa-shopping-basket"></i>&nbsp;&nbsp;รายละเอียดสินค้า</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-9 m-cent">
                        <img src="assets/img/mysbox.png" class="img-fluid" id="p_img">
                        <center class="mt-4">
                            <h4 id="p_name" style="word-wrap: break-word;">N/A</h4>
                        </center>

                    </div>
                    <div class="container-fluid ps-3 pe-3">
                        <p class="text-dark m-0"><i class="fa-regular fa-info-circle"></i> รายละเอียดสินค้า </p>
                        <hr class=" mt-1 mb-1">
                        <p class="text-secondary" style="word-wrap: break-word; white-space:pre-wrap;" id="p_des">N/A
                            <hr class=" mt-1 mb-1">
                            <b>
                                ⚠ คำเตือน :
                                ระบบมีโอกาสเกิดข้อผิดพลาดได้ทุกเมื่อ <br>
                                โปรดอัดคลิปวีดิโอก่อนทำการซื้อสินค้าเพื่อเป็นหลักฐาน <br>
                                หากไม่มีหลักฐานในการยืนยันทางร้าน ขอสงวนสิทธิ์รับผิดชอบ <br>
                                ต่อความเสียหายที่เกิดขึ้น ❌</b>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="system/js/countup.js"></script>
</div>
</div>
</div>
</div>