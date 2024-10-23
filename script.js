document.addEventListener("DOMContentLoaded", function() {
    const forms = document.querySelectorAll(".changeStatus");
    const checks = document.querySelectorAll(".checkStatus");

    checks.forEach((check, index) => {
        check.addEventListener("change", function() {
            forms[index].submit();
        });
    });
});
