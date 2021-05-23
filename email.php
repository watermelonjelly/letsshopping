<?php

function spamcheck($field)
{
  //filter_var() sanitizes the e-mail
  //address using FILTER_SANITIZE_EMAIL
  $field = filter_var($field, FILTER_SANITIZE_EMAIL);

  //filter_var() validates the e-mail
  //address using FILTER_VALIDATE_EMAIL
  if (filter_var($field, FILTER_VALIDATE_EMAIL))
    return TRUE;
  else
    return FALSE;
}

?>