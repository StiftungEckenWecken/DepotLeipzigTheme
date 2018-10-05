/**
 * Depot maps lib
 * 
 * Displays a HERE map & resource-markers
 * 
 * @author Felix Albroscheit
 * @see https://developer.here.com/documentation/maps/topics/map-controls.html            
 * @todo Import HERE maps lib as modules
 */

export default class {

    /**
     * @function constructor
     * @param {html} targetElem DOM element to be rendered
     * @param {object} settings (i18n, map center, API-credentials)
     * @param {object} markers 
     */
    constructor (targetElem, settings, markers = null) {

        if (parseFloat(settings.maps_default_lat) === 'NaN' ||
            parseFloat(settings.maps_default_lng) === 'NaN') {
            console.log('depot-maps.js - WARNING: Got none or invalid HERE maps credentials');
            return;
        }

        if (typeof settings.maps_app_id === 'undefined' ||
            typeof settings.maps_app_code === 'undefined') {
            console.log('depot-maps.js - WARNING: Missing API credentials');
            return;
        }

        if (typeof H === 'undefined') {
            console.log('depot-maps.js - WARNING: No maps assets loaded. Will abort');
            return;
        }

        const platform = new H.service.Platform({
            app_id: settings.maps_app_id,
            app_code: settings.maps_app_code,
            useHTTPS: true
        });

        const defaultLayers = platform.createDefaultLayers();

        const map = new H.Map(
            targetElem,
            defaultLayers.normal.map,
            {
                zoom: 12,
                center: { 
                    lat: parseFloat(settings.maps_default_lat),
                    lng: parseFloat(settings.maps_default_lng)
                }
            }
        );

        // Make map become "draggable"
        const behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map)),
              ui = H.ui.UI.createDefault(map, defaultLayers, 'de-DE'),
              markerGroup = new H.map.Group();

        map.addObject(markerGroup);
    
        let currentBubble;

        markerGroup.addEventListener('tap', (ev) => {
            
            // Show resource-data as bubble/popup
            const bubble = new H.ui.InfoBubble(ev.target.getPosition(), {
                content: ev.target.getData()
            });

            if (currentBubble) {
                ui.removeBubble(currentBubble);
            }

            currentBubble = bubble;

            ui.addBubble(bubble);
            map.setCenter(ev.target.getPosition());
            map.zoomAt(14);

        }, false);

        if (markers) {

            let buffer = {}; 

            markers.forEach((_marker) => {

                let markerOffset = 0;
                const geoAsString = _marker.lat.toString() + _marker.lng.toString();

                if (typeof buffer[geoAsString] !== 'undefined') {
                    markerOffset = buffer[geoAsString];
                    //_marker.lat + (0.000 + (markerOffset * 20));
                    buffer[geoAsString]++;
                } else {
                    buffer[geoAsString] = 1;
                }

                console.log(buffer[geoAsString]);

                const marker = new H.map.DomMarker({
                    lat : _marker.lat,
                    lng : _marker.lng
                }, { icon: this._generateDomMarker() });

                marker.setData(`<p>
                                <a href="/ressourcen/${_marker.slug}"
                                 title="${settings.t_map_open_resource}"
                                 target="_blank">
                                    ${_marker.title}
                                </a> - ${_marker.adress}
                                </p>`);
            
                markerGroup.addObject(marker);
            });

        }

    }

    /**
     * @function _generateDomMarker
     * @returns {html} Marker that is capable of receiving DOM events.
     * @todo Enable over-writing outer- and inner-elements style's
     */
    _generateDomMarker () {

        const defaultOpacity = 0.75;

        let outerElement = document.createElement('div'),
            innerElement = document.createElement('div');

        outerElement.style.userSelect = 'none';
        outerElement.style.webkitUserSelect = 'none';
        outerElement.style.msUserSelect = 'none';
        outerElement.style.mozUserSelect = 'none';
        outerElement.style.cursor = 'pointer';
        outerElement.style.opacity = defaultOpacity;

        innerElement.style.width = '30px';
        innerElement.style.height = '32px';
        // add negative margin to inner element
        // to move the anchor to center of the div
        innerElement.style.marginTop = '-16px';
        innerElement.style.marginLeft = '-15px';

        outerElement.appendChild(innerElement);

        innerElement.innerHTML = '<img src="/sites/all/themes/depot_theme/images/marker.png" />';

        const changeOpacity = (ev) => {
            ev.target.style.opacity = defaultOpacity;
        };

        const changeOpacityToOne = (ev) => {
            ev.target.style.opacity = 1;
        };

        const domIcon = new H.map.DomIcon(outerElement, {
            onAttach: function(clonedElement, domIcon, domMarker) {
                clonedElement.addEventListener('mouseover', changeOpacityToOne);
                clonedElement.addEventListener('mouseout', changeOpacity);
            },
            onDetach: function(clonedElement, domIcon, domMarker) {
                clonedElement.removeEventListener('mouseover', changeOpacityToOne);
                clonedElement.removeEventListener('mouseout', changeOpacity);
            }
        });

        return domIcon;

    }
}