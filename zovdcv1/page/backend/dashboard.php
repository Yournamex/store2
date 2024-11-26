<?php 
    //topup by day
    date_default_timezone_set("Asia/Bangkok");
    $midnight = strtotime("today 00:00");
    $date_day =  date('Y-m-d H:i:s', $midnight);
    $q_1 = dd_q("SELECT sum(amount) AS total FROM topup_his WHERE date > ?",[$date_day]);
    $day = $q_1->fetch(PDO::FETCH_ASSOC);
    if($day["total"] == null){
        $day["total"] = "0.00";
    }
    // topup by month
    date_default_timezone_set("Asia/Bangkok");
    $midnight = strtotime("today 00:00");
    $date_month =  date('Y-m-01 H:i:s', $midnight);
    $q_2 = dd_q("SELECT sum(amount) AS total FROM topup_his WHERE date > ?",[$date_month]);
    $month = $q_2->fetch(PDO::FETCH_ASSOC);
    if($month["total"] == null){
        $month["total"] = "0.00";
    }
    // topup all
    $q_3 = dd_q("SELECT sum(amount) AS total FROM topup_his ");
    $topup = $q_3->fetch(PDO::FETCH_ASSOC);
    if($topup["total"] == null){
        $topup["total"] = "0.00";
    }
    //shop by day
    $q_4 = dd_q("SELECT id FROM boxlog WHERE date > ?",[$date_day]);
    $box_day = $q_4->rowCount();
    // shop by month
    $q_5 = dd_q("SELECT id FROM boxlog WHERE date > ?",[$date_month]);
    $box_month = $q_5->rowCount();
    // shop by all
    $q_6 = dd_q("SELECT id FROM boxlog");
    $box_all = $q_6->rowCount();

?>
<div class="container-sm bg-white border border-2 mt-5 shadow-sm p-4 mb-4" >
    <center>
        <h1 class="text-dark"><i class="fa-duotone fa-chart-simple"></i>&nbsp;หน้าแดชบอร์ด</h1>
    </center>
    <hr class="mt-1 mb-1 border-secondary" >
    <div class="row jusify-content-between mt-4">
        <div class="col-lg-4 mb-2">
            <div class="container-fluid border p-4 shadow" style="border-bottom: 4px solid var(--main)!important;  border-radius: 10px;">
                <center>
                    <h1 class="text-dark"><?php echo $month["total"];?>฿</h1>
                    <h5 class="text-dark">ยอดการเติมในเดือนนี้</h5>
                </center>
            </div>
        </div>
        <div class="col-lg-4 mb-2">
            <div class="container-fluid border p-4 shadow" style="border-bottom: 4px solid var(--main)!important;  border-radius: 10px;">
                <center>
                    <h1 class="text-dark"><?php echo $day["total"];?>฿</h1>
                    <h5 class="text-dark">ยอดการเติมในวันนี้</h5>
                </center>
            </div>
        </div>
        <div class="col-lg-4 mb-2">
            <div class="container-fluid border p-4 shadow" style="border-bottom: 4px solid var(--main)!important;  border-radius: 10px;">
                <center>
                    <h1 class="text-dark"><?php echo $topup["total"];?>฿</h1>
                    <h5 class="text-dark">ยอดการเติมทั้งหมด</h5>
                </center>
            </div>
        </div>
        <div class="col-lg-4 mb-2">
            <div class="container-fluid border p-4 shadow" style="border-bottom: 4px solid var(--main)!important;  border-radius: 10px;">
                <center>
                    <h1 class="text-dark"><?php echo $box_month;?></h1>
                    <h5 class="text-dark">ยอดกาารซื้อสินค้าเดือนนี้</h5>
                </center>
            </div>
        </div>
        <div class="col-lg-4 mb-2">
            <div class="container-fluid border p-4 shadow" style="border-bottom: 4px solid var(--main)!important;  border-radius: 10px;">
                <center>
                    <h1 class="text-dark"><?php echo $box_day;?></h1>
                    <h5 class="text-dark">ยอดกาารซื้อสินค้าวันนี้</h5>
                </center>
            </div>
        </div>
        <div class="col-lg-4 mb-2">
            <div class="container-fluid border p-4 shadow" style="border-bottom: 4px solid var(--main)!important;  border-radius: 10px;">
                <center>
                    <h1 class="text-dark"><?php echo $box_all;?></h1>
                    <h5 class="text-dark">ยอดกาารซื้อสินค้าทั้งหมด</h5>
                </center>
            </div>
        </div>
    </div>
    <div class="row justify-cotent-between mt-4">
        <div class="col-12">
            <div class="container-fluid  shadow-sm p-4 rounded ">
                <h5 class="text-dark"><i class="fa-solid fa-history"></i>  ยอดการเติมเงินล่าสุด</h5>
                <table class="table  rounded text-center">
                    <thead>
                    <tr >
                        <th scope="col">#</th>
                        <th scope="col">จำนวนเงิน</th>
                        <th scope="col">ชื่อผู้ใช้</th>
                        <th scope="col">วันที่</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $i = 1;
                        $f = dd_q("SELECT * FROM topup_his ORDER BY date DESC LIMIT 10;");
                        while($row = $f->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['id'];?></th>
                        <td><?php echo $row['amount'];?></td>
                        <td><?php echo htmlspecialchars($row['uname']);?></td>
                        <td><?php echo $row['date'];?></td>
                    </tr>
                    <?php $i++;} ?>
                </table>
            </div>
        </div>
        <div class="col-12s">
            <div class="container-fluid  shadow-sm p-4 rounded ">
                <h5 class="text-dark"><i class="fa-solid fa-history"></i>  การสั่งซื้อล่าสุด</h5>
                <div class="table-responsive">
                    <table class="table  text-dark rounded text-center ">
                        <thead>
                        <tr >
                            <th scope="col">#</th>
                            <th scope="col">ชื่อรายการ</th>
                            <th scope="col">ของรางวัล</th>
                            <th scope="col">วันที่</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $q = dd_q("SELECT * FROM boxlog ORDER BY id DESC  LIMIT 10");
                            $i = 1;
                            while($row = $q->fetch(PDO::FETCH_ASSOC)){
                                
                        ?>
                        <tr>
                            <th scope="row"><?php echo number_format($i);?></th>
                            <td><?php echo htmlspecialchars($row['category']);?></td>
                            <td><?php echo htmlspecialchars($row['prize_name']);?></td>
                            <td><?php echo htmlspecialchars($row['date']);?></td>
                        </tr>
                        <?php
                                $i++;
                            }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>                 
        </div>
    </div>
</div>