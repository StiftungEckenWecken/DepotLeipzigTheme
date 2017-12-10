/* Depot javascript */

;(function ($, window, document, undefined) {
  'use strict';

  $(document).ready(function(){

    $('#depot-global-select-kategorie').change(function(){
      var targetKategorie = $(this).val();
      var target = '/ressourcen';
      
      if (targetKategorie !== '') {
          target += '?kategorie_id=' + targetKategorie;
      }

      window.location = target;  
    });

    $('#edit-field-links-i input[type="text"]').keyup(function(){
      if ($(this).val().length >= 1){
        $('#edit-field-links-ii').removeClass('hide');
      }
    });

    $('#edit-field-links-ii input[type="text"]').keyup(function(){
      if ($(this).val().length >= 1){
        $('#edit-field-links-iii').removeClass('hide');
      }
    });

    $('.fieldset-toggle legend').click(function(){
      $(this).closest('.fieldset-toggle').toggleClass('toggled');
    });

    if ($('body').hasClass('section-ressourcen')){
      var url = window.location.pathname;
      if (url.search('av') > 1){
        $('#verfuegbarkeitenModal').trigger('click');
      }

    }

}); 
  
}(jQuery, window, window.document));