document.addEventListener("DOMContentLoaded", function() {
    const forms = document.querySelectorAll(".changeStatus");
    const checks = document.querySelectorAll(".checkStatus");
    const pendingTab = document.getElementById("pendingTab");
    const completedTab = document.getElementById("completedTab");
    const pendingTasks = document.getElementById("pendingTasks");
    const completedTasks = document.getElementById("completedTasks");

    checks.forEach((check, index) => {
        check.addEventListener("change", function() {
            forms[index].submit();
        });
    });

    function activateTab(tab) {
        pendingTab.classList.remove("active");
        completedTab.classList.remove("active");
        tab.classList.add("active");
    }

    pendingTab.addEventListener("click", function() {
        pendingTasks.classList.remove("hidden");
        completedTasks.classList.add("hidden");
        activateTab(pendingTab);
    });

    completedTab.addEventListener("click", function() {
        completedTasks.classList.remove("hidden");
        pendingTasks.classList.add("hidden");
        activateTab(completedTab);
    });

    // Set default tab
    pendingTab.click();
});
