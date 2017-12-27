<?php

global $base_url;

$html = '<!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="utf-8">
            <title>Verleihvertrag_Depot_Leipzig_'.$booking->created.'</title>
            <style>
              body, h1, h2, h3, h4, h5, h6, * {
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
              }
              .text-center { text-align: center; }
              .italic { font-style: italic; }
              .medium-6 { width:50%;float:left; }
              .medium-3 { width:24%;float:left; }
              .medium-4 { width:29%;float:left;padding-right:4%}
              .fake-table { border:1px solid grey; }
              .fake-table div { text-align:center;padding-top:20px;border-bottom:1px solid grey;border-right:1px solid grey;height:80px; }
              .fake-table div.no-border { border-right:unset;}
            </style>
          </head>
          <body>
            <div>
              <h1>
                <a href="'.$base_url.'">
                  <img src="'.$base_url.'/sites/all/themes/depot_theme/images/powered_by.png" width="130">
                  <br />
                </a>
              </h1>
            </div>

            <div id="intro">
              <h3 class="text-center">Verleihvertrag</h3>
              <p class="text-center italic">zwischen</p>
              <p><strong>'.$ausleiher->field_vorname['und'][0]['safe_value'].' '. $ausleiher->field_nachname['und'][0]['safe_value'] .'</strong>, '. $ausleiher->field_user_adresse_strasse['und'][0]['safe_value'] .' '. $ausleiher->field_user_adresse_hausnummer['und'][0]['safe_value'] .', '.$ausleiher->field_user_adresse_postleitzahl['und'][0]['safe_value'].' '.$ausleiher->field_user_adresse_wohnort['und'][0]['safe_value'].' '. (isset($ausleiher->field_organisation_name['und'][0]['value']) ? ', handelnd für '. $ausleiher->field_organisation_name['und'][0]['safe_value'] : '') .'  <strong> (Nutzer) </strong> und</p>
              <p><strong>'.$anbieter->field_vorname['und'][0]['safe_value'].' '. $anbieter->field_nachname['und'][0]['safe_value'] .'</strong>, '. $anbieter->field_user_adresse_strasse['und'][0]['safe_value'] .' '. $anbieter->field_user_adresse_hausnummer['und'][0]['safe_value'] .', '.$anbieter->field_user_adresse_postleitzahl['und'][0]['safe_value'].' '.$anbieter->field_user_adresse_wohnort['und'][0]['safe_value'].' '. (isset($anbieter->field_organisation_name['und'][0]['value']) ? ', handelnd für '. $anbieter->field_organisation_name['und'][0]['safe_value'] : '') .'  <strong> (Anbieter) </strong></p>
              <p>Der Nutzer leiht vom Anbieter zu den im „Depot Leipzig“ für die u.g. Ressource bereitgestellten Nutzungsbedingungen:</p>
            </div>

            '.$booking_header.'

            <div class="container">
              '. (!empty($ressource->field_verleihvertrag_text) ? $ressource->field_verleihvertrag_text['und'][0]['value'] : '') .'
             
              [HAUPTTEIL]
              <p>Hier noch einmal die wichtigsten Inhalte aus den Nutzungsbedingungen:</p>
              <ul>
                <li>Bei Übergabe/Rückgabe immer mindestens zu zweit kommen, damit Auf- und Abladen zügig erfolgen können.</li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
              <p>Ergänzungen (Platz für handschriftliche Ergänzungen):</p>
              <br /><br /><br />
              <div class="signment medium-6">
                <p>_______________________________</p>
                <p>(Unterschrift Nutzer)</p>
              </div>
              <div class="signment medium-6">
                <p>_______________________________</p>
                <p>(Unterschrift Anbieter)</p>
              </div>

            </div> <!-- /container -->

            <div id="protokoll" class="container">
              <hr />
              <p>Die Übergabe erfolgte am _____.______._________ , ________ Uhr.</p>

              <div class="fake-table">
                <div class="medium-6">Die Ressourcen wiesen folgende Mängel auf:</div>
                <div class="medium-3">Empfangsbestätigung Ressource, Nutzer</div>
                <div class="medium-3 no-border">Empfangsbestätigung Leihpreis u. Kaution, Anbieter</div>
                
                <div class="medium-6"><br /><br /></div>
                <div class="medium-3"><br /><br /></div>
                <div class="medium-3 no-border"><br /><br /></div>
              </div>

              <br />

              <p>Die Rückgabe erfolgte am _____.______._________ , _________ Uhr.</p>

              <div class="fake-table">
                <div class="medium-6">Die Ressourcen wiesen folgende Mängel auf:</div>
                <div class="medium-3">Empfangsbestätigung Ressource, Nutzer</div>
                <div class="medium-3 no-border">Empfangsbestätigung Leihpreis u. Kaution, Anbieter</div>
                
                <div class="medium-6"><br /><br /></div>
                <div class="medium-3"><br /><br /></div>
                <div class="medium-3 no-border"><br /><br /></div>
              </div>
              
            </div>
          </body>
        </html>';