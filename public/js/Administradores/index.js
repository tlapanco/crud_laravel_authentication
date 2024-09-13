function submitDelete(e) {
    const id = e.target.dataset.id;
    const form = document.getElementById(`delete-form-${id}`);
    e.preventDefault();
    form.submit();
}

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
