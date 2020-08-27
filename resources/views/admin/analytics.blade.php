@extends('admin.layout.master')
@section('content')
<?php 
// flags
$countries = array(
  'AF' => 'Afghanistan',
  'AX' => '&Aring;land Islands',
  'AL' => 'Albania',
  'DZ' => 'Algeria',
  'AS' => 'American Samoa',
  'AD' => 'Andorra',
  'AO' => 'Angola',
  'AI' => 'Anguilla',
  'AG' => 'Antigua and Barbuda',
  'AR' => 'Argentina',
  'AM' => 'Armenia',
  'AW' => 'Aruba',
  'AU' => 'Australia',
  'AT' => 'Austria',
  'AZ' => 'Azerbaijan',
  'BS' => 'Bahamas ',
  'BH' => 'Bahrain',
  'BD' => 'Bangladesh',
  'BB' => 'Barbados',
  'BY' => 'Belarus',
  'BE' => 'Belgium',
  'BZ' => 'Belize',
  'BJ' => 'Benin',
  'BM' => 'Bermuda',
  'BT' => 'Bhutan',
  'BO' => 'Bolivia (Plurinational State of)',
  'BA' => 'Bosnia and Herzegovina',
  'BW' => 'Botswana',
  'BV' => 'Bouvet Island',
  'BR' => 'Brazil',
  'IO' => 'British Indian Ocean Territory ',
  'BN' => 'Brunei Darussalam',
  'BG' => 'Bulgaria',
  'BF' => 'Burkina Faso',
  'BI' => 'Burundi',
  'KH' => 'Cambodia',
  'CV' => 'Cabo Verde',
  'CM' => 'Cameroon',
  'CA' => 'Canada',
  'CT' => 'Catalonia',
  'KY' => 'Cayman Islands ',
  'CF' => 'Central African Republic ',
  'TD' => 'Chad',
  'CL' => 'Chile',
  'CN' => 'China',
  'CX' => 'Christmas Island',
  'CC' => 'Cocos (Keeling) Islands ',
  'CO' => 'Colombia',
  'KM' => 'Comoros',
  'CD' => 'Congo (the Democratic Republic of the)',
  'CG' => 'Congo ',
  'CK' => 'Cook Islands ',
  'CR' => 'Costa Rica',
  'CI' => 'C&ocirc;te d\'Ivoire',
  'HR' => 'Croatia',
  'CU' => 'Cuba',
  'CY' => 'Cyprus',
  'CZ' => 'Czech Republic ',
  'DK' => 'Denmark',
  'DJ' => 'Djibouti',
  'DM' => 'Dominica',
  'DO' => 'Dominican Republic ',
  'EC' => 'Ecuador',
  'EG' => 'Egypt',
  'SV' => 'El Salvador',
  'EN' => 'England',
  'GQ' => 'Equatorial Guinea',
  'ER' => 'Eritrea',
  'EE' => 'Estonia',
  'ET' => 'Ethiopia',
  'EU' => 'European Union',
  'FK' => 'Falkland Islands  [Malvinas]',
  'FO' => 'Faroe Islands ',
  'FJ' => 'Fiji',
  'FI' => 'Finland',
  'FR' => 'France',
  'GF' => 'French Guiana',
  'PF' => 'French Polynesia',
  'TF' => 'French Southern Territories ',
  'GA' => 'Gabon',
  'GM' => 'Gambia ',
  'GE' => 'Georgia',
  'DE' => 'Germany',
  'GH' => 'Ghana',
  'GI' => 'Gibraltar',
  'GR' => 'Greece',
  'GL' => 'Greenland',
  'GD' => 'Grenada',
  'GP' => 'Guadeloupe',
  'GU' => 'Guam',
  'GT' => 'Guatemala',
  'GN' => 'Guinea',
  'GW' => 'Guinea-Bissau',
  'GY' => 'Guyana',
  'HT' => 'Haiti',
  'HM' => 'Heard Island and McDonald Islands',
  'VA' => 'Holy See ',
  'HN' => 'Honduras',
  'HK' => 'Hong Kong',
  'HU' => 'Hungary',
  'IS' => 'Iceland',
  'IN' => 'India',
  'ID' => 'Indonesia',
  'IR' => 'Iran (Islamic Republic of)',
  'IQ' => 'Iraq',
  'IE' => 'Ireland',
  'IL' => 'Israel',
  'IT' => 'Italy',
  'JM' => 'Jamaica',
  'JP' => 'Japan',
  'JO' => 'Jordan',
  'KZ' => 'Kazakhstan',
  'KE' => 'Kenya',
  'KI' => 'Kiribati',
  'KP' => 'Korea (the Democratic People\'s Republic of)',
  'KR' => 'Korea (the Republic of)',
  'KW' => 'Kuwait',
  'KG' => 'Kyrgyzstan',
  'LA' => 'Lao People\'s Democratic Republic ',
  'LV' => 'Latvia',
  'LB' => 'Lebanon',
  'LS' => 'Lesotho',
  'LR' => 'Liberia',
  'LY' => 'Libya',
  'LI' => 'Liechtenstein',
  'LT' => 'Lithuania',
  'LU' => 'Luxembourg',
  'MO' => 'Macao',
  'MK' => 'Macedonia (the former Yugoslav Republic of)',
  'MG' => 'Madagascar',
  'MW' => 'Malawi',
  'MY' => 'Malaysia',
  'MV' => 'Maldives',
  'ML' => 'Mali',
  'MT' => 'Malta',
  'MH' => 'Marshall Islands ',
  'MQ' => 'Martinique',
  'MR' => 'Mauritania',
  'MU' => 'Mauritius',
  'YT' => 'Mayotte',
  'MX' => 'Mexico',
  'FM' => 'Micronesia (Federated States of)',
  'MD' => 'Moldova (the Republic of)',
  'MC' => 'Monaco',
  'MN' => 'Mongolia',
  'ME' => 'Montenegro',
  'MS' => 'Montserrat',
  'MA' => 'Morocco',
  'MZ' => 'Mozambique',
  'MM' => 'Myanmar',
  'NA' => 'Namibia',
  'NR' => 'Nauru',
  'NP' => 'Nepal',
  'NL' => 'Netherlands',
  'AN' => 'Netherlands',
  'NC' => 'New Caledonia',
  'NZ' => 'New Zealand',
  'NI' => 'Nicaragua',
  'NE' => 'Niger ',
  'NG' => 'Nigeria',
  'NU' => 'Niue',
  'NF' => 'Norfolk Island',
  'MP' => 'Northern Mariana Islands ',
  'NO' => 'Norway',
  'OM' => 'Oman',
  'PK' => 'Pakistan',
  'PW' => 'Palau',
  'PS' => 'Palestine, State of',
  'PA' => 'Panama',
  'PG' => 'Papua New Guinea',
  'PY' => 'Paraguay',
  'PE' => 'Peru',
  'PH' => 'Philippines ',
  'PN' => 'Pitcairn',
  'PL' => 'Poland',
  'PT' => 'Portugal',
  'PR' => 'Puerto Rico',
  'QA' => 'Qatar',
  'RE' => 'R&eacute;union',
  'RO' => 'Romania',
  'RU' => 'Russian Federation ',
  'RW' => 'Rwanda',
  'SH' => 'Saint Helena, Ascension and Tristan da Cunha',
  'KN' => 'Saint Kitts and Nevis',
  'LC' => 'Saint Lucia',
  'PM' => 'Saint Pierre and Miquelon',
  'VC' => 'Saint Vincent and the Grenadines',
  'WS' => 'Samoa',
  'SM' => 'San Marino',
  'ST' => 'Sao Tome and Principe',
  'SA' => 'Saudi Arabia',
  'AB' => 'Scotland',
  'SN' => 'Senegal',
  'RS' => 'Serbia',
  'CS' => 'Serbia and Montenegro',
  'SC' => 'Seychelles',
  'SL' => 'Sierra Leone',
  'SG' => 'Singapore',
  'SK' => 'Slovakia',
  'SI' => 'Slovenia',
  'SB' => 'Solomon Islands',
  'SO' => 'Somalia',
  'ZA' => 'South Africa',
  'GS' => 'South Georgia and the South Sandwich Islands',
  'ES' => 'Spain',
  'LK' => 'Sri Lanka',
  'SD' => 'Sudan',
  'SR' => 'Suriname',
  'SJ' => 'Svalbard and Jan Mayen',
  'SZ' => 'Swaziland',
  'SE' => 'Sweden',
  'CH' => 'Switzerland',
  'SY' => 'Syrian Arab Republic',
  'TW' => 'Taiwan',
  'TJ' => 'Tajikistan',
  'TZ' => 'Tanzania, United Republic of',
  'TH' => 'Thailand',
  'TL' => 'Timor-Leste',
  'TG' => 'Togo',
  'TK' => 'Tokelau',
  'TO' => 'Tonga',
  'TT' => 'Trinidad and Tobago',
  'TN' => 'Tunisia',
  'TR' => 'Turkey',
  'TM' => 'Turkmenistan',
  'TC' => 'Turks and Caicos Islands ',
  'TV' => 'Tuvalu',
  'UG' => 'Uganda',
  'UA' => 'Ukraine',
  'AE' => 'United Arab Emirates ',
  'GB' => 'United Kingdom of Great Britain and Northern Ireland ',
  'UM' => 'United States Minor Outlying Islands ',
  'US' => 'United States',
  'UY' => 'Uruguay',
  'UZ' => 'Uzbekistan',
  'VU' => 'Vanuatu',
  'VE' => 'Venezuela ',
  'VN' => 'Viet Nam',
  'VG' => 'Virgin Islands ',
  'VI' => 'Virgin Islands ',
  'WA' => 'Wales',
  'WF' => 'Wallis and Futuna',
  'EH' => 'Western Sahara',
  'YE' => 'Yemen',
  'ZM' => 'Zambia',
  'ZW' => 'Zimbabwe'
);

