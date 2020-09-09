<?php
$i = 1;
while (isset($_POST[$i.''])){
    echo $_POST[$i.''];
    $i = $i + 1;
}
$i = 1;