<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Mã nhân viên</th>
                <th>Họ tên</th>
                <th>Ảnh</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Chức vụ</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data) && is_array($data)): ?>
                <?php foreach ($data as $pro): ?>
                    <tr>
                        <td><?php echo $pro['employee_id']; ?></td>
                        <td><?php echo $pro['name']; ?></td>
                        <td><img src="uploads/<?php echo $pro['image']; ?>" alt="Image" width="75" height="75"></td>
                        <td><?php echo $pro['email']; ?></td>
                        <td><?php echo $pro['phone']; ?></td>
                        <td><?php echo $pro['address']; ?></td>
                        <td><?php echo $pro['position']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Không có kết quả tìm kiếm</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