?>
{{-- carding block --}}
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card">
        <div class="card-block">
        <div class="row align-items-center">
        <div class="col-8">
        <h4 class="text-c-yellow f-w-600">{{ $todayvisitor }}</h4>
        <h6 class="text-muted m-b-0">Today Visitor</h6>
         </div>
        <div class="col-4 text-right">
        <i class="fa fa-eye f-28"></i>
        </div>
        </div>
        </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card">
        <div class="card-block">
        <div class="row align-items-center">
        <div class="col-8">
        <h4 class="text-c-green f-w-600">{{ $totalvisitor }}</h4>
        <h6 class="text-muted m-b-0">Total Visitor</h6>
        </div>
        <div class="col-4 text-right">
        <i class="fa fa-bullseye f-28"></i>
        </div>
        </div>
        </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card">
        <div class="card-block">
        <div class="row align-items-center">
        <div class="col-8">
        <h4 class="text-c-pink f-w-600">{{ $totalmobilevisitor }}</h4>
        <h6 class="text-muted m-b-0">Mobile visitor</h6>
         </div>
        <div class="col-4 text-right">
        <i class="fa fa-mobile f-28"></i>
        </div>
        </div>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
        <div class="card-block">
        <div class="row align-items-center">
        <div class="col-8">
        <h4 class="text-c-blue f-w-600">{{ $totaldesktopvisitor }}</h4>
        <h6 class="text-muted m-b-0">Desktop Visitor</h6>
        </div>
        <div class="col-4 text-right">
        <i class="fa fa-desktop f-28"></i>
        </div>
        </div>
        </div>
        </div>
    </div>
