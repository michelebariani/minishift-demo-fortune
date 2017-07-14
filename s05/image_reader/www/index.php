<html>
<head><title>Fortune: Reader</title></head>
<body>
<?php

  $num = getenv("QUOTE_NUM");
  $url = getenv("QUOTE_URL");

  for ($i = 1; $i <= $num; $i++) {
    echo '<p>',file_get_contents($url),'<p>';
  }

?>
</body>
</html>
