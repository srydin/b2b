<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title();?></title>
    <meta property="og:locale" content="en_US" />
    <style>
        html {font-size:16px;}
        body {
            margin:0;
            padding:0;
            color:#232323;
            zoom:1;
            font-family:Helvetica Neue,Helvetica,Arial,sans-serif;
            font-size: calc(18px + (14 - 15) * ((100vw - 320px) / (1600 - 320)));
            line-height: calc(1.414em + (1.414 - 1.212) * ((100vw - 320px) / (1600 - 320)));
            -webkit-font-smoothing: antialiased;
            white-space: normal;
            -webkit-font-kerning: normal;
            font-kerning: normal;
        }
        .white-bg {background:white}
        .white {color:white;}
        .green {color:#78DC84}
        .green-bg {background:#78DC84}
        .blue {color:#21218B; border-color:#21218B;}
        .dark-blue {color:#1F1F37; border-color:#1F1F37;}
        .dark-blue-bg {background:#1F1F37}
        .lt-blue {color:#F7F7FB}
        .lt-blue-bg {background:#F7F7FB}

        a {text-decoration:none;width:max-content}

        .shadow-3x {box-shadow: 0 0.707em 1.999em -1.676em rgba(0,0,0,0.25);}
        .shadow-2x {box-shadow: 0 0.5em 1.414em -1em rgba(0,0,0,0.19);}
        .shadow-1x {box-shadow: 0 0.25em 1.212em -0.5em rgba(0,0,0,0.25);}
        .text-center {text-align:center; margin:0 auto;}
        .lg-text-wrapper {display:block; max-width:1170px; margin:0 auto;}
        .md-text-wrapper {display:block; max-width:960px; margin:0 auto;}
        .sm-text-wrapper {display:block; max-width:767px; margin:0 auto;}
        .xs-text-wrapper {display:block; max-width:480px; margin:0 auto;}
        .inline {display:inline-block}
        .block {display:block;}
        .underline {border-bottom:2px solid;}
        h1, h2, h3, h4, h5, h6, p {
            margin: 0;
            padding: 0;
            font-size:1em;
            line-height: calc(1.414em + (1.414 - 1.212) * ((100vw - 320px) / (1600 - 320)));
        }
        .text-5 {font-size: 3.998em;}
        .text-4 {font-size: 2.827em;}
        .text-3 {font-size: 1.999em;}
        .text-2 {font-size:1.414em;}
        .text-1 {font-size:1em;}
        .sm-text-1 {font-size:0.868em}
        .w-100 {font-weight:100;}
        .w-200 {font-weight:200;}
        .w-300 {font-weight:300;}
        .w-400 {font-weight:400;}
        .w-500 {font-weight:500;}
        .w-600 {font-weight:600;}
        .w-700 {font-weight:700;}
        .w-800 {font-weight:800;}
        .w-900 {font-weight:900;}
        .sm-pad-4 {padding:0.25em;}
        .sm-pad-3 {padding:0.354em;}
        .sm-pad-2 {padding:0.5em;}
        .sm-pad-1 {padding:0.707em}
        .pad-1 {padding:1em}
        .pad-2 {padding:1.414em}
        .pad-3 {padding:1.999em}
        .pad-4 {padding:2.827em}
        .pad-5 {padding:3.998em}
        .v-pad-0 {padding-top:0;padding-bottom:0}
        .h-pad-0 {padding-left:0;padding-right:0}
        .divided {border-bottom:1px solid #F1F1F1}
        .cool-btn {
            background: #5CE36C;
            border-radius: 5.656em 3.999em 3.999em 0;
            border: 0px;
            padding: 1.714em;
            max-height: 2.827em;
            line-height: 0;
        }
        header {
            display: block;
            display: flex;
            position: fixed;
            position: sticky;
            position: -webkit-sticky;
            z-index: 9999999;
            top: 0;
            left: 0;
            width: 100%;
            height: 3.999em;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            align-self: center;
            box-sizing: border-box;
        }
        header nav ul, footer nav ul {
            display: inline-block;
            display: inline-flex;
            list-style: none;
            margin: 0;
            padding: 0;
            align-content: center;
            align-self: center;
            align-items: center;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }
        header nav ul li, footer nav ul li {
            padding-right: 1em;
        }
        header nav ul li a {}
        header nav button {
            border:2px solid;
            border-radius:2px;
        }
        #top-banner {
            background-size: cover;
            display: block;
            display: flex;
            justify-content: center;
            align-content: center;
            align-items: center;
            align-self: center;
            flex-direction:column;
            height: 60vh;
            box-sizing: border-box;
            position: relative;
            z-index:0;
            padding-bottom: 3.999em;
            overflow: hidden;
        }
        #top-banner img {
            object-fit: cover;
            object-position: top center;
            z-index: -1;
            width: 110%;
            height: 110%;
            position: absolute;
            top: -5%;
            left: -5%;
            filter: blur(5px);
            opacity: 0.8;
            overflow: hidden;
        }
        #top-banner input[type=text] {
            box-sizing: border-box;
            width: 31.95em;
            background: rgba(0,0,0,0.40);
            border: 2px solid #FFFFFF;
            border-radius: 1.999em;
        }
        #top-banner button {margin-left: -10.41em;}
        #quick-links {
            position: relative;
            z-index:1;
            margin: -3.999em auto 0;
            display: table;
            display: flex;
            justify-content: center;
        }
        #quick-links div:first-child {
            margin-left: 0;
        }
        #quick-links div {
            text-decoration: none;
            transition: all .5s;
            border-radius: 4px;
            background: #FFF;
            box-sizing: border-box;
            margin: 0 .707vw;
            float: left;
            width: 32vw;
            min-width: 160px;
            max-width: 375px;
            height: 5.653em;
            display: table;
            vertical-align: middle;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            align-content: center;
            border-left:0.177em solid #78DC84;
        }
        .article-module {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }
        .article-module .blurb, .article-module .photo {flex-basis:50%;}
        .article-module .photo img {object-fit:cover;height:100%;width:100%;}
        .cta-module{z-index:3;position: relative;}
        .cta-module input[type=email] {
            box-sizing: border-box;
            border: 1px solid #E7E7EB;
            border-radius:2px;
            margin-right:0.5em;
        }
        .cta-module button {background:#79DD85; border-radius:2px; border-color:#79DD85; box-sizing:border-box;}
    </style>
</head>
<body <?php body_class(); ?> >
<header class="shadow-1x pad-1 v-pad-0 white-bg">
    <svg id="header-logo" width="150px" height="36px">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <path d="M0,0 L49,0 C52.8659932,-7.10171439e-16 56,3.13400675 56,7 L56,36 L7,36 C3.13400675,36 4.73447626e-16,32.8659932 0,29 L0,0 Z" id="Rectangle" fill="#49C958"></path>
            <g transform="translate(6.587000, 8.658000)" fill-rule="nonzero">
                <path d="M7.429,17.342 L0,17.342 L0,0.322 L7.153,0.322 C9.982,0.322 13.34,0.759 13.34,4.508 C13.34,6.969 11.822,8.073 10.12,8.395 L10.12,8.441 C12.19,8.809 13.754,9.798 13.754,12.627 C13.754,16.33 10.304,17.342 7.429,17.342 Z M4.508,3.841 L4.508,7.107 L6.693,7.107 C8.349,7.107 8.97,6.463 8.97,5.474 C8.97,4.462 8.349,3.841 6.739,3.841 L4.508,3.841 Z M4.508,10.281 L4.508,13.892 L6.808,13.892 C8.533,13.892 9.269,13.225 9.269,12.052 C9.269,10.879 8.51,10.281 6.762,10.281 L4.508,10.281 Z M28.589,17.342 L15.456,17.342 L15.456,16.974 C15.456,14.513 15.801,12.075 20.286,9.2 C22.977,7.475 24.012,7.038 24.012,5.382 C24.012,4.393 23.368,3.818 22.287,3.818 C21.16,3.818 19.734,4.669 18.745,6.049 L15.548,3.703 C17.135,1.518 19.182,-7.10542736e-15 22.425,-7.10542736e-15 C26.289,-7.10542736e-15 28.474,1.932 28.474,5.06 C28.474,6.785 28.221,8.464 24.955,10.534 C22.747,11.937 21.068,13.018 20.976,13.8 L28.589,13.8 L28.589,17.342 Z M38.456,17.342 L31.027,17.342 L31.027,0.322 L38.18,0.322 C41.009,0.322 44.367,0.759 44.367,4.508 C44.367,6.969 42.849,8.073 41.147,8.395 L41.147,8.441 C43.217,8.809 44.781,9.798 44.781,12.627 C44.781,16.33 41.331,17.342 38.456,17.342 Z M35.535,3.841 L35.535,7.107 L37.72,7.107 C39.376,7.107 39.997,6.463 39.997,5.474 C39.997,4.462 39.376,3.841 37.766,3.841 L35.535,3.841 Z M35.535,10.281 L35.535,13.892 L37.835,13.892 C39.56,13.892 40.296,13.225 40.296,12.052 C40.296,10.879 39.537,10.281 37.789,10.281 L35.535,10.281 Z" id="B2B" fill="#FFFFFF"></path>
                <path d="M57.293,3.381 L57.293,8.027 L59.846,8.027 C62.008,8.027 63.043,7.406 63.043,5.681 C63.043,4.002 62.008,3.381 59.846,3.381 L57.293,3.381 Z M57.293,17.342 L53.613,17.342 L53.613,0.322 L60.007,0.322 C64.193,0.322 66.7,1.817 66.7,5.589 C66.7,8.28 65.435,9.752 63.158,10.442 L66.953,17.342 L62.997,17.342 L59.455,10.925 L57.293,10.925 L57.293,17.342 Z M75.072,17.595 C71.875,17.595 68.816,15.962 68.816,11.224 C68.816,6.463 72.45,4.83 74.98,4.83 C77.51,4.83 80.615,6.095 80.615,11.661 L80.615,12.213 L72.496,12.213 C72.68,14.237 73.807,15.019 75.348,15.019 C76.797,15.019 78.154,14.306 78.982,13.547 L80.408,15.755 C78.982,16.974 77.211,17.595 75.072,17.595 Z M72.542,10.028 L77.303,10.028 C77.119,8.303 76.337,7.475 74.957,7.475 C73.807,7.475 72.818,8.234 72.542,10.028 Z M89.424,17.365 L85.698,17.365 L81.305,5.083 L85.123,5.083 L87.699,13.248 L87.745,13.248 L90.321,5.083 L93.794,5.083 L89.424,17.365 Z M99.015,3.404 L95.289,3.404 L95.289,0.437 L99.015,0.437 L99.015,3.404 Z M98.992,17.342 L95.312,17.342 L95.312,5.083 L98.992,5.083 L98.992,17.342 Z M107.525,17.595 C104.328,17.595 101.269,15.962 101.269,11.224 C101.269,6.463 104.903,4.83 107.433,4.83 C109.963,4.83 113.068,6.095 113.068,11.661 L113.068,12.213 L104.949,12.213 C105.133,14.237 106.26,15.019 107.801,15.019 C109.25,15.019 110.607,14.306 111.435,13.547 L112.861,15.755 C111.435,16.974 109.664,17.595 107.525,17.595 Z M104.995,10.028 L109.756,10.028 C109.572,8.303 108.79,7.475 107.41,7.475 C106.26,7.475 105.271,8.234 104.995,10.028 Z M120.842,17.342 L117.438,17.342 L113.85,5.083 L117.576,5.083 L118.634,9.476 C118.956,10.764 119.163,11.638 119.439,13.225 L119.485,13.225 C119.784,11.615 119.991,10.718 120.336,9.384 L121.394,5.083 L124.269,5.083 L125.396,9.453 C125.764,10.741 125.948,11.638 126.27,13.225 L126.316,13.225 C126.615,11.661 126.822,10.764 127.167,9.499 L128.294,5.083 L131.583,5.083 L127.995,17.342 L124.568,17.342 L122.728,9.867 L122.682,9.867 L120.842,17.342 Z M137.862,17.595 C135.171,17.595 133.377,16.767 132.135,15.709 L133.607,13.639 C134.711,14.605 136.367,15.226 137.862,15.226 C139.012,15.226 139.817,14.835 139.817,14.03 C139.817,13.179 139.173,12.857 137.494,12.558 C135.171,12.144 132.687,11.592 132.687,8.717 C132.687,6.256 134.711,4.83 137.448,4.83 C139.955,4.83 141.473,5.474 142.83,6.555 L141.381,8.648 C140.139,7.797 138.92,7.314 137.77,7.314 C136.712,7.314 136.114,7.728 136.114,8.395 C136.114,9.131 136.781,9.43 138.299,9.706 C140.714,10.12 143.267,10.672 143.267,13.455 C143.267,16.422 140.691,17.595 137.862,17.595 Z" id="Reviews" fill="#232323"></path>
            </g>
        </g>
    </svg>
    <nav>
        <ul>
            <li><a class="w-500 dark-blue" href="">About Us</a></li>
            <li><a class="w-500 dark-blue" href="">Knowledge Center</a></li>
            <li><a class="w-500 dark-blue" href="">Contact</a></li>
        </ul>
        <button id="header-join" class="sm-pad-2 blue text-1 w-600">
            <span class="pad-1 v-pad-0">Join Us</span>
        </button>
    </nav>
</header>