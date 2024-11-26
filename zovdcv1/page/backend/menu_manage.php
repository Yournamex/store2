<div class="container-fluid">
    <div class="container ps-4 pe-4 m-auto">
        <div class="row justify-content-between">
            <div class="col-lg-9">
                <?php
                if (admin($user) && isset($_GET['page']) && $_GET['page'] == "backend") {
                    require_once('page/backend/dashboard.php');
                } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "user_edit") {
                    require_once('page/backend/user_edit.php');
                } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "category_manage") {
                    require_once('page/backend/category.php');
                } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "product_manage") {
                    require_once('page/backend/product.php');
                } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "stock_manage" && $_GET['id'] != "") {
                    require_once('page/backend/stock.php');
                } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "code_manage") {
                    require_once('page/backend/code_manage.php');
                } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "backend_buy_history") {
                    require_once('page/backend/buy_history.php');
                } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "backend_topup_history") {
                    require_once('page/backend/topup_history.php');
                } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "website") {
                    require_once('page/backend/website.php');
                } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "carousel_manage") {
                    require_once('page/backend/carousel_manage.php');
                } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "recom_manage") {
                    require_once('page/backend/recom_manage.php');
                } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "crecom_manage") {
                    require_once('page/backend/crecom_manage.php');
                }
                ?>
            </div>
            <div class="col-lg-3 pt-5">
                <a href="?page=backend" style="text-decoration: none;">
                    <div class="bg-white border  ">
                        <div class=" p-4">
                            <h5 class="text-dark m-0"><i class="fa-solid fa-chart-simple"></i>&nbsp;&nbsp;จัดการหลังร้าน</h5>
                        </div>
                    </div>
                </a>
                <a href="?page=website" style="text-decoration: none;">
                    <div class="bg-white border  ">
                        <div class=" p-4">
                            <h5 class="text-dark m-0"><i class="fa-solid fa-browser"></i>&nbsp;&nbsp;ตั้งค่าเว็บไซต์</h5>
                        </div>
                    </div>
                </a>
                <a href="?page=user_edit" style="text-decoration: none;">
                    <div class="bg-white border  ">
                        <div class=" p-4">
                            <h5 class="text-dark m-0"><i class="fa-solid fa-users"></i>&nbsp;&nbsp;จัดการผู้ใช้</h5>
                        </div>
                    </div>
                </a>
                <a href="?page=category_manage" style="text-decoration: none;">
                    <div class="bg-white border  ">
                        <div class=" p-4">
                            <h5 class="text-dark m-0"><i class="fa-solid fa-boxes-stacked"></i>&nbsp;&nbsp;จัดการหมวดหมู่</h5>
                        </div>
                    </div>
                </a>
                <a href="?page=product_manage" style="text-decoration: none;">
                    <div class="bg-white border  ">
                        <div class=" p-4">
                            <h5 class="text-dark m-0"><i class="fa-solid fa-boxes-stacked"></i>&nbsp;&nbsp;จัดการสินค้า</h5>
                        </div>
                    </div>
                </a>
                <a href="?page=code_manage" style="text-decoration: none;">
                    <div class="bg-white border  ">
                        <div class=" p-4">
                            <h5 class="text-dark m-0"><i class="fa-solid fa-code"></i>&nbsp;&nbsp;จัดการโค้ด</h5>
                        </div>
                    </div>
                </a>
                <a href="?page=backend_topup_history" style="text-decoration: none;">
                    <div class="bg-white border  ">
                        <div class=" p-4">
                            <h5 class="text-dark m-0"><i class="fa-solid fa-coins"></i>&nbsp;&nbsp;ประวัติการเติมเงิน</h5>
                        </div>
                    </div>
                </a>
                <a href="?page=backend_buy_history" style="text-decoration: none;">
                    <div class="bg-white border  ">
                        <div class=" p-4">
                            <h5 class="text-dark m-0"><i class="fa-solid fa-history"></i>&nbsp;&nbsp;ประวัติการสั่งซื้อ</h5>
                        </div>
                    </div>
                </a>
                <a href="?page=carousel_manage" style="text-decoration: none;">
                    <div class="bg-white border  ">
                        <div class=" p-4">
                            <h5 class="text-dark m-0"><i class="fa-solid fa-image"></i>&nbsp;&nbsp;จัดการรูปภาพสไลด์</h5>
                        </div>
                    </div>
                </a>
                <a href="?page=recom_manage" style="text-decoration: none;">
                    <div class="bg-white border  ">
                        <div class=" p-4">
                            <h5 class="text-dark m-0"><i class="fa-solid fa-fire"></i>&nbsp;&nbsp;ตั้งค่าสินค้าแนะนำ</h5>
                        </div>
                    </div>
                </a>
                <a href="?page=crecom_manage" style="text-decoration: none;">
                    <div class="bg-white border  ">
                        <div class=" p-4">
                            <h5 class="text-dark m-0"><i class="fa-solid fa-fire"></i>&nbsp;&nbsp;ตั้งค่าหมวดหมู่แนะนำ</h5>
                        </div>
                    </div>
                </a>
                <a href="https://ovdc.xyz/doc/howtouse/v2" style="text-decoration: none;">
                    <div class="bg-white border  ">
                        <div class=" p-4">
                            <h5 class="text-dark m-0"><i class="fa-solid fa-fire"></i>&nbsp;&nbsp;วิธีการใช้งาน</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>