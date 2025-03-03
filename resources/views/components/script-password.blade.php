<script>
    function togglePasswordVisibility(fieldId, iconId) {
        const field = document.getElementById(fieldId);
        const icon = document.getElementById(iconId);

        if (field.type === "password") {
            field.type = "text";
            icon.classList.add("text-blue-500");
        } else {
            field.type = "password";
            icon.classList.remove("text-blue-500");
        }
    }

    function validatePassword() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        const errorMessage = document.getElementById('error-message');

        if (confirmPassword && password !== confirmPassword) {
            errorMessage.classList.remove("hidden");
        } else {
            errorMessage.classList.add("hidden");
        }
    }
</script>
