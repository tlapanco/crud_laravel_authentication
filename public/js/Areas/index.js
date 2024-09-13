const url = "http://127.0.0.1:8000";

function updateStatus(e) {
    const formUpdateStatus = document.getElementById(
        `form-update-status-${e.target.dataset.id}`
    );
    const check = document.getElementById(`check-${e.target.dataset.id}`);
    const inputActivo = document.getElementById(
        `activo-value-${e.target.dataset.id}`
    );

    if (check.checked) {
        inputActivo.value = 1;
        formUpdateStatus.submit();
    } else {
        inputActivo.value = 0;
        formUpdateStatus.submit();
    }
}
