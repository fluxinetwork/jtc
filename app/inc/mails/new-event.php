<?php
$footer_mail=$refer_url='';

if ( $vars ) :   
    $footer_mail = $vars[0];    
    $refer_url = $vars[1];   
endif;

$contenu_mail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Journée de la transition citoyenne - Ajout d\'un événement</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body bgcolor="#ffffff" style="margin:0;">
    <table width="100%" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">     

      <tr>
        <td>
          <p>
           Bonjour,<br><br>

          Vous venez de saisir un événement sur le site de la Journée de la Transition (<a href="'.$refer_url.'">journeedelatransition.org</a>), et nous vous en remercions.<br><br>

          Après vérification de notre équipe, votre événement sera prochainement visible sur notre site. Vous recevrez un mail de validation de la publication de votre Journée de la transition.<br><br>

          Si vous souhaitez effectuer des modifications, contactez-nous directement.
          </p>
        </td>
      </tr>      

      <tr>
        <td>
          '.$footer_mail.'
        </td>
      </tr>

       <tr>
        <td>
          <p>
           ## CECI EST UN MESSAGE AUTOMATIQUE. MERCI DE NE PAS Y RÉPONDRE ##
          </p>
        </td>
      </tr>

    </table>
</body>
</html>';
?>