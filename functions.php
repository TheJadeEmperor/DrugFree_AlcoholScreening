<?php


if( function_exists('acf_add_options_page') ) {
	
	$parent = acf_add_options_page(array(
		'page_title' => "AS Global &amp; Content",
		'capability' => 'edit_pages',
		'icon_url' => 'dashicons-welcome-widgets-menus',
		'position' => '2'
	));
	
	acf_add_options_sub_page(array(
		'page_title' => "Manage Global Images",
		'capability' => 'edit_pages',
		'parent_slug' => $parent['menu_slug']
	));
	
}


// Remove content editor from post & page types
function remove_editor() {
//	remove_post_type_support( 'post', 'editor' );
    remove_post_type_support( 'page', 'editor' );
}
add_action('init', 'remove_editor');


//standard drink display for Q-2 to Q-6
function standard_drink_display () {
	$image_beer = get_field("image_beer", "option");
	$image_wine = get_field("image_wine", "option");
	$image_spirits = get_field("image_spirits", "option"); 
	$image_malt_liquor = get_field("image_malt_liquor", "option");
	$beer_content = get_field("beer_content", "option");
	$wine_content = get_field("wine_content", "option");
	$spirits_content = get_field("spirits_content", "option"); 
	$q3_to_q6_copy = get_field("q2_to_q6_copy", "option");

	echo '
	<p>&nbsp;</p><p>&nbsp;</p>
	<div class="as_copy medium bold">A Standard Drink Is </div>

	<table class="standard_drink_container">
	<tr>
		<td><img src="'.$image_beer.'" alt="Alcohol Screening" /></td>
		<td><img src="'.$image_wine.'" alt="Alcohol Screening" /></td>
		<td><img src="'.$image_spirits.'" alt="Alcohol Screening" /></td>
	</tr>
	<tr valign="top">
		<td><div class="as_copy small">'.$beer_content.'</div> </td>
		<td><div class="as_copy small">'.$wine_content.'</div> </td>	
		<td><div class="as_copy small">'.$spirits_content.'</div> </td>
	</tr>
	</table>';

}


function show_close_button($url) {

	$image_close_button = get_field("image_close_button", "option");

	return '<a class="close_button" href="'.$url.'"><img src="'.$image_close_button.'" alt="Close Button" /></a>';

}


