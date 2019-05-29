<?php
// My common functions
function thumbnail($x)
{
  $path = pathinfo($x);
  return $path['dirname']."/".$path['filename']."-400.".$path['extension'];
}
?>
