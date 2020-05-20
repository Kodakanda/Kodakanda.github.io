<?php
function debug($data, $isDie = true) {
  echo '<Pre>'; print_r($data);
  if ($isDie) die();
}
?>