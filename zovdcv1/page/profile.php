<div class="container-sm mt-4 mb-5 ps-0 pe-0  pb-5   "  >
    <div class="row card-body pt-5   text-white mb-4">
            <div class="col-lg-4  ">
                <div class="container-fluid pt-0">
                    <a href="?page=profile&subpage=buyhis" class="btn bg-main-gra text-white btn-lg  w-100">
                        <h1><i class="fa-solid fa-clock-rotate-left"></i></h1>    
                    ประวัติการสั่งซื้อ</a>
                    <a href="?page=profile&subpage=topuphis" class="btn bg-main-gra text-white btn-lg mt-2 w-100"><h1><i class="fa-solid fa-clock-rotate-left"></i></h1>    
                    ประวัติเติมเงิน</a>
                    <a href="?page=profile&subpage=cpass" class="btn bg-main-gra text-white btn-lg mt-2 w-100">
                    <h1><i class="fa-solid fa-lock"></i></h1>    
                    เปลี่ยนรหัสผ่าน</a>
                </div>
            </div>
            <div class="col-lg-8 ">
                <div class="container-fluid border shadow-sm bg-white pt-4 pb-4 ps-4  rounded mb-2" style="margin: 0% auto; ">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="<?php echo htmlspecialchars($config['logo']); ?>" class="img-fluid">
                        </div>
                        <div class="col-lg-8">
                        <h5 class="text-secondary m-0 mt-2"><i class="fa-duotone fa-user-circle"></i> Username : <span class="text-main"><?php echo htmlspecialchars($user["username"]);?></span></h5>
                            <h5 class="text-secondary m-0 mt-2"><i class="fa-duotone fa-coins"></i> Points : <span class="text-main"><?php echo $user["point"];?></span></h5>
                        <h2 class="text-white text-uppercase text-strongest mt-5"><?php echo htmlspecialchars($dt['username']);?></h2>

                        </div>
                    </div>
                </div>
                    <?php 
                    if(isset($_GET['subpage']) && $_GET['subpage'] == "cpass"){
                        require_once('page/cpass.php'); 
                    }elseif(isset($_GET['subpage']) && $_GET['subpage'] == "topuphis"){
                        require_once('page/topuphis.php');
                    }elseif(isset($_GET['subpage']) && $_GET['subpage'] == "buyhis" ){
                        require_once('page/buyhis.php');
                    }else{
                        require_once('page/cpass.php');
                    }
                    ?>
            </div>
    </div>
</div>