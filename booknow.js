document.addEventListener('DOMContentLoaded', function () {
    // Replace this with your actual logic to fetch and update the number of vacant tables
    var numberOfVacantTables = 5;

    // Display the number of vacant tables
    document.getElementById('vacant-tables').textContent = numberOfVacantTables;

    // Fetch table options
    var tableOptions = document.getElementById('tableNumber').options;

    // Update table options based on vacant or reserved status
    for (var i = 0; i < tableOptions.length; i++) {
        if (i < numberOfVacantTables) {
            tableOptions[i].textContent = 'Table ' + (i + 1);
            tableOptions[i].value = (i + 1);
            tableOptions[i].dataset.status = 'vacant';
        } else {
            tableOptions[i].textContent = 'Table ' + (i + 1) + ' (Reserved)';
            tableOptions[i].value = (i + 1);
            tableOptions[i].dataset.status = 'reserved';
        }
    }
});
