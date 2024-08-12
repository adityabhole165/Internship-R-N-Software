<?php
include('db.php');

// JavaScript to confirm the deletion
echo "<script type='text/javascript'>
    var confirmDelete = confirm('Do you really want to delete this record?');
    if (confirmDelete) {
        alert('$message');
        window.location.href = 'DeleteRec.php';
    } else {
        window.location.href = 'displayPG.php';
    }
</script>";
?>