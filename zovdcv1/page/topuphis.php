<div class="container-fluid ps-4 pe-4 bg-white border border-2">
<center class="m-0"><h2 class="text-main mb-2 mt-4"><i class="fa-regular fa-history"></i> ประวัติการเติมเงิน</h2></center>
<hr class="mt-1">
<div class="table-responsive">
<table class="table table-striped text-center" id="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">จำนวนเงิน</th>
        <th scope="col">วันที่</th>
    </tr>
    </thead>
    <tbody>
    <?php 
        $i = 1;
        $f = dd_q("SELECT * FROM topup_his WHERE uid = ? ORDER BY date DESC", [$_SESSION['id']]);
        while($row = $f->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
        <th scope="row"><?php echo $row['id'];?></th>
        <td><?php echo $row['amount'];?></td>
        <td><?php echo $row['date'];?></td>
    </tr>
    <?php $i++;} ?>
</table>
</div>
</div>

