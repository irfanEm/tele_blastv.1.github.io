<?php
  function parseURL(){
    if(isset($_GET['url'])) {
      $url = $_GET['url'];
      return $url;
    }
  }