</div>
{{-- ./carding block --}}

{{-- page body --}}
<div class="page-body">
    <div class="row">
        <div class="row col-sm-8">
            @if(request()->is('admin/dashboard*')) 
            <div class="row col-sm-12">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Current Login details</h5>
                        </div>
                        <div class="card-block">
                            <p class="text-c-green f-w-500">
                                <div class="row">
                                    <div class="col-6 b-r-default">
                                    <p class="text-muted m-b-5">Ip</p>
                                    <h6>{{ $login[0]->ip }}</h6>
                                    </div>
                                    <div class="col-6 ">
                                    <p class="text-muted m-b-5">Date</p>
                                    <h6>{{ $login[0]->date }}</h6>
                                    </div>
                                    <div class="col-6 b-t-default b-r-default">
                                    <p class="text-muted m-b-5">Time</p>
                                    <h6>{{ $login[0]->time }}</h6>
                                    </div>
                                    <div class="col-6 b-t-default">
                                        <p class="text-muted m-b-5">Location</p>
                                        <h6>{{ $login[0]->state }},{{ $login[0]->location }}</h6>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Last Login details</h5>
                        </div>
                        <div class="card-block">
                            <p class="text-c-green f-w-500">
                                <div class="row">
                                    <div class="col-6 b-r-default">
                                    <p class="text-muted m-b-5">Ip</p>
                                    <h6>{{ $login[0]->lastip }}</h6>
                                    </div>
                                    <div class="col-6 ">
                                    <p class="text-muted m-b-5">Date</p>
                                    <h6>{{ $login[0]->lastdate }}</h6>
                                    </div>
                                    <div class="col-6 b-t-default b-r-default">
                                    <p class="text-muted m-b-5">Time</p>
                                    <h6>{{ $login[0]->lasttime }}</h6>
                                    </div>
                                    <div class="col-6 b-t-default">
                                        <p class="text-muted m-b-5">Location</p>
                                        <h6>{{ $login[0]->laststate }},{{ $login[0]->lastlocation }}</h6>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                    <h5>Page Views</h5>
                    <span>Below table you will see the page visitor ip and views</span>
                    </div>
                    <div class="card-block">
                    <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>IP</th>
                    <th>Viewed on</th>
                    <th>Region</th>
                    <th>Country</th>
                    <th>Date</th>
                    <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach($analytics as $an)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $an->ip }}</td>
                            <td class="text-center">@if($an->device == 'Desktop')
                                <i class="fa fa-desktop f-20 " style="color:rgb(10, 194, 130);" ></i>
                                @else
                                <i class="fa fa-mobile f-20" style="color:rgb(10, 194, 130);"></i>
                                 @endif
                                
                                
                            </td>
                            {{-- <td>{{ $an->location }}</td> --}}
                            <td>{{ $an->region }}</td>
                            <td>
                                <img <?php $key = array_search ($an->location, $countries ); ?> src="{{ url('admin-asset/flag/png') }}/{{strtolower($key)}}.png">
                            </td>
                            
                            <td>{{ $an->date }}</td>
                            <td>{{ $an->time }}</td>
                        </tr>
                        <?php $count++; ?>
                        @endforeach
                   
                    
                    </tbody>
                    
                    </table>
                    </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row col-sm-4">
            <div class="col-sm-12">
                <div class="card per-task-card">
                    <div class="card-header">
                    <h5>CV download</h5>
                    </div>
                    <div class="card-block">
                    <div class="row per-task-block text-center">
                    <div class="col-6">
                    <div data-label="45%" class="radial-bar radial-bar-45 radial-bar-lg radial-bar-primary"></div>
                    <h6 class="text-muted">Total Download</h6>
                    <p class="text-muted">{{ $totaldownload }}</p>
                    </div>
                    <div class="col-6">
                    <div data-label="30%" class="radial-bar radial-bar-30 radial-bar-lg radial-bar-primary"></div>
                    <h6 class="text-muted">Today Download</h6>
                    <p class="text-muted">{{ $todaydownload }}</p>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="card per-task-card">
                    <div class="card-header">
                    <h5>Mobile View</h5>
                    </div>
                    <div class="card-block">
                    <div class="row per-task-block text-center">
                    <div class="col-6">
                    <div data-label="45%" class="radial-bar radial-bar-45 radial-bar-lg radial-bar-primary"></div>
                    <h6 class="text-muted">Total view</h6>
                    <p class="text-muted">{{ $totalmobilevisitor }}</p>
                    </div>
                    <div class="col-6">
                    <div data-label="30%" class="radial-bar radial-bar-30 radial-bar-lg radial-bar-primary"></div>
                    <h6 class="text-muted">Today view</h6>
                    <p class="text-muted">{{ $todaymobile }}</p>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="card per-task-card">
                    <div class="card-header">
                    <h5>Desktop View</h5>
                    </div>
                    <div class="card-block">
                    <div class="row per-task-block text-center">
                    <div class="col-6">
                    <div data-label="45%" class="radial-bar radial-bar-45 radial-bar-lg radial-bar-primary"></div>
                    <h6 class="text-muted">Total view</h6>
                    <p class="text-muted">{{ $totaldesktopvisitor }}</p>
                    </div>
                    <div class="col-6">
                    <div data-label="30%" class="radial-bar radial-bar-30 radial-bar-lg radial-bar-primary"></div>
                    <h6 class="text-muted">Today view</h6>
                    <p class="text-muted">{{ $todayDesktop }}</p>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="card">
                    {{-- @foreach($maxviewed as $record)
                       <h1>{{ $record->ip }}</h1>
                       <h1>{{ $record->count }}</h1>
                    @endforeach --}}
                </div>
                <div class="card feed-card">
                    <div class="card-header">
                    <h5>Most viewed IP</h5>
                    </div>
                    <div class="card-block">
                    <div class="row m-b-30">
                        @foreach($maxviewed as $record)
                        <div class="col-md-12">
                        <h6 class="m-b-5">{{ $record->ip }} <span class="text-muted f-right f-13">viewed more than {{ $record->count }} times</span></h6>
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</div>

{{-- ./page body --}}
@endsection