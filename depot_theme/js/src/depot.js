/**
 * Depot UI
 * 
 * @version 2.0.1
 * @author Felix Albroscheit
 * @see https://www.drupal.org/docs/7/api/javascript-api
 * @see http://es6-features.org/#Constants
 * @todo Move page-specific events into own files
 * 
 */

import Maps from './depot-maps';
import { loadavg } from 'os';

;(function ($, window, document, undefined) {
    'use strict';

    let selectize;

    Drupal.behaviors.depot = { 
        attach (context, settings) {

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
              var hash = this.hash.replace('#%22','');

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
                $('__#main-menu__region-selected').click(function() {
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
            !$('body').hasClass('page-ressourcen-edit') &&
            !$('#resources-list-selectize').length) {
            // Ressource details view

            if (location.hash.indexOf('#sperrzeiten') >= 0) {
                $('#openVerfuegbarkeitenModal').click();
            }

            $('#availability_calendar_btn').click(function () {
                if (typeof cal !== 'undefined' &&
                    typeof cal.show === 'function') {
                    cal.show();
                    return false;
                } else {
                    console.log('depot.js - ATTENTION: Missing or corrupt resourceCal settings');
                }
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

        if ($('.view-resources-list').length >= 1) {
            // = Is front or /ressourcen page

            $('body', context).once('resources-list-selectize', function() {

                if ($('body').hasClass('section-ressourcen')) {
                    // = Is /ressourcen page
                    // Prevent #resources-list-selectize to be multi-rendered
                    $('#main-content').prepend($('#resources-list-selectize'));
                }

                let options = [];

                // Map views-filter options to actual dropdown menu
                $('#edit-kategorie-id option').each(function(){
                    options.push({ value: $(this).val(), text: $(this).html().replace(/&amp;/, "&") });
                });

                const $selectize = $('#resources-list-selectize select').selectize({ 
                    delimiter: ',',
                    persist: false,
                    maxItems: 2,
                    options: options,
                    placeholder: settings.depot.t_filterKategorienPlaceholder,
                    closeAfterSelect: true,
                    selectOnTab: true,
                    create: function(input) { 
                        return {
                            value: input,
                            text: input
                        };
                    },
                    render: {
                        option_create: function(data, escape) {
                          // implement a "Nach Schlagwort xy suchen" message in dropdown
                          if (escape(data.input).toString().length >= 3) {
                            return `<div class="create">Nach Schlagwort "<strong>${escape(data.input)}</strong>" suchen&hellip;</div>`;
                          }
                        }
                      },
                });

                selectize = $selectize[0].selectize;

                // Bind "query-filter ADD" to views filters
                selectize.on('option_add', function(val, data) {
                    $('#resources-list-selectize__clear').removeClass('hide');

                    $('#edit-kategorie-id').val([]);

                    $('input[name="query"]').val(val)
                          .trigger('change');
                });

                // Bind "all filters REMOVE" to views filters
                selectize.on('clear', function() {
                    $('#resources-list-selectize__clear').addClass('hide');

                    $('input[name="query"]').val('');
                
                    $('#edit-kategorie-id').val([])
                                           .trigger('change');
                });

                // Bind "deselect any item" to views filters
                selectize.on('item_remove', function(val) {
                    selectize.trigger('option_remove', val);
                });

                // Bind "remove any item/option" to views filters
                selectize.on('option_remove', function(val) {
                    if (!isNaN(val)) {
                      // Category filter
                      $('#edit-kategorie-id').val([])
                                             .trigger('change');
                    } else {
                      // Schlagwort filter
                      $('input[name="query"]').val('');
                    }
                });

                // Bind "all filters REMOVE" to view filters
                selectize.on('item_add', function(val, item) {

                    $('#resources-list-selectize__clear').removeClass('hide');

                    let type = 'category';

                    if (!isNaN(val)) {
                        // Category filter
                        if ($('.selectize-input .item').not('.is-tag-item').length > 1) {
                          // Allow only one category option
                          const _val = $('.selectize-input .item').not('.is-tag-item')
                                                                  .first()
                                                                  .attr('data-value');

                          selectize.removeOption(_val);
                        }

                        $('#edit-name').val('');
                        $('#edit-kategorie-id').val(val)
                                               .trigger('change');
                    } else {
                        // Schlagwort filter
                        type = 'query';
                        item.addClass('is-tag-item');

                        if ($('.selectize-input .item.is-tag-item').length > 1) {
                          // Allow only one query option
                          const _val = $('.selectize-input .item.is-tag-item').first()
                                                                              .attr('data-value');

                          selectize.removeOption(_val);
                        }
                    }

                    if (item.html().toString().indexOf('item-type') < 0) {
                      item.html(item.html() + ` <span class="item-type">${settings.depot['t_search_type_' + type]}</span>`);
                    }
                });

                $('#resources-list-selectize__clear').click(function() {
                    selectize.clear();
                });

            }); // End "once render selectize" 

            //$('#edit-kategorie-id-wrapper').addClass('medium-8 column');

            // Enable auto-embedding of views filter results (front page only)
            if (typeof Drupal.settings.views.ajaxViews.views_dom_id_startpage !== 'undefined') {
                if (typeof Drupal.settings.views.ajaxViews.views_dom_id_startpage.view_display_id !== 'undefined') {
                    Drupal.settings.views.ajaxViews.views_dom_id_startpage.view_display_id = 'page';
                }
            }

            $('.depot-resources-list__no-results-reset-filter').click(function() {
                // Unset all filters
                selectize.clear();
            });
            
            let countResources = 0;

            $('.view-resources-list .resource-wrapper').each(function(key, elem) {
                // CSS: nth-child?
                if (key >= 9) {
                    $(elem).addClass('hide');
                }
                countResources = key;
            });

            $('#depot-resources-list__btn-expand').click(function() {
                $(this).addClass('hide');
                $('.view-resources-list .resource-wrapper.hide, #depot-resources-list__btn-show-more').removeClass('hide');
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