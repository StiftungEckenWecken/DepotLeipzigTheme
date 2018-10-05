/**
 * Depot UI
 * 
 * @version 2.0.0
 * @author Felix Albroscheit
 * @see https://www.drupal.org/docs/7/api/javascript-api
 * @see http://es6-features.org/#Constants
 * 
 */

import Maps from './depot-maps';

;(function ($, window, document, undefined) {
    'use strict';

    Drupal.behaviors.depot = { 
        attach : function (context, settings) {

            // Enable "smooth scroll" on internal links
            function filterPath(string) {
              return string
                .replace(/^\//, '')
                .replace(/(index|default).[a-zA-Z]{3,4}$/, '')
                .replace(/\/$/, '');
            }
            
            var locationPath = filterPath(location.pathname);
            
            $('a[href*="#"]').each(function () {

              var thisPath = filterPath(this.pathname) || locationPath;
              var hash = this.hash;

              if ($("#" + hash.replace(/#/, '')).length) {
                if (locationPath === thisPath && (location.hostname === this.hostname || !this.hostname) && this.hash.replace(/#/, '')) {
                  
                    var $target = $(hash), target = this.hash;
                  
                  if (target) {
                    $(this).click(function (event) {
                      
                      event.preventDefault();

                      $('html, body').animate({scrollTop: $target.offset().top}, 1000, function () {
                        location.hash = target; 
                        $target.focus();
                        if ($target.is(":focus")) { //checking if the target was focused
                          return false;
                        } else {
                          $target.attr('tabindex','-1'); //Adding tabindex for elements not focusable
                          $target.focus(); //Setting focus
                        }
                      });       
                    });
                  }
                }
              }
            });

            $('#main-menu', context).once('toggle_region_select', () => {
                // Events to open, close and adjust region select section
                $('#main-menu__region-selected').click(function() {
                    const selected = $(this);

                    selected.addClass('active-trail');

                    $('#depot-region-select')
                      .css({ 
                          left: selected.offset().left,
                          top: selected.height() 
                      })
                      .show();

                    $('#depot-region-select .close-popup').click(function() {
                        $('#depot-region-select')
                          .hide();

                        selected.removeClass('active-trail');
                    });
                });
            });

        if ($('.form-item-field-fake-kategorie').length >= 1) {
            /**
             * Resources edit form
             * 
             * Map selections to their actual (yet hidden) input field.
             * YES, there were less alternatives to a non-JS-approach
             */
            //   // #edit-field-kategorie-und-0-state-id
            const kategorieSelect = $('#edit-field-fake-kategorie');

            kategorieSelect.select2({
                placeholder: settings.depot.t_addKategorienPlaceholder,
                maximumSelectionLength: 3,
            });

            const resetKategorien = () => {
                // Map select2 selections to their actual input field
                const data = kategorieSelect.select2('data');
                
                for (let i = 0; i !== 3; i++) {
                    const val = (typeof data[i] !== 'undefined' ? data[i].id : '');
                    $('#edit-field-kategorie-und-'+ i +'-state-id').val(val);
                }
            };

            kategorieSelect
             .on('select2:select', resetKategorien)
             .on('select2:unselect', resetKategorien);
        }

        if ($('#depot-resources-map').length === 1) {

          $('#depot-resources-map', context).once('add-map', () => {

            const resourcesMap = new Maps(document.getElementById('depot-resources-map'), settings.depot, depotResourceMarkers);

          });

        }

        if ($('body').hasClass('section-ressourcen') &&
            !$('body').hasClass('page-ressourcen-edit')) {
            // Ressource details view

            $('#availability_calendar_btn').click(function () {
                if (typeof cal !== 'undefined' &&
                    typeof cal.show === 'function') {
                    cal.show();
                } else {
                    console.log('depot.js - ATTENTION: Missing or corrupt resourceCal settings');
                }
                return false;
            });
            
            if (typeof depotResourceMarker !== 'undefined') {

                $('#open-resource-map').click(function() {
                    $(document).scrollTop(0);

                    if ($('#depot-resource-map').html() === '') {
                        window.setTimeout(function(){

                            // ....After firing a reveal.open():
                            settings.depot.maps_default_lat = depotResourceMarker[0].lat;
                            settings.depot.maps_default_lng = depotResourceMarker[0].lng;
                            const resourceMap = new Maps(document.getElementById('depot-resource-map'), settings.depot, depotResourceMarker);
                        
                        }, 1000);
                    }
                });
            } else {
                console.log('depot.js - ATTENTION: No map rendered as geodata is missing');
            }
        }

        if ($('.depot-resources-list').length >= 1 ||
            $('.depot-resources-list__no-results').length >= 1) {
            // Autoselect filter-box for resources-view

            // Make '<Alle>' unselectable
            $('#edit-kategorie-id option')
              .first()
              .remove();

            $('#edit-kategorie-id').select2({
                placeholder: settings.depot.t_filterKategorienPlaceholder,
                maximumSelectionLength: 1,
               // allowClear: true,
                multiple: true,
                tags : false,
                language : 'de'
            }); 

            $('.depot-resources-list__no-results-reset-filter').click(function() {
                // Unset all filters
                $('#edit-kategorie-id').val(null).trigger('change');
            });

            $('#edit-kategorie-id-wrapper').addClass('medium-8 column');

            //  $('.form-type-select.form-item-kategorie-id').insertBefore('.view-resources-list'); 
            $('#views-exposed-form-resources-list-default').on('change', function(ev) {
                //ev.preventDefault();
                console.log('chaaaange form!');
                return false;
            });

            $('#edit-kategorie-id').on('selection:update', function (e) {
                console.log('update');
            });

            // Add event to copied, hidden select field
            $('#edit-kategorie-id').on('select2:selecting', function (e) {
                
                //$('#edit-kategorie-id').removeAttr('multiple');
                //console.log('now', $('#edit-kategorie-id'));

                let data = e.params.data;
                /**
                 * data = {
                 *   disabled[bool], element[html], id[str],
                 *   selected[bool], text[str], title[str] 
                 * }
                 */
            });

            // Enable auto-embedding of views filter results
            Drupal.settings.views.ajaxViews.views_dom_id_startpage.view_display_id = 'page';
            
            let countResources = 0;

            $('.depot-resources-list .resource-wrapper').each(function(key, elem) {
                // CSS: nth-child?
                if (key >= 9) {
                    $(elem).addClass('hide');
                }
                countResources = key;
            });

            $('#depot-resources-list__btn-expand').click(function() {
                $(this).addClass('hide');
                $('.depot-resources-list .resource-wrapper.hide, #depot-resources-list__btn-show-more').removeClass('hide');
                return false;
            });

            // Less results than possible? Hide "More resources" btn
            if (countResources <= 9) {
                $('#depot-resources-list__btn-expand').trigger('click');
            }
        }

        // Resources-edit-form
        $('#edit-field-links-i input[type="text"]').keyup(function () {
            if ($(this).val().length >= 1) {
                $('#edit-field-links-ii').removeClass('hide');
            }
        });

        $('#edit-field-links-ii input[type="text"]').keyup(function () {
            if ($(this).val().length >= 1) {
                $('#edit-field-links-iii').removeClass('hide');
            }
        });

        $('.fieldset-toggle legend').click(function () {
            $(this).closest('.fieldset-toggle').toggleClass('toggled');
        });

        if ($('body').hasClass('section-ressourcen')) {
            const url = window.location.pathname;

            if (url.search('av') > 1) {
                // @todo for 2.0.0: NOT WORKING AS EXPECTED!
                $('#verfuegbarkeitenModal').trigger('click');
            }
        }

        const $followBoxes = $('.follow-box');

        if ($followBoxes.length > 0 && $(window).width() > 641) {
            let followBoxes = [];

            for (let i = 0; i < $followBoxes.length; i++) {
                followBoxes.push({
                    element: $followBoxes[i],
                    offset: $($followBoxes[i]).offset()
                });
            }

            $(window).scroll(function (e) {
                const scrollTop = $(e.currentTarget).scrollTop();

                for (let i = 0; i < followBoxes.length; i++) {
                    const followBoxesTop = $followBoxes.height() + 30;
   
                    if ((scrollTop > followBoxes[i].offset.top)) {
                        $(followBoxes[i].element).addClass('follow');
                        if (scrollTop > followBoxesTop) {
                            $(followBoxes[i].element).addClass('fade-out');
                        } else {
                            $(followBoxes[i].element).removeClass('fade-out');
                        }
                    } else {
                        $(followBoxes[i].element).removeClass('follow')
                                                 .removeClass('fade-out');
                    }
                }

            });
        }

      }
    };

}(jQuery, window, window.document));