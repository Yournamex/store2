<div class="container-fluid p-0 ">
    <div class="container-sm  m-cent  p-0 pt-4 ">
        <div class="container-sm ">
            <div class="container-fluid">
                <div class="container-fluid  bg-white border border-2 p-4 pt-0 ">
                    <?php if (!isset($_GET['category'])) : ?>
                        <center class="mt-4 mb-4">
                            <span class="h4 text-secondary "> <img src="assets/icon/shopping-cart.png" class="m-0 mb-2" style="height: 2.5rem;">&nbsp;<b>หมวดหมู่ทั้งหมด</b></span>
                        </center>
                    <?php else : ?>
                        <center class="mt-4 mb-4">
                            <span class="h4 text-secondary "> <img src="assets/icon/shopping-cart.png" class="m-0 mb-2" style="height: 2.5rem;">&nbsp;<b>หมวดหมู่ : <?= htmlspecialchars($_GET['category']); ?></b></span>
                        </center>
                    <?php endif ?>
                    <div class="row justify-content-center justify-content-lg-start">
                        <?php if (!isset($_GET['category'])) {
                            $cfind = dd_q("SELECT * FROM category ORDER BY RAND()");
                            $check = $cfind->rowCount();
                            if ($check  == NULL) {
                                echo '<h6 class="text-secondary text-center">ไม่มีหมวดหมู่ในตอนนี้</h6>';
                            } elseif ($_GET['category'] == NULL) {
                                header('Location: ' . $_SERVER['HTTP_REFERER']);
                            }
                            while ($row = $cfind->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                                <style>
                                    .img-anim {
                                        position: relative;
                                        width: 800px;
                                        max-width: 100%;
                                        height: auto;
                                        overflow: hidden;
                                    }

                                    .img-anim img {
                                        width: 100%;
                                        height: auto;
                                        margin-left: auto;
                                    }

                                    .img-anim>img {
                                        max-height: 100%;
                                        height: 100%;
                                        transition: all 0.5s ease;
                                    }

                                    .img-anim div {
                                        position: absolute;
                                        background-color: rgba(1, 1, 1, 0.55);
                                        color: #fff;
                                        width: 100%;
                                        height: 100%;
                                        opacity: 0;
                                        transition: all 0.3s ease;
                                        padding: 125px 0;
                                        text-align: center;
                                        font-size: 30px;
                                        z-index: 2;
                                    }

                                    .img-anim:hover>div {
                                        opacity: 1;
                                    }
                                </style>
                                <div class="col-lg-6 mb-4 " data-aos="fade-left">
                                    <a href="?page=shop&category=<?= htmlspecialchars($row['c_name']) ?>" style="text-decoration: none;">
                                        <div class="big-hov rounded border border-4 border-main">
                                            <img src="<?= htmlspecialchars($row['img']) ?>" class="img-fluid ">
                                            <h4 class=" mb-0 p-2 pt-1  bg-main  text-white"><?= htmlspecialchars($row['c_name']) ?></h4>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php
                        } else {
                            $find = dd_q("SELECT * FROM box_product WHERE c_type = ? ORDER BY id DESC", [$_GET['category']]);
                            while ($row = $find->fetch(PDO::FETCH_ASSOC)) {
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
                        } ?>
                    </div>
                </div>
            </div>
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
            <!-- Modal -->
            <script src="system/js/countup.js"></script>
        </div>
    </div>
</div>
</div>