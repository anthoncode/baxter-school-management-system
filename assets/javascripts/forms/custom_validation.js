(function() {

	'use strict';

	// basic
	$("#form").validate({
		highlight: function( label ) {
			$(label).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function( label ) {
			$(label).closest('.form-group').removeClass('has-error');
			label.remove();
		},
		errorPlacement: function( error, element ) {
			var placement = element.closest('.input-group');
			if (!placement.get(0)) {
				placement = element;
			}
			if (error.text() !== '') {
				
							if(element.parent('.checkbox, .radio').length || element.parent('.input-group').length)
							{
				             placement.after(error);
							}
							else
							{	
							 var placement = element.closest('div');
							 placement.append(error);
							 wrapper: "li"
							}

			}
		}
	});

	// validation summary
	var $summaryForm = $("#summary-form");
	$summaryForm.validate({
		errorContainer: $summaryForm.find( 'div.validation-message' ),
		errorLabelContainer: $summaryForm.find( 'div.validation-message ul' ),
		wrapper: "li"
	});

	// checkbox, radio and selects
	$("#chk-radios-form, #selects-form").each(function() {
		$(this).validate({
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				$(element).closest('.form-group').removeClass('has-error');
			},
			errorPlacement: function( error, element ) {
				var placement = element.closest('div');
				if (!placement.get(0)) {
					placement = element;
				}
				if (error.text() !== '') {
					placement.append(error);
				}
			}
		});
	});

}).apply(this, [jQuery]);

// Form Validation
if($.isFunction($.fn.validate))
{
	$("form.validate").each(function(i, el)
	{
		var $this = $(el),
			opts = {
					highlight: function( label ) {
						$(label).closest('.form-group').removeClass('has-success').addClass('has-error');
					},
					success: function( label ) {
						$(label).closest('.form-group').removeClass('has-error');
						label.remove();
					},
					errorPlacement: function( error, element ) {
						var placement = element.closest('.input-group');
						if (!placement.get(0)) {
							placement = element;
						}
						if (error.text() !== '') {

										if(element.parent('.checkbox, .radio').length || element.parent('.input-group').length)
										{
							placement.after(error);
										}
										else
										{	
										var placement = element.closest('div');
										placement.append(error);
										wrapper: "li"
										}

						}
					}
			},
			$fields = $this.find('[data-validate]');


		$fields.each(function(j, el2)
		{
			var $field = $(el2),
				name = $field.attr('name'),
				validate = attrDefault($field, 'validate', '').toString(),
				_validate = validate.split(',');

			for(var k in _validate)
			{
				var rule = _validate[k],
					params,
					message;

				if(typeof opts['rules'][name] == 'undefined')
				{
					opts['rules'][name] = {};
					opts['messages'][name] = {};
				}

				if($.inArray(rule, ['required', 'url', 'email', 'number', 'date', 'creditcard']) != -1)
				{
					opts['rules'][name][rule] = true;

					message = $field.data('message-' + rule);

					if(message)
					{
						opts['messages'][name][rule] = message;
					}
				}
				// Parameter Value (#1 parameter)
				else 
				if(params = rule.match(/(\w+)\[(.*?)\]/i))
				{
					if($.inArray(params[1], ['min', 'max', 'minlength', 'maxlength', 'equalTo']) != -1)
					{
						opts['rules'][name][params[1]] = params[2];


						message = $field.data('message-' + params[1]);

						if(message)
						{
							opts['messages'][name][params[1]] = message;
						}
					}
				}
			}
		});

		console.log( opts );
		$this.validate(opts);
	});
}
		