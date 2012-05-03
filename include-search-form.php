<?php
// setup perm urls

// $permurl= $tk_your_url."archive.php?".htmlentities($_SERVER['QUERY_STRING']); 
$permurl= "index.php?".htmlentities($_SERVER['QUERY_STRING']); 
$permrss = "rss-all.php?".htmlentities($_SERVER['QUERY_STRING']);
$permexcel = "excel-all.php?".htmlentities($_SERVER['QUERY_STRING']);
$permtable = "table-all.php?".htmlentities($_SERVER['QUERY_STRING']);
$permjson = "apiGetTweets-all.php?".htmlentities($_SERVER['QUERY_STRING']);

// filter form
$month_num = array(1,2,3,4,5,6,7,8,9,10,11,12);
$month_verbose = array('January','February','March','April','May','June','July','August','September','October','November','December');  
$day = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
$year = array('2009','2010','2011','2012');
$order_values = array('ascending'=>'a','descending'=>'d');
$limit_values = array(10,25,50,250,500,1000,10000,100000,1000000,10000000);
$languageCodes = array(
 "aa" => "Afar",
 "ab" => "Abkhazian",
 "ae" => "Avestan",
 "af" => "Afrikaans",
 "ak" => "Akan",
 "am" => "Amharic",
 "an" => "Aragonese",
 "ar" => "Arabic",
 "as" => "Assamese",
 "av" => "Avaric",
 "ay" => "Aymara",
 "az" => "Azerbaijani",
 "ba" => "Bashkir",
 "be" => "Belarusian",
 "bg" => "Bulgarian",
 "bh" => "Bihari",
 "bi" => "Bislama",
 "bm" => "Bambara",
 "bn" => "Bengali",
 "bo" => "Tibetan",
 "br" => "Breton",
 "bs" => "Bosnian",
 "ca" => "Catalan",
 "ce" => "Chechen",
 "ch" => "Chamorro",
 "co" => "Corsican",
 "cr" => "Cree",
 "cs" => "Czech",
 "cu" => "Church Slavic",
 "cv" => "Chuvash",
 "cy" => "Welsh",
 "da" => "Danish",
 "de" => "German",
 "dv" => "Divehi",
 "dz" => "Dzongkha",
 "ee" => "Ewe",
 "el" => "Greek",
 "en" => "English",
 "eo" => "Esperanto",
 "es" => "Spanish",
 "et" => "Estonian",
 "eu" => "Basque",
 "fa" => "Persian",
 "ff" => "Fulah",
 "fi" => "Finnish",
 "fj" => "Fijian",
 "fo" => "Faroese",
 "fr" => "French",
 "fy" => "Western Frisian",
 "ga" => "Irish",
 "gd" => "Scottish Gaelic",
 "gl" => "Galician",
 "gn" => "Guarani",
 "gu" => "Gujarati",
 "gv" => "Manx",
 "ha" => "Hausa",
 "he" => "Hebrew",
 "hi" => "Hindi",
 "ho" => "Hiri Motu",
 "hr" => "Croatian",
 "ht" => "Haitian",
 "hu" => "Hungarian",
 "hy" => "Armenian",
 "hz" => "Herero",
 "ia" => "Interlingua ",
 "id" => "Indonesian",
 "ie" => "Interlingue",
 "ig" => "Igbo",
 "ii" => "Sichuan Yi",
 "ik" => "Inupiaq",
 "io" => "Ido",
 "is" => "Icelandic",
 "it" => "Italian",
 "iu" => "Inuktitut",
 "ja" => "Japanese",
 "jv" => "Javanese",
 "ka" => "Georgian",
 "kg" => "Kongo",
 "ki" => "Kikuyu",
 "kj" => "Kwanyama",
 "kk" => "Kazakh",
 "kl" => "Kalaallisut",
 "km" => "Khmer",
 "kn" => "Kannada",
 "ko" => "Korean",
 "kr" => "Kanuri",
 "ks" => "Kashmiri",
 "ku" => "Kurdish",
 "kv" => "Komi",
 "kw" => "Cornish",
 "ky" => "Kirghiz",
 "la" => "Latin",
 "lb" => "Luxembourgish",
 "lg" => "Ganda",
 "li" => "Limburgish",
 "ln" => "Lingala",
 "lo" => "Lao",
 "lt" => "Lithuanian",
 "lu" => "Luba-Katanga",
 "lv" => "Latvian",
 "mg" => "Malagasy",
 "mh" => "Marshallese",
 "mi" => "Maori",
 "mk" => "Macedonian",
 "ml" => "Malayalam",
 "mn" => "Mongolian",
 "mr" => "Marathi",
 "ms" => "Malay",
 "mt" => "Maltese",
 "my" => "Burmese",
 "na" => "Nauru",
 "nb" => "Norwegian Bokmal",
 "nd" => "North Ndebele",
 "ne" => "Nepali",
 "ng" => "Ndonga",
 "nl" => "Dutch",
 "nn" => "Norwegian Nynorsk",
 "no" => "Norwegian",
 "nr" => "South Ndebele",
 "nv" => "Navajo",
 "ny" => "Chichewa",
 "oc" => "Occitan",
 "oj" => "Ojibwa",
 "om" => "Oromo",
 "or" => "Oriya",
 "os" => "Ossetian",
 "pa" => "Panjabi",
 "pi" => "Pali",
 "pl" => "Polish",
 "ps" => "Pashto",
 "pt" => "Portuguese",
 "qu" => "Quechua",
 "rm" => "Raeto-Romance",
 "rn" => "Kirundi",
 "ro" => "Romanian",
 "ru" => "Russian",
 "rw" => "Kinyarwanda",
 "sa" => "Sanskrit",
 "sc" => "Sardinian",
 "sd" => "Sindhi",
 "se" => "Northern Sami",
 "sg" => "Sango",
 "si" => "Sinhala",
 "sk" => "Slovak",
 "sl" => "Slovenian",
 "sm" => "Samoan",
 "sn" => "Shona",
 "so" => "Somali",
 "sq" => "Albanian",
 "sr" => "Serbian",
 "ss" => "Swati",
 "st" => "Southern Sotho",
 "su" => "Sundanese",
 "sv" => "Swedish",
 "sw" => "Swahili",
 "ta" => "Tamil",
 "te" => "Telugu",
 "tg" => "Tajik",
 "th" => "Thai",
 "ti" => "Tigrinya",
 "tk" => "Turkmen",
 "tl" => "Tagalog",
 "tn" => "Tswana",
 "to" => "Tonga",
 "tr" => "Turkish",
 "ts" => "Tsonga",
 "tt" => "Tatar",
 "tw" => "Twi",
 "ty" => "Tahitian",
 "ug" => "Uighur",
 "uk" => "Ukrainian",
 "ur" => "Urdu",
 "uz" => "Uzbek",
 "ve" => "Venda",
 "vi" => "Vietnamese",
 "vo" => "Volapuk",
 "wa" => "Walloon",
 "wo" => "Wolof",
 "xh" => "Xhosa",
 "yi" => "Yiddish",
 "yo" => "Yoruba",
 "za" => "Zhuang",
 "zh" => "Chinese",
 "zu" => "Zulu"
);