function display_strategy_menu ($current_page) {
	
	$class_highlight[$current_page] = 'highlight'; 
	
	$image_left_menu = get_field("image_left_menu", "option");

	echo '<div class="strat_menu">
	<div class="as_copy large"><img src="'.$image_left_menu.'" width="40px" alt="Strategies for Reducing Risk" />&nbsp; Strategies for Reducing Risk </div>

	<br />
	<p><a class="'.$class_highlight['strategy-cutback-2'].'" href="/strategy-cutback-2/">Tips for Cutting Back</a></p>
	
	<div class="line"></div>
	
	<p><a class="'.$class_highlight['strategy-online-support'].'" href="/strategy-online-support">Using Online Supports</a>
	</p>
	
	<div class="line"></div>
	
	<p><a class="'.$class_highlight['strategy-use-disorder'].'" href="/strategy-use-disorder/">When Cutting Back Isn’t Working</a></p>
	
	<div class="line"></div>

	<p><a class="'.$class_highlight['strategy-treatment-1'].'" href="/strategy-treatment-1">Finding Treatment</a></p>
	
	<div class="line"></div>
	
	<p><a class="'.$class_highlight['info-drinking-1'].'"href="/info-drinking-1">More Information on Drinking</a></p>

	<p><a class="'.$class_highlight['info-drinking-1'].' sub_item" href="/info-drinking-1">What is Moderated or Healthy Drinking?</a></p>
	
	<p><a class="'.$class_highlight['info-drinking-2'].' sub_item" href="/info-drinking-2">Who should moderate and abstain?</a></p>
	
	<p><a class="'.$class_highlight['info-drinking-3'].' sub_item" href="/info-drinking-3">Potential Consequences of Excessive Drinking</a></p>
	
	<p><a class="'.$class_highlight['info-drinking-4'].' sub_item" href="/info-drinking-4">Drinking Across the Lifespan</a></p>
	
	</div>';
	
	
	//Mobile version of menu
	$class_highlight[$current_page] = 'highlight'; 
	
	$extra_menu = 0;
	switch ($current_page) {
		case 'strategy-cutback-2':
			$current_display = "WHEN CUTTING BACK ISN'T WORKING";
			break;
		case 'strategy-use-disorder':
			$current_display = "ALCOHOL USE DISORDER ";
			break;
		case 'strategy-online-support':
			$current_display = "USING AVAILABE ONLINE SUPPORT ";
			break;
		case 'strategy-treatment-1':
			$current_display = "FINDING A TREATMENT PROGRAM";
			break;	
			
		case 'info-drinking-1':
		case 'info-drinking-2':
		case 'info-drinking-3':
		case 'info-drinking-4':
			$current_display = 'MORE INFORMATION ABOUT DRINKING';
			$extra_menu = 1;
			break;
	}
	
	echo '
	<div class="strat_menu_mobile box_purple">
		<div class="strat_menu_m">'.$current_display.'</div>
		<div class="strat_menu_m"><a href="/strategy-reduce-drinking">View All Strategies</a></div>
	</div>
	';
	
	if($extra_menu == 1) {

		echo '<div class="strat_extra_menu">
		<div class="strat_extra_item '.$class_highlight['info-drinking-1'].'"><a href="/info-drinking-1">What is moderated or healthy drinking? </a></div>
		
		<div class="line"></div>
		
		<div class="strat_extra_item '.$class_highlight['info-drinking-2'].'"><a href="/info-drinking-2">Who should moderate and abstain?</a></div>
		
		<div class="line"></div>
		
		<div class="strat_extra_item '.$class_highlight['info-drinking-3'].'"><a href="/info-drinking-3">Potential consequences of excessive drinking?</a></div>
		
		<div class="line"></div>
		
		<div class="strat_extra_item '.$class_highlight['info-drinking-4'].'"><a href="/info-drinking-4">Drinking across the life span? </a></div> 
		
		</div>';
	}
	
}


function display_progress_bar ($percent) {
	echo '<div class="w3-light-grey w3-round-xlarge progress_bar">
    <div class="w3-container w3-purple w3-round-xlarge" style="width:'.$percent.'%">'.$percent.'%</div>
	</div>';
}


function arrow_left_right_display($previousPage, $nextPage) {
	
	$image_arrow_left = get_field("image_arrow_left", "option");
	$image_arrow_right = get_field("image_arrow_right", "option");
	
	echo '<div class="arrow_div">
	<input onclick="submitScreeningHome(\''.$previousPage.'\')" type="image" src="'.$image_arrow_left.'" formaction="'.$previousPage.'" class="image_arrow_left" id="previousPage" />
	
	<input onclick="submitScreeningHome(\''.$nextPage.'\')" type="image" src="'.$image_arrow_right.'" formaction="'.$nextPage.'" class="image_arrow_right" id="nextPage" />
	
	<div class="clear"></div>
</div>'; 
	
	
}


function view_all_strategies ($nextPage) {

	$image_arrow_right = get_field("image_arrow_right", "option");
	$previousPage = '/strategy-reduce-drinking/';
	
	echo '<div class="all_strategies_div">
	<input class="view_all_strategies" onclick="submitScreeningHome(\''.$previousPage.'\')" type="submit" value="View All Strategies" formaction="'.$previousPage.'" /> 
	
	<input onclick="submitScreeningHome(\''.$nextPage.'\')" type="image" src="'.$image_arrow_right.'" formaction="'.$nextPage.'" class="image_arrow_right" id="rightArrow" />
	
	<div class="clear"> </div>
	</div>';
}

function arrow_left_display ($previousPage) {
	
	$image_arrow_left = get_field("image_arrow_left", "option");
	
	echo '<input onclick="submitScreeningHome(\''.$previousPage.'\')" type="image" src="'.$image_arrow_left.'" formaction="'.$previousPage.'" class="image_arrow_left" id="previousPage" />';
}

