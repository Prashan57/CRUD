<!DOCTYPE html>
<html>
<head>
    <title>Student Management | Edit</title>
</head>
<body>
<form action = "/edit/<?php echo $users[0]->id; ?>" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <table>
        <tr>
            <td>First Name</td>
            <td>
                <input type = 'text' name = 'first_name'
                       value = '<?php echo$users[0]->first_name; ?>'/> </td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td>
                <input type = 'text' name = 'last_name'
                       value = '<?php echo$users[0]->last_name; ?>'/>
            </td>
        </tr>
        <tr>
            <td>City Name</td>
            <td>
                <input type = 'text' name = 'city_name'
                       value = '<?php echo$users[0]->city_name; ?>'/>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type = 'text' name = 'email'
                       value = '<?php echo$users[0]->email; ?>'/>
            </td>
        </tr>
        <tr>
            <td colspan = '2'>
                <input type = 'submit' value = "Update student" />
            </td>
        </tr>
    </table>
</form>
</body>
</html>
