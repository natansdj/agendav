<?php
/*
 * Copyright 2011-2012 Jorge López Pérez <jorge@adobo.org>
 *
 *  This file is part of AgenDAV.
 *
 *  AgenDAV is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  any later version.
 *
 *  AgenDAV is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with AgenDAV.  If not, see <http://www.gnu.org/licenses/>.
 */

class Defs {
    // Leave jQuery and jQuery UI the two first scripts
    static $jsfiles= array(
            'libs/jquery-1.7.2.min.js',
            'libs/jquery-ui-1.8.23.custom.min.js',
            'libs/jquery.freeow.min.js',
            'libs/fullcalendar.min.js',
            'libs/jquery.colorPicker.js',
            'libs/jquery.qtip.min.js',
            'libs/jquery.colorhelpers.js',
            'libs/jquery.timePicker.20110318.js',
            'libs/jquery.cookie.js',
            'libs/jquery.serializeobject.js',
            'translation.js',
            'libs/dust-core-1.0.0.js',
            'templates/templates.js',
            'app.js',
            );

    static $cssfiles = array(
            'bootstrap.agendav.css',
            'Aristo_20111229.css',
            'fullcalendar.css',
            'jquery.qtip.min.css',
            'timePicker.css',
            'freeow.css',
            'colorpicker.css',
            'app.css',
            );
    static $printcssfiles = array(
            'app.print.css',
            );

    function definitions() {
        define('AGENDAV_VERSION', '1.2.6.2');
        set_include_path(implode(PATH_SEPARATOR, array(
                        BASEPATH . '../../libs/icalcreator',
                        BASEPATH . '../../libs/own_extensions',
                        BASEPATH . '../../libs/awl',
                        BASEPATH . '../../libs/caldav-client',
                        get_include_path()
                        )));

    }

    /**
     * Set PHP default timezone. date.timezone has to be set on php.ini, PHP
     * throws some warnings when it is not. Use configuration parameter
     * default_timezone
     */
    function default_tz() {
        $CI_config =& load_class('Config');
        date_default_timezone_set($CI_config->item('default_timezone'));
    }
}
