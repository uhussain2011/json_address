   <script src="../js/jquery-3.5.0.js"></script>

<script src="../js/appadmin.js"></script>


<script type="text/javascript">




	$(document).on('click', '.add-row', function() {

		let parent = $(this).parent('.card').children('.card-body');
		let template = parent.children('.multipleRow.template');
		let newRow = template.clone();

		let nxtID = parseInt(template.attr('data-curID')) + 1;

		newRow.removeClass('template');
		newRow.attr('data-curID', '');
		template.attr('data-curID', nxtID);

		newRow.find('input, select').each(function(i, e) {
			let attrVal = $(this).attr('name');
			
			let newAttrVal = attrVal.replace('[0]', '['+nxtID+']');
			$(this).attr('name', newAttrVal);
			$(this).val(''); /*EMPTY THE VALUE*/
		})

		newRow.find('.remove-row').removeClass('hidden');
		newRow.find('.address-row').remove();
		newRow.find('.address-form').addClass('hidden');
		parent.append(newRow);

	});

	$(document).on('click', '.add-row-child', function() {

		let parent = $(this).parent('.card').children('.card-body');
		let template = parent.children('.multipleRow.template');
		let rowName = template.attr('data-rowname');
		let newRow = template.clone();

		let nxtID = parseInt(template.attr('data-curID')) + 1;

			newRow.removeClass('template');
			newRow.attr('data-curID', '');
			template.attr('data-curID', nxtID);

			newRow.find('input, select').each(function(i, e) {
		let attrVal = $(this).attr('name');
		let newAttrVal = attrVal.replace('['+rowName+'][0]', '['+rowName+']['+nxtID+']');
			$(this).attr('name', newAttrVal);
			$(this).val(''); 
		})

		newRow.find('.remove-row-child').removeClass('hidden');

		if(rowName === 'address') {
			newRow.find('.address-row').remove();
			newRow.find('.address-form').addClass('hidden');
		}
		parent.append(newRow);

	});

	$(document).on('click', '.remove-row , .remove-row-child', function() {
			$(this).parent().remove();
	});
</script>

</body>


</html>