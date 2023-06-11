$(document).ready(function() {
    var table = $('#example').DataTable({
        paging: true,
        ordering: true,
        searching: true,
        columns: [
            { data: 'empid' },
            { data: 'fullName' },
            { data: 'department' },
            { data: 'extno' },
            { data: 'email' },
            { data: null, render: function(data, type, row) {
                return '<button class="btn btn-sm btn-primary editBtn">Edit</button> ' +
                    '<button class="btn btn-sm btn-danger deleteBtn">Delete</button>';
            }}
        ]
    });

    // Add row button
    $('#addBtn').click(function() {
        var rowNode = table.row.add({
            empid: '',
            fullName: '',
            department: '',
            extno: '',
            email: '',
            actions: '<button class="btn btn-sm btn-primary saveBtn">Save</button> ' +
'<button class="btn btn-sm btn-secondary cancelBtn">Cancel</button>'
        }).draw().node();

        // Set focus on the first input element in the new row
        $(rowNode).find('td:first-child').children().focus();
    });

    // Edit row button
    $('#example').on('click', '.editBtn', function() {
        var data = table.row($(this).parents('tr')).data();

        // Replace the row's cells with input fields
        table.row($(this).parents('tr')).nodes().to$()
            .find('td:not(:last-child)')
            .each(function(index) {
                $(this).html('<input type="text" class="form-control" value="' + data[index] + '">');
            });

        // Change the button to a save button
        $(this).removeClass('btn-primary editBtn').addClass('btn-success saveBtn').html('Save');
    });

    // Save row button
    $('#example').on('click', '.saveBtn', function() {
        var $row = $(this).closest('tr');
        var data = table.row($row).data();

        // Update the row's data with the new input values
        table.row($row).data({
            empid: $row.find('td:eq(0) input').val(),
            fullName: $row.find('td:eq(1) input').val(),
            department: $row.find('td:eq(2) input').val(),
            extno: $row.find('td:eq(3) input').val(),
            email: $row.find('td:eq(4) input').val()
        });

        // Change the save button back to an edit button
        $(this).removeClass('btn-success saveBtn').addClass('btn-primary editBtn').html('Edit');
    });

    // Delete row button
    $('#example').on('click', '.deleteBtn', function() {
        var $row = $(this).closest('tr');

        // Show a confirmation dialog before deleting the row
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this row!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                table.row($row).remove().draw();
                Swal.fire(
                    'Deleted!',
                    'The row has been deleted.',
                    'success'
                )
            }
        });
    });































    

    // Export to Excel button
    $('#exportBtn').click(function() {
        var wb = XLSX.utils.table_to_book(document.getElementById('example'), { sheet: 'Sheet JS' });
        return XLSX.writeFile(wb, 'extension.xlsx');
    });

    // Import from Excel button
    $('#importBtn').change(function() {
        var files = $(this).prop('files');

        if (files.length > 0) {
            var file = files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var data = e.target.result;
                var workbook = XLSX.read(data, { type: 'binary' });

                // Get the first sheet
                var sheet_name_list = workbook.SheetNames;
                var sheet_name = sheet_name_list[0];
                var worksheet = workbook.Sheets[sheet_name];

                // Convert the sheet to a 2D array
                var arr = XLSX.utils.sheet_to_json(worksheet, { header: 1 });

                // Remove the header row
                arr.shift();

                // Add the rows to the table
                table.rows.add(arr).draw();
            };

            reader.onerror = function() {
                alert('Unable to read ' + file.fileName);
            };

            reader.readAsBinaryString(file);
        }
    });
});