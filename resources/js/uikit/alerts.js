document.addEventListener('DOMContentLoaded', function () {
    let alerts = document.querySelectorAll(".alert-timeout");

    alerts.forEach(function(alert) {
        const timeout = alert.getAttribute('data-timeout');

        if (timeout) {
            setTimeout(function () {
                UIkit.alert(alert).close();
            }, parseInt(timeout));
        }
    });
});
