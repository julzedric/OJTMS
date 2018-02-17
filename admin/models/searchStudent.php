<?php
require_once ('../../connection.php');
    ?>
    <style>
        ul#student-list{
            padding-left: 0px;
        }
        ul#student-list li{
            list-style: none;
            padding: 5px;
            cursor: pointer;
        }
        ul#student-list li:hover{
            background-color: #DBDBDB;
        }
    </style>
<?php
    $query ="SELECT * FROM ojt_users WHERE lastname like '" . $_POST["recipient"] . "%' ORDER BY lastname LIMIT 0,6";
    $result = $conn->query($query);
    if(!empty($result)) {
        ?>
        <ul id="student-list">
            <?php
            foreach($result as $student) {
                ?>
                <li onClick="selectStudent('<?php echo $student["contact_number"]; ?>')">
                    <?php echo $student["firstname"].' '. $student['lastname']. ' ('.$student['contact_number'].')'; ?></li>
            <?php } ?>
        </ul>
    <?php } ?>