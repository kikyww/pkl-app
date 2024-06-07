<?php
$konek = mysqli_connect("localhost", "root", "", "samsat_f");
if ($konek) {
    echo mysqli_error($konek);
}

?>