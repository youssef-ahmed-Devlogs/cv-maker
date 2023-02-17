<?php

function makeSlug($value)
{
  return strtolower(implode("-", explode(' ', $value)));
}
