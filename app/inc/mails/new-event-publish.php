<?php
$footer_mail=$refer_url=$event_url='';

if ( $vars ) :   
    $footer_mail = $vars[0];    
    $refer_url = $vars[1];
    $event_url = $vars[2];  
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
           Bonjour, bravo pour votre mobilisation et l\'organisation d\'une journée de la transition avec le Collectif pour une transition citoyenne !<br><br>

Nous avons validé votre événement qui apparaît d\'ores et déjà sur la <a href="'.$refer_url.'">cartographie</a>. Vous pouvez le consulter en <a href="'.$event_url.'">cliquant ici</a>. Si vous souhaitez effectuer des modifications, merci de nous contacter.<br><br>

Le Collectif reviendra régulièrement vers vous pour vous transmettre des supports de communication, des fiches pratiques.<br><br>

Merci de rejoindre la dynamique et nous nous tenons à votre disposition pour toute question ou remarque à l\'adresse suivante : contact@transitioncitoyenne.org et celine.provost@transitioncitoyenne.org.<br><br>

Afin de valoriser vos actions et inviter des personnes à votre événement, le Collectif pour une Transition Citoyenne vous transmet un kit de communication. Celui-ci contient des affiches personnalisables pour vos événements, des bandeaux pour vos réseaux sociaux, un flyer, les logos... Vous pouvez le télécharger en <a href="http://www.transitioncitoyenne.org/wp-content/uploads/2016/09/Kit-organisateurs.zip">cliquant ici</a> !
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