//
$(document).ready(function(){
   // var consumer_rating=document.getElementById('consumer_rating').getAttribute('data-rating');
   // alert('consumer_rating');
});
//
//redirecte to the right tabs
// Javascript to enable link to tab
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
} 
//
function select_color(color_id)
{
 //change value in hideen input box of color_id 
 $('#color_id').val(color_id);
 //clear old border of other color box
 for(var x=1;x<=20;x++)
 {
    $('#color-box-'+x).css('border','none');
 }
 //change css of the color box how has click
 $('#color-box-'+color_id).css('border','2px solid #000');

}
//
function select_size(size_id)
{
 //change value in hideen input box of size_id 
 $('#size_id').val(size_id);
 //clear old border of other color box
 for(var x=1;x<=20;x++)
 {
    $('#size-box-'+x).css('border','none');
 }
 //change css of the color box how has click
 $('#size-box-'+size_id).css('border','2px solid #000');

}