function arrow_right_display ($nextPage) {
	
	$image_arrow_right = get_field("image_arrow_right", "option");
	
	echo '<div class="arrow_div">
	<input onclick="submitScreeningHome(\''.$nextPage.'\')" type="image" src="'.$image_arrow_right.'" formaction="'.$nextPage.'" class="image_arrow_right" id="nextPage" />
	
	<div class="clear"> </div>
	</div>';
	
}

function show_ie_popup() {
	
	$ie_popup_content = get_field("ie_popup_content", "option");
	?>
	<script>
window.addEventListener('DOMContentLoaded', function() {
  console.log('window - DOMContentLoaded - capture'); 
    document.getElementById("overlay").style.display = "block";
}, true);

function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}
</script>

<style>
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}

.popup_content {
    font-family: Source Sans Pro,sans-serif;
	color: #333;
}

.popup_content h3 {
	font-family: Source Sans Pro,sans-serif;
	font-size: 26px;
    font-weight: 600;
}

.popup_content p {
    font-size: 22px;
    margin-bottom: 10px;
}

.popup_content a {
	cursor: pointer;
    color: #00acc7;
    font-weight: 600;
}

.popup_content a:hover {
    color: #ff7430;
}

.sgpb-popup-dialog-main-div-theme-wrapper-6 {
	z-index: 999910; 
	position: fixed; left: 400px; top: 118px; animation-timing-function: linear; animation-duration: 1500ms;
}

.sgpb-popup-dialog-main-div {
	width: 1038.8px; 
}

@media only screen and (max-width: 767px) {
	.sgpb-popup-dialog-main-div-theme-wrapper-6 {
		position: fixed;
		left: 83px;
		top: 113px;
		animation-timing-function: linear;
		animation-duration: 1500ms;
	}
}

@media only screen and (max-width: 500px) {
	.sgpb-popup-dialog-main-div-theme-wrapper-6 {
		width: 90%;
		top: 80px;
		left: 5%;
	}
	
	.sgpb-popup-dialog-main-div {
		width: unset !important;
	}
}
</style>


