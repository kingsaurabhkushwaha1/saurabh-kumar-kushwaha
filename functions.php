<?php 
function Redirect($pURL){
    if (strlen($pURL) > 0){
        if (headers_sent()) {
            echo "<script>window.location.href='".$pURL."';\n</script>"; 
            
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
            echo '</noscript>';
            exit;
        }
        else{
            header("Location: " . $pURL);
            exit;
        }
        exit();
    }
  }
?>
      
	  