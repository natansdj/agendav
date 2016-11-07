Configuration
=============

Configuring AgenDAV requires modifying some PHP text files located in the
``web/config/`` directory.

The following files are usually found as ``filename.php.template``, so make
a copy of them with the correct file name to make them work.

.. note::

   ``ldap.php`` was removed in AgenDAV 1.1.1

General configuration (config.php)
----------------------------------

``config.php`` file specifies general options about AgenDAV environment. It
loads a set of default option values from ``defaults.php``, but it is
recommended to configure all of the following variables.

Please, do not modify ``defaults.php``, as it is a file that updates on
every AgenDAV upgrade to avoid problems if you forget any configuration
setting.

.. confval:: base_url

   Specify here your full public URL to access AgenDAV, adding a trailing
   slash. Example::

    $config['base_url'] = 'https://agendav.host/';

.. confval:: show_in_log

   Array of logging levels which will appear in logs. Possible logging
   levels are:

   * ``ERROR``: error messages, recommended
   * ``INFO``: informational messages, recommended
   * ``AUTHERR``: authentication errors
   * ``AUTHOK``: successful authentications
   * ``INTERNALS``:  AgenDAV internal processing actions, not recommended unless
     you are having problems or you want to debug AgenDAV
   * ``DEBUG``: CodeIgniter internal debug. Do not enable unless you know
     what you are doing

   Example::

    $config['show_in_log']= array('ERROR','INFO','AUTHERR', 'AUTHOK');

.. confval:: log_path

   Full path where logs will be created. Add a trailing slash. Example::

    $config['log_path'] = '/var/log/agendav/';

   Make sure the user that runs your web server has write permission on that
   directory.

.. confval:: encryption_key

   Random string which will be used to encrypt some cookie values.

.. confval:: cookie_prefix

   Prefix that should be prepended to your cookie names. Useful if you have
   several sites hosted on the same hostname and you want to avoid name
   collisions

.. confval:: cookie_domain

   Domain the cookie will be defined for. Use ``.domain.tld`` or
   ``full.host.domain.tld``, depending on what you want.

.. confval:: cookie_path

   Path the cookie will be defined for.

.. confval:: cookie_secure

   Create cookies only for use in https environments. Set it TRUE if your
   users access AgenDAV via https.

.. confval:: proxy_ips

   Comma delimited IPs of your proxies, which will make CodeIgniter
   framework to trust the HTTP_X_FORWARDED_FOR header. Leave it blank if
   your AgenDAV installation isn't being accessed via HTTP proxy.

.. confval:: site_title

   Title of every page

.. confval:: logo

   Image filename which will be used as a logo. Has to be a valid filename
   placed inside ``web/public/img/`` directory.

.. confval:: login_page_logo

   Image filename which will be used as a logo only for login page. It's
   usually bigger than the normal logo. Has to be a valid filename placed
   inside ``web/public/img/`` directory.

   .. versionadded:: 1.2.6

.. confval:: footer

   Text to be placed in the footer.

.. confval:: logout_redirect_to

   When logging out from AgenDAV, the URL the user will be redirected to.

   Can be left empty to redirect user to login page again.

.. confval:: additional_js

   Array of additional JavaScript files which you will be loading on every
   page. They have to be placed inside ``web/public/js``

.. confval:: show_public_caldav_url

   Whether to show CalDAV URL links or not in the edit dialog

   .. seealso:: :confval:`public_caldav_url`

.. confval:: default_language

   Language to be used in AgenDAV interface.

   Have a look at directory ``web/lang`` for a list of available languages.

   Note that the value given to this setting will be used as application
   locale with ``setlocale()``.

   .. versionadded:: 1.2

.. confval:: default_time_format

   Preferred time format: 12 hours (e.g. 3pm / 2:30am) or 24 hours
   (e.g. 15:00 / 2:30).

   Set this option using a **string** (``'12'`` or ``'24'``).

   .. versionadded:: 1.2

.. confval:: default_date_format

   Preferred date format to be used inside date fields (only in forms).
   Possible values are:

   * ``ymd``: e.g. 2011/10/22
   * ``dmy``: e.g. 22/10/2011
   * ``mdy``: e.g. 10/22/2011

   .. versionadded:: 1.2