<div id="overlay" onclick="off()">
  <div class="sgpb-popup-dialog-main-div-theme-wrapper-6 sg-animated No effect"><img class="sgpb-popup-close-button-6" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAA6HWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxMzggNzkuMTU5ODI0LCAyMDE2LzA5LzE0LTAxOjA5OjAxICAgICAgICAiPgogICA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogICAgICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgICAgICAgICB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICAgICAgICAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgICAgICAgICAgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgICAgICAgICB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgICAgICAgICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgICAgICAgICAgeG1sbnM6dGlmZj0iaHR0cDovL25zLmFkb2JlLmNvbS90aWZmLzEuMC8iCiAgICAgICAgICAgIHhtbG5zOmV4aWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20vZXhpZi8xLjAvIj4KICAgICAgICAgPHhtcDpDcmVhdGVEYXRlPjIwMTgtMDItMjdUMTQ6MTQ6MzgrMDQ6MDA8L3htcDpDcmVhdGVEYXRlPgogICAgICAgICA8eG1wOk1vZGlmeURhdGU+MjAxOC0wMi0yN1QxNDoxNjoxMSswNDowMDwveG1wOk1vZGlmeURhdGU+CiAgICAgICAgIDx4bXA6TWV0YWRhdGFEYXRlPjIwMTgtMDItMjdUMTQ6MTY6MTErMDQ6MDA8L3htcDpNZXRhZGF0YURhdGU+CiAgICAgICAgIDx4bXA6Q3JlYXRvclRvb2w+QWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpPC94bXA6Q3JlYXRvclRvb2w+CiAgICAgICAgIDxkYzpmb3JtYXQ+aW1hZ2UvcG5nPC9kYzpmb3JtYXQ+CiAgICAgICAgIDxwaG90b3Nob3A6Q29sb3JNb2RlPjM8L3Bob3Rvc2hvcDpDb2xvck1vZGU+CiAgICAgICAgIDx4bXBNTTpJbnN0YW5jZUlEPnhtcC5paWQ6MWNlZWE3YWMtNTIxMC02MjQ2LWFiMDQtZTA1YmEwYjljOTQ1PC94bXBNTTpJbnN0YW5jZUlEPgogICAgICAgICA8eG1wTU06RG9jdW1lbnRJRD5hZG9iZTpkb2NpZDpwaG90b3Nob3A6MzFlZDk3OGEtMWJhNy0xMWU4LTg0YTctZjA4OTdlNjEzNGM0PC94bXBNTTpEb2N1bWVudElEPgogICAgICAgICA8eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPnhtcC5kaWQ6OWFmYzkxOTgtOWNlNC1lZDQ4LThlNjYtNmFkMzdiNGFmOTQxPC94bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ+CiAgICAgICAgIDx4bXBNTTpIaXN0b3J5PgogICAgICAgICAgICA8cmRmOlNlcT4KICAgICAgICAgICAgICAgPHJkZjpsaSByZGY6cGFyc2VUeXBlPSJSZXNvdXJjZSI+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDphY3Rpb24+c2F2ZWQ8L3N0RXZ0OmFjdGlvbj4KICAgICAgICAgICAgICAgICAgPHN0RXZ0Omluc3RhbmNlSUQ+eG1wLmlpZDo5YWZjOTE5OC05Y2U0LWVkNDgtOGU2Ni02YWQzN2I0YWY5NDE8L3N0RXZ0Omluc3RhbmNlSUQ+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDp3aGVuPjIwMTgtMDItMjdUMTQ6MTY6MTErMDQ6MDA8L3N0RXZ0OndoZW4+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDpzb2Z0d2FyZUFnZW50PkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE3IChXaW5kb3dzKTwvc3RFdnQ6c29mdHdhcmVBZ2VudD4KICAgICAgICAgICAgICAgICAgPHN0RXZ0OmNoYW5nZWQ+Lzwvc3RFdnQ6Y2hhbmdlZD4KICAgICAgICAgICAgICAgPC9yZGY6bGk+CiAgICAgICAgICAgICAgIDxyZGY6bGkgcmRmOnBhcnNlVHlwZT0iUmVzb3VyY2UiPgogICAgICAgICAgICAgICAgICA8c3RFdnQ6YWN0aW9uPnNhdmVkPC9zdEV2dDphY3Rpb24+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDppbnN0YW5jZUlEPnhtcC5paWQ6MWNlZWE3YWMtNTIxMC02MjQ2LWFiMDQtZTA1YmEwYjljOTQ1PC9zdEV2dDppbnN0YW5jZUlEPgogICAgICAgICAgICAgICAgICA8c3RFdnQ6d2hlbj4yMDE4LTAyLTI3VDE0OjE2OjExKzA0OjAwPC9zdEV2dDp3aGVuPgogICAgICAgICAgICAgICAgICA8c3RFdnQ6c29mdHdhcmVBZ2VudD5BZG9iZSBQaG90b3Nob3AgQ0MgMjAxNyAoV2luZG93cyk8L3N0RXZ0OnNvZnR3YXJlQWdlbnQ+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDpjaGFuZ2VkPi88L3N0RXZ0OmNoYW5nZWQ+CiAgICAgICAgICAgICAgIDwvcmRmOmxpPgogICAgICAgICAgICA8L3JkZjpTZXE+CiAgICAgICAgIDwveG1wTU06SGlzdG9yeT4KICAgICAgICAgPHRpZmY6T3JpZW50YXRpb24+MTwvdGlmZjpPcmllbnRhdGlvbj4KICAgICAgICAgPHRpZmY6WFJlc29sdXRpb24+NzIwMDAwLzEwMDAwPC90aWZmOlhSZXNvbHV0aW9uPgogICAgICAgICA8dGlmZjpZUmVzb2x1dGlvbj43MjAwMDAvMTAwMDA8L3RpZmY6WVJlc29sdXRpb24+CiAgICAgICAgIDx0aWZmOlJlc29sdXRpb25Vbml0PjI8L3RpZmY6UmVzb2x1dGlvblVuaXQ+CiAgICAgICAgIDxleGlmOkNvbG9yU3BhY2U+NjU1MzU8L2V4aWY6Q29sb3JTcGFjZT4KICAgICAgICAgPGV4aWY6UGl4ZWxYRGltZW5zaW9uPjMwPC9leGlmOlBpeGVsWERpbWVuc2lvbj4KICAgICAgICAgPGV4aWY6UGl4ZWxZRGltZW5zaW9uPjMwPC9leGlmOlBpeGVsWURpbWVuc2lvbj4KICAgICAgPC9yZGY6RGVzY3JpcHRpb24+CiAgIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgCjw/eHBhY2tldCBlbmQ9InciPz7HmtNXAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAjWSURBVHjanFd9bFPXFf/d9/zsZ/v5ObZfAnbIUpI0fCxMhGlJkxaNKpFAKkqntUIIaYRJJR9FiEGoJqoOov1RMVE1UxvSsoIqbVJVCoJuomVlypYh8aERWEoZ6dwSlYJxkmcndj7s5/d19k9s4TZM64509a7ufff+zjn3nHN/l+HRwhhjICIAIAAIBoNuv9/v1XVdBCAA4Fwul+F2u/XZ2VnNNM2ZiYkJ27Is/F/CGGMcxzHGGHM6nS5FUb5XWVnZuHPnzhey2ewJIjpPRKNEdJeI/kVEf83lcr+bn5//6c6dO6uXL1/u5TjuO2MyQRB4nuedHo9naWtra9ulS5fO0oJkMhlSVZXi8TjFYjGKx+Okqipls9n8Lyki+k1XV9fampqaPDr7FtA3+zzPcwAckUjk+z09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" style="z-index: 999920; position: absolute; float: left; top: -15px; right: -15px; width: 30px; cursor: pointer; height: 30px; background-repeat: no-repeat; background-size: cover;"><div id="sgpb-popup-dialog-main-div" class="sgpb-content sgpb-content-87540 sgpb-theme-6-content " style="box-sizing: content-box; max-height: 530px; max-width: 542px; border-style: solid; border-color: rgb(255, 0, 0); border-radius: 7px; border-width: 0px; padding: 12px; background-repeat: no-repeat; background-color: rgb(255, 255, 255); box-shadow: rgb(204, 204, 204) 0px 0px 0px 0px; overflow: hidden;"><div style="height:50%;width:100%;overflow:hidden;padding:20px">
  <div class="sg-popup-builder-content" id="sg-popup-content-wrapper-87540" data-id="87540" data-events="[{&quot;param&quot;:&quot;load&quot;,&quot;value&quot;:&quot;5&quot;,&quot;hiddenOption&quot;:[]}]" data-options="YTo0NDp7czo5OiJzZ3BiLXR5cGUiO3M6NDoiaHRtbCI7czoxNToic2dwYi1pcy1wcmV2aWV3IjtzOjE6IjAiO3M6MTQ6InNncGItaXMtYWN0aXZlIjtzOjc6ImNoZWNrZWQiO3M6MzQ6InNncGItYmVoYXZpb3ItYWZ0ZXItc3BlY2lhbC1ldmVudHMiO2E6MTp7aTowO2E6MTp7aTowO2E6MTp7czo1OiJwYXJhbSI7czoxMjoic2VsZWN0X2V2ZW50Ijt9fX1zOjIwOiJzZ3BiLWNvbnRlbnQtcGFkZGluZyI7czoyOiIxMiI7czoxODoic2dwYi1wb3B1cC16LWluZGV4IjtzOjQ6Ijk5OTkiO3M6MTc6InNncGItcG9wdXAtdGhlbWVzIjtzOjEyOiJzZ3BiLXRoZW1lLTYiO3M6MjU6InNncGItZW5hYmxlLXBvcHVwLW92ZXJsYXkiO3M6Mjoib24iO3M6MjU6InNncGItb3ZlcmxheS1jdXN0b20tY2xhc3MiO3M6MTg6InNncGItcG9wdXAtb3ZlcmxheSI7czoxODoic2dwYi1vdmVybGF5LWNvbG9yIjtzOjA6IiI7czoyMDoic2dwYi1vdmVybGF5LW9wYWNpdHkiO3M6MzoiMC43IjtzOjI1OiJzZ3BiLWNvbnRlbnQtY3VzdG9tLWNsYXNzIjtzOjA6IiI7czoyNjoic2dwYi1iYWNrZ3JvdW5kLWltYWdlLW1vZGUiO3M6OToibm8tcmVwZWF0IjtzOjEyOiJzZ3BiLWVzYy1rZXkiO3M6Mjoib24iO3M6MjQ6InNncGItZW5hYmxlLWNsb3NlLWJ1dHRvbiI7czoyOiJvbiI7czoyMzoic2dwYi1jbG9zZS1idXR0b24tZGVsYXkiO3M6MToiMCI7czoyNjoic2dwYi1jbG9zZS1idXR0b24tcG9zaXRpb24iO3M6ODoidG9wUmlnaHQiO3M6MTc6InNncGItYnV0dG9uLWltYWdlIjtzOjA6IiI7czoyMzoic2dwYi1idXR0b24taW1hZ2Utd2lkdGgiO3M6MjoiMzAiO3M6MjQ6InNncGItYnV0dG9uLWltYWdlLWhlaWdodCI7czoyOiIzMCI7czoxNzoic2dwYi1ib3JkZXItY29sb3IiO3M6NzoiIzAwMDAwMCI7czoxODoic2dwYi1ib3JkZXItcmFkaXVzIjtzOjE6IjAiO3M6MjM6InNncGItYm9yZGVyLXJhZGl1cy10eXBlIjtzOjE6IiUiO3M6MTY6InNncGItYnV0dG9uLXRleHQiO3M6NToiQ2xvc2UiO3M6MTg6InNncGItb3ZlcmxheS1jbGljayI7czoyOiJvbiI7czoyNToic2dwYi1wb3B1cC1kaW1lbnNpb24tbW9kZSI7czoxMDoiY3VzdG9tTW9kZSI7czoxMDoic2dwYi13aWR0aCI7czozOiI4MCUiO3M6MTE6InNncGItaGVpZ2h0IjtzOjA6IiI7czozMzoic2dwYi1yZXNwb25zaXZlLWRpbWVuc2lvbi1tZWFzdXJlIjtzOjQ6ImF1dG8iO3M6MTQ6InNncGItbWF4LXdpZHRoIjtzOjU6IjYzMHB4IjtzOjE1OiJzZ3BiLW1heC1oZWlnaHQiO3M6MDoiIjtzOjE0OiJzZ3BiLW1pbi13aWR0aCI7czowOiIiO3M6MTU6InNncGItbWluLWhlaWdodCI7czowOiIiO3M6MTk6InNncGItb3Blbi1hbmltYXRpb24iO3M6Mjoib24iO3M6MjY6InNncGItb3Blbi1hbmltYXRpb24tZWZmZWN0IjtzOjk6Ik5vIGVmZmVjdCI7czoyNToic2dwYi1vcGVuLWFuaW1hdGlvbi1zcGVlZCI7czozOiIxLjUiO3M6Mjc6InNncGItY2xvc2UtYW5pbWF0aW9uLWVmZmVjdCI7czo5OiJObyBlZmZlY3QiO3M6MTY6InNncGItcG9wdXAtZml4ZWQiO3M6Mjoib24iO3M6MjU6InNncGItcG9wdXAtZml4ZWQtcG9zaXRpb24iO3M6MToiNSI7czoxNjoic2dwYi1wb3B1cC1vcmRlciI7czoxOiIwIjtzOjE2OiJzZ3BiLXBvcHVwLWRlbGF5IjtzOjE6IjAiO3M6MTI6InNncGItcG9zdC1pZCI7czo1OiI4NzU0MCI7czoyMjoic2dwYi1idXR0b24taW1hZ2UtZGF0YSI7czowOiIiO3M6MjY6InNncGItYmFja2dyb3VuZC1pbWFnZS1kYXRhIjtzOjA6IiI7fQ==">
	<div class="sgpb-popup-builder-content-87540 sgpb-popup-builder-content-html">
	<div class="sgpb-main-html-content-wrapper">
	
	<?=$ie_popup_content?>
	
	</div>
</div>
</div></div></div></div>
</div>
	<?php
}


?>