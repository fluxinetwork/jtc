<?php
$footer_mail=$refer_url= '';

if ( $vars ) :   
    $footer_mail = $vars[0];    
    $refer_url = $vars[1];   
endif;

$contenu_mail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<<<<<<< Updated upstream
  <title>CLER - Ajout d\'un événement</title>
=======
  <title>Journée de la transition citoyenne - Ajout d\'un événement</title>
>>>>>>> Stashed changes
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body bgcolor="#ffffff" style="margin:0;">
    <table width="100%" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <p>
            Bonjour,<br><br>         
            Vous venez de saisir un événement sur le site des Journées de la transition citoyenne, et nous vous en remercions.<br><br>            
            Ces informations seront prochainement publiées sur notre site après vérification de notre équipe.<br><br>            
            En vous souhaitant une bonne journée,
          </p>
        </td>
      </tr>   
      <tr>
        <td>
          '.$footer_mail.'
        </td>
      </tr>   
    </table>
</body>
</html>';
?>