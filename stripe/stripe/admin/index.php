<?php
include "../includes/db_config.php";
$Message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $church_name = isset($_POST['church_name']) ? $_POST['church_name'] : '';
    $church_uri = isset($_POST['church_uri']) ? $_POST['church_uri'] : '';
    if (!empty($church_uri) && !empty($church_name)) {
        $Query_check_is_allready_exists = "SELECT `churchId` FROM `donate_churches` WHERE `churchName` LIKE '$church_name'  AND `churchUri`= '$church_uri' LIMIT 1 ";
        $result_check_is_allready_exists = executeQuery($Query_check_is_allready_exists);
        if (!$result_check_is_allready_exists) {
            $InsertData = array(
                'churchName' => $church_name,
                'churchUri' => $church_uri,
                'churchIsConfigured' => 0,
                'churchCreatedAt' => time(),
            );
            insertData('donate_churches', $InsertData);
            $Message = 'Successfully Added';
        } else {

            $Message = 'Allready exists';
        }
    } else {
        $Message = 'Invalid information';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body >
    <center>
        <span style="color: red;"> <?php echo $Message; ?><br/></span>
        <form action="index.php" method="POST">
            <input type="text" required='required' name="church_name" id="church_name" />
            <br/>
            <input type="text" required='required' name="church_uri" id="church_uri" />
            <br/>
            <input type="submit" value="Add My Church"/>

        </form>
    </center>
</body>
</html>