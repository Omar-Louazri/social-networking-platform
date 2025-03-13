<?php
require './controllerUserData.php';


$html = '<div>

<span class="smw smw-inline smw-basic smw-ct-default smw-visible" 
      data-symbol="GSD.V" data-type="inline" 
      data-refresh-frequency="5" 
      data-source="live">
    <span class="smw-market-data-field smw-field-l1" 
          data-field="l1">
          <div class="fkuzefki">
        0.65s
        </div>
    </span>
</span>

</div>';



$without_span = $html;
$without_span = preg_replace('#\n\r#', '', $without_span);
$without_span = preg_replace('#\n#', '', $without_span);

while(preg_match_all('#(<span.*?>)(.*?)(</span>)#', $without_span)) {  
  $without_span = preg_replace('#(<span.*?>)(.*?)(</span>)#', '$2', $without_span);
}

echo(htmlentities($without_span));
?>