.. confval:: format_full_date

   Human readable format for dates, using ``strftime`` syntax
   (http://php.net/strftime). Some examples:

   * ``%a %e %B %Y``: Mon 5 March 2012
   * ``%a %e de %B de %Y``: Lun 5 de marzo de 2012 (localized using ``es_ES`` as :confval:`default_language`)

   .. versionadded:: 1.2.5

.. confval:: format_column_month

   Sets how the UI calendar should format the column header in month view. 
   Uses `FullCalendar own syntax <http://arshaw.com/fullcalendar/docs/utilities/formatDate/>`_

   .. versionadded:: 1.2.5

.. confval:: format_column_week

   Sets how the UI calendar should format the column header in week view. 
   Uses `FullCalendar own syntax <http://arshaw.com/fullcalendar/docs/utilities/formatDate/>`_

   .. versionadded:: 1.2.5

.. confval:: format_column_day

   Sets how the UI calendar should format the column header in day view. 
   Uses `FullCalendar own syntax <http://arshaw.com/fullcalendar/docs/utilities/formatDate/>`_

   .. versionadded:: 1.2.5

.. confval:: format_column_table

   Sets how the UI calendar should format the column header in table (called *agenda*) view.  Uses `FullCalendar own syntax <http://arshaw.com/fullcalendar/docs/utilities/formatDate/>`_

   .. versionadded:: 1.2.5

.. confval:: format_title_month

   Sets how the UI calendar should format the title in month view. 
   Uses `FullCalendar own syntax <http://arshaw.com/fullcalendar/docs/utilities/formatDate/>`_

   .. versionadded:: 1.2.5

.. confval:: format_title_week

   Sets how the UI calendar should format the title in week view. 
   Uses `FullCalendar own syntax <http://arshaw.com/fullcalendar/docs/utilities/formatDate/>`_

   .. versionadded:: 1.2.5

.. confval:: format_title_day

   Sets how the UI calendar should format the title in day view. 
   Uses `FullCalendar own syntax <http://arshaw.com/fullcalendar/docs/utilities/formatDate/>`_

   .. versionadded:: 1.2.5

.. confval:: format_title_table

   Sets how the UI calendar should format the title header in table (called *agenda*) view.  Uses `FullCalendar own syntax <http://arshaw.com/fullcalendar/docs/utilities/formatDate/>`_

   .. versionadded:: 1.2.5

.. confval:: default_first_day
   
   Which day should be considered the first of the week. Starting with 0
   (Sunday), 1 means Monday and so on.

   Use a numerical value, not an integer.

   .. versionadded:: 1.2

.. confval:: default_timezone

   Timezone to be used internally. Will be used for recalculating other
   timezone dates and hours to be sent to the browser, ignoring browser
   configured timezone.

   Make sure you use a valid timezone from http://php.net/timezones

   .. versionadded:: 1.2

.. confval:: default_calendar_color

   .. deprecated:: 1.2.3

   Default background and foreground colors for calendars. Has to be
   specified as an associative array. Example::

    // Default background color: #B5C7EB
    // Default foreground (text) color: #000000
    $config['default_calendar_color'] = array('B5C7EB' => '000000');

.. confval:: additional_calendar_colors

   .. deprecated:: 1.2.3

   List of selectable background and foreground color combinations. Specify
   them as an associative array. Example::

        // background color => foreground color
        $config['additional_calendar_colors'] = array(
                'FAC5C0' => '000000',
                'B7E3C0' => '000000',
                'CAB2FC' => '000000',
                'F8F087' => '000000',
                'E6D5C1' => '000000',
                'FFC48C' => '000000',
                'DAF5FF' => '000000',
                'C4C4BC' => '000000',
        );

.. confval:: calendar_colors

   List of selectable background colors. Foreground color will be 
   automatically calculated depending on the darkness of the color. Specify
   them as an array. Example::

        $config['calendar_colors'] = array(
		'9CC4E4',
		'3A89C9',
		'107FC9',
		'FAC5C0',
		'FF4E50',
		'BD3737',
		'C9DF8A',
		'77AB59',
		'36802D',
		'F8F087',
		'E6D5C1',
		'3E4147',
        );


Database configuration (database.php)
-------------------------------------

``database.php`` contains how to connect to your MySQL database. Just follow
inline comments, it's pretty straight forward.

CalDAV specific options (caldav.php)
------------------------------------

Here you will configure every single aspect of your CalDAV server.

.. confval:: caldav_url

   .. deprecated:: 1.2.4

   .. seealso:: :confval:`caldav_principal_url` :confval:`caldav_calendar_url`

.. confval:: caldav_http_auth_method

   You can specify which HTTP authentication method does your CalDAV server
   require. Use any of the cURL ``CURLOPT_HTTPAUTH`` valid values (see
   http://www.php.net/manual/en/function.curl-setopt.php), or leave it empty
   to make AgenDAV auto-detect which authentication method to use.

   Using the auto-detect feature will slow down requests when using Basic
   auth. If you know which authentication method does your server use you're
   advised to set the right value on this option.

   Example::
   
    // Automatic guess
    $config['caldav_http_auth_method'] = null;

    // SabreDAV
    $config['caldav_http_auth_method'] = CURLAUTH_DIGEST;

    // DAViCal
    $config['caldav_http_auth_method'] = CURLAUTH_BASIC;

   .. versionadded:: 1.2.5


.. confval:: caldav_principal_url

   Used by AgenDAV to generate a principal URL for your CalDAV server. The
   placeholder ``%u`` will be replaced by an username.

   Needs a trailing slash.

   Example::

    // Example 1: DAViCal
    $config['caldav_principal_url'] = 'http://10.0.0.12/caldav.php/%u/';

    // Example 2: SabreDAV
    $config['caldav_principal_url'] = 'http://10.0.0.12/calendarserver.php/principals/%u/';

    // Example 3: Calendar server
    $config['caldav_principal_url'] = 'http://10.0.0.12/calendars/users/%u/';

   Principal URL for user ``my_user`` for example 2 will be:

    http://10.0.12/calendarserver.php/principals/my_user/

   .. seealso:: :confval:`caldav_calendar_url`

.. confval:: caldav_calendar_url

   Used by AgenDAV to generate a calendar collection URL or resource URL for
   your CalDAV server. The placeholder ``%s`` will be replaced by AgenDAV
   with required values.

   Example::

    // DAViCal
    $config['caldav_calendar_url'] = 'http://10.0.0.12/caldav.php/%s/';
   
   Resource with UID=aaa0001 on calendar 'work' for user3 will become:

    http://10.0.12/caldav.php/user3/work/aaa0001/

   Calendar 'test' for user1 will become:

    http://10.0.12/caldav.php/user3/test/

   .. seealso:: :confval:`caldav_principal_url`

.. confval:: public_caldav_url

   The URL that will be shown to users if :confval:`show_public_caldav_url` is
   enabled. It's not used for internal connections. Placeholder ``%s`` will
   be replaced by current username and calendar.
   
   Needs a trailing slash.

   Example::

    $config['public_caldav_url'] = 'https://public.caldav.tld/caldav.php/%s/';

   Will become for user ``user2`` and calendar ``myhomecalendar``:

    https://public.caldav.tld/caldav.php/user2/myhomecalendar/

.. confval:: enable_calendar_sharing

   Enables an option to share calendars between users.
   
   Note that calendar sharing requires full WebDAV ACL support on your
   CalDAV server. Some servers, such as SabreDAV (at least on current
   release, 1.5.6), don't support them, so you should set this option
   to FALSE if your server can't handle ACLs.

.. confval:: owner_permissions

   List of DAV permissions used for the calendar owner when sharing a
   calendar. As DAV ACLs are used, when editing a calendar sharing options a
   full ACL has to be built with the following structure:

   * Permissions given to the owner (this option)
   * Permissions given to users with read-only profile (:confval:`read_profile_permissions`)
   * Permissions given to users with read and write profile (:confval:`read_write_profile_permissions`)
   * Permissions given to the rest of users (:confval:`default_permissions`)

   Please, refer to your CalDAV server documentation to know which
   permissions does it support.

   For DAViCal you can follow `Permissions page on DAViCal wiki
   <http://wiki.davical.org/w/Permissions>`_. Default values of this option
   will work all right for DAViCal.

.. confval:: share_permissions

   .. deprecated:: 1.2.5

   .. seealso:: See :confval:`read_profile_permissions` and
      :confval:`read_write_profile_permissions`

.. confval:: read_profile_permissions

   List of DAV permissions used for users given read-only permission on a
   calendar.

   .. versionadded:: 1.2.5

.. confval:: read_write_profile_permissions

   List of DAV permissions used for users given read and write permission on
   a calendar.

   .. versionadded:: 1.2.5

.. confval:: default_permissions

   List of DAV permissions used for users which are not owner neither
   granted users when some user shares a calendar with other ones.

   Please, refer to your CalDAV server documentation to know which
   permissions does it support.

   Default value lets users just to make free/busy queries in DAViCal.

Other configuration files
-------------------------

Advanced options (advanced.php)
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

This file should be kept untouched unless you know what you are trying to
modify. It contains several options that make AgenDAV work by default.
