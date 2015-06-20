<?php

function View($Brands)
{
	include_once 'header.php';
	
	echo "
	<input id=\"searchFilter\" type=\"text\" class=\"form-control\" placeholder=\"Search...\" /> 
	";

	echo "
	<div class=\"wrapper\">
	";
	
	foreach($Brands as $items){
		echo "
		<div id=\"$items->CigarBrandName\" class=\"col-sm-3\">
			<a href=\"?controller=cigar&action=cigarbybrand&brandid=$items->CigarBrandID\">$items->CigarBrandName</a>
			<a href=\"?controller=brand&action=edit&id=$items->CigarBrandID\" class=\"edit\"><i class=\"fa fa-pencil-square-o\"></i> Edit</a>
		</div>
		";
	}
	
	echo "
	</div>
	";
	
	echo "
	<script>
	$(document).ready(function(){
        $('#searchFilter').keyup(function(){
            $('.wrapper > div').css('display', 'none');
            
            $('.wrapper > div').each(function(){
                if($(this).attr('id').search(new RegExp($('#searchFilter').val(), 'i', 'g')) != -1){
                    $(this).css('display', 'block');
                }
            })
        });
    });
	</script>
	";

	include_once 'footer.php';    
}
	
?>