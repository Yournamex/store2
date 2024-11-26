<div class="container-sm bg-white border border-2 mt-5 shadow-sm p-4 mb-4" >
    <center>
        <h1 class="text-dark">&nbsp;<i class="fa-duotone fa-coins"></i>&nbsp;ประวัติการเติมเงิน</h1>
    </center>
    <hr class="mt-1 mb-1 border-secondary" >
    <div class="table-responsive mt-3 ">
        <table id="table" class="table mt-2 text-dark">
            <thead class="table-dark bg-dark ">
                <tr class="">
                    <th class="sorting sorting_asc">id</th>
                    <th > ลิงค์</th>
                    <th > จำนวนเงิน</th>
                    <th > ชื่อผู้ใช้</th>
                    <th > วันที่</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $get_user = dd_q("SELECT * FROM topup_his ORDER BY date DESC");
                    while($row = $get_user->fetch(PDO::FETCH_ASSOC)){
                ?>
                    <tr >
                        <td><?php echo $row['id'];?></td>
                        <td ><?php echo htmlspecialchars($row['link']);?></td>
                        <td><?php echo htmlspecialchars($row['amount']);?></td>
                        <td><?php echo htmlspecialchars($row['uname']);?></td>
                        <td><?php echo htmlspecialchars($row['date']);?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });
</script>