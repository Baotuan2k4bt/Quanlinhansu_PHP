document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('employeeForm');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent form submission for validation

        // Clear previous errors
        const errorContainers = document.querySelectorAll('.error-message');
        errorContainers.forEach(container => {
            container.textContent = ''; // Clear previous error messages
            container.classList.remove('active'); // Remove active class to hide the message
        });

        // Get form values
        const name = document.getElementById('employeeName').value.trim();
        const email = document.getElementById('employeeEmail').value.trim();
        const phone = document.getElementById('employeePhone').value.trim();
        const address = document.getElementById('employeeAddress').value.trim();
        const position = document.getElementById('employeePosition').value.trim();
        const image = document.getElementById('employeePhoto').files[0];

        let errors = {};

        // Validate name
        if (!name) {
            errors.name = 'Tên nhân viên là bắt buộc.';
        }

        // Validate email
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            errors.email = 'Địa chỉ email không hợp lệ.';
        }

        // Validate phone (example: check if it contains only numbers)
        const phonePattern = /^\d+$/;
        if (!phonePattern.test(phone)) {
            errors.phone = 'Số điện thoại chỉ chấp nhận các ký tự số.';
        }

        // Validate address
        if (!address) {
            errors.address = 'Địa chỉ là bắt buộc.';
        }

        // Validate position
        if (!position) {
            errors.position = 'Chức vụ là bắt buộc.';
        }

        // Validate image
        if (!image) {
            errors.image = 'Hình ảnh là bắt buộc.';
        } else {
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!allowedTypes.includes(image.type)) {
                errors.image = 'Chỉ chấp nhận hình ảnh JPG, PNG hoặc GIF.';
            }
            if (image.size > 2000000) { // 2MB limit
                errors.image = 'Kích thước hình ảnh phải nhỏ hơn 2MB.';
            }
        }

        // Display errors or submit the form
        if (Object.keys(errors).length > 0) {
            for (const key in errors) {
                const errorContainer = document.getElementById(`${key}Error`);
                errorContainer.textContent = errors[key];
                errorContainer.classList.add('active'); // Add active class to show the error
            }
        } else {
            // If no errors, submit the form
            form.submit();
        }
    });
});
