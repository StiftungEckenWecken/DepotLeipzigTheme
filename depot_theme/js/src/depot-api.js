/**
 * Depot requests helper
 * 
 * Consists of tree-shakable functions to 
 * communicate with backend services
 * 
 * @author Felix Albroscheit
 */

/**
 * Pass list of visible resource-ids and user geolocation to backend,
 * get distance per resource per metre in return and render it back 
 * to resources-list
 * 
 * @param {Float} lat 
 * @param {Float} lng 
 */
export const getDistancesForActivePage = function(lat, lng) {

    let resource_ids = [];

    jQuery('.view-resources-list .resource-wrapper').each(function(){
        resource_ids.push(jQuery(this).attr('data-resource-id'));
    });

    jQuery.ajax({
        url: Drupal.settings.basePath + `depot/ajax/getDistanceFromLocations?lng=${lng}&lat=${lat}&ids=` + resource_ids.join(','),
        type: 'GET',
        contentType: 'application/json',
        error: function () {
            console.log('getDistanceFromLocations: request failed.');
        },
        success: function (response) {

            if (typeof response.status !== 'undefined' && response.status === 'success') {
                Object.keys(response.data).forEach(function(resourceId) {
                    const distanceInMetres = Number(response.data[resourceId]),
                        distanceFormatted = (distanceInMetres / 1000).toString()
                                                                     .replace('.',',')
                                                                     .substr(0,3) + '0',
                        targetElem = jQuery(`.view-resources-list .resource-wrapper[data-resource-id="${resourceId}"]`);

                    if (targetElem) {
                        targetElem.find('.resource-link')
                                .append(`
                                    <div class="user-badge price-badge resource-distance-badge medium-1 column" style="display:none;">
                                        ${distanceFormatted}<br /> km
                                    </div>`)
                                .find('.resource-distance-badge')
                                .fadeIn('slow');
                    }

                });
            }

        }
    });

};