?>

<div style="border-top:1px solid black; border-bottom:1px solid black; text-align:center; margin-left:auto; margin-right:auto; padding:5px; width:1280px">
<center>
<h2 class="mainH2">Search all archives</h2>
<form method='get' action='index.php'>
<input type='hidden' name='home_search' value='yes'>
<table>
<tr>
<td><b>START DATE</b></td><td></td><td></td><td></td><td><b>END DATE</b></td><td></td><td></td><td><b>ORDER</b></td><td><b>VIEW LIMIT</b></td><td><b>FROM USER</b></td><td><b>TWEET TEXT</b></td><td><b>LANGUAGE</b></td>

<td></td>
</tr>

<tr>
<td>
<SELECT NAME="sm">
<OPTION value=''>
<?php
foreach ($month_num as $value) {
    echo "<OPTION value='$value'";
    if ($value == $_GET['sm']) {echo " SELECTED";}
    echo ">".$month_verbose[$value-1];
}
?>
</SELECT>                                                  
</td>

<td>
<SELECT NAME="sd">
<OPTION value=''>
<?php
foreach ($day as $value) {
    echo "<OPTION";
    if ($value == $_GET['sd']) {echo " SELECTED";}
    echo ">$value";
}
?>

</SELECT>
</td>

<td>                                                                                                                
<SELECT NAME="sy">
<OPTION value=''>
<?php
foreach ($year as $value) {
    echo "<OPTION";
    if ($value == $_GET['sy']) {echo " SELECTED";}
    echo ">$value";
}
?>
</SELECT>
</td>

