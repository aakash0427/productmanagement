<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <select name="status">
   <option id="active" value="active">Active</option>
   <option id="inactive" value="inactive">Inactive</option>
</select>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script type="text/javascript">
$(function () {
    $('#active').on('change', function () {
        let val = $('#active').val();
        console.log(val);
        if (val == 0) {
            $('#inactive').prop('disabled', true);
        } else {
            $('#inactive').prop('disabled', false);
        }
    })
})
    </script>
</body>
</html>