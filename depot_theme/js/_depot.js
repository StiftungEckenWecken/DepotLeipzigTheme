/* Depot javascript */

;(function ($, window, document, undefined) {
  'use strict';

  $(document).ready(function(){

    $('#depot-global-select-kategorie').change(function(){
      var targetKategorie = $(this).val();
      var target = '/ressourcen';
      
      if (targetKategorie != '')
          target += '?kategorie_id=' + targetKategorie;

      window.location = target;
    });

    $('.page-ressourcen-neu #edit-link-i input[type="text"]').keyup(function(){
      if ($(this).val().length >= 1){
        $('.page-ressourcen-neu #edit-link-ii').removeClass('hide');
      }
    });

    $('.page-ressourcen-neu #edit-link-ii input[type="text"]').keyup(function(){
      if ($(this).val().length >= 1){
        $('.page-ressourcen-neu #edit-link-iii').removeClass('hide');
      }
    });

    $('.fieldset-toggle legend').click(function(){
      $(this).closest('.fieldset-toggle').toggleClass('toggled');
    });

}); 
  
}(jQuery, window, window.document));