<td></td>

<td>
<SELECT NAME="em">
<OPTION value=''>
<?php
foreach ($month_num as $value) {
    echo "<OPTION value='$value'";
    if ($value == $_GET['em']) {echo " SELECTED";}
    echo ">".$month_verbose[$value-1];
}
?>
</SELECT>
</td>

<td>
<SELECT NAME="ed">
<OPTION value=''>
<?php
foreach ($day as $value) {
    echo "<OPTION";
    if ($value == $_GET['ed']) {echo " SELECTED";}
    echo ">$value";
}
?>

</SELECT>
</td>

<td>
<SELECT NAME="ey">
<OPTION value=''>
<?php
foreach ($year as $value) {
    echo "<OPTION";
    if ($value == $_GET['ey']) {echo " SELECTED";}
    echo ">$value";
}
?>

</SELECT>
</td>

<td>
<SELECT NAME="o">
<OPTION value=''>
<?php
foreach ($order_values as $key=>$value) {
    echo "<OPTION value='$value'";
    if ($value == $_GET['o']) {echo " SELECTED";}
    echo ">$key";
}
?>
</SELECT>
</td>

<td>
<SELECT NAME="l">
<OPTION value=''>
<?php
foreach ($limit_values as $value) {
    echo "<OPTION value='$value'";
    if ($value == $limit) {echo " SELECTED";}
    echo ">$value";
}
?>
</SELECT>
</td>

<?php
echo "<td>";
echo "<input name='from_user' value ='".$_GET['from_user']."'/>";
echo "</td>";
?>

<td>
<input name='text' value='<?php echo $_GET['text']; ?>'/>
</td>

<td>
<SELECT NAME='lang'>
<OPTION value=''>
<?php
foreach ($languageCodes as $key=>$value) {
    echo "<OPTION value='$key'";
    if ($key == $_GET['lang']) {echo " SELECTED";}
    echo ">$value ($key)";
}
?>
</SELECT>
</td>

<td>
<input type="checkbox" name="nort" value="1"
<?php if ($_GET['nort'] == 1) {echo " checked";}?>
/>remove RTs
</td>

</tr>
</table >
<div style="text-align:center;margin:10px 0 20px 0;">
<input type='submit' value='query' style="text-align:center;" />
</div>
</form><br>
<?php 
          
echo "HTML Permalink = <a href='$permurl'>$permurl</a><br>";
echo "RSS Permalink = <a href='$permrss'>$permrss</a><br>";
echo "Excel Permalink = <a href='$permexcel'>$permexcel</a><br>";
echo "Simple Table Permalink = <a href='$permtable'>$permtable</a><br>";
echo "JSON API = <a href='$permjson'>$permjson</a><br>";
echo "</h5>";
echo "<small>";
echo "You're only downloading the query you're viewing below. Call more data using the form above to query more data.<br>";
echo "</small>";
?>
</div>