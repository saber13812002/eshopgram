<?php require("SaberHeader.php"); ?>

SABER
<?php
    if (isset($this->data)) {
        echo '<div>';
        foreach ($this->data as $key => $value) {
            echo $this->data[$key]['email'] . '<br>';
        }
        echo '</div>';
    }
    ?>


<?php require("SaberFooter.php"); ?>