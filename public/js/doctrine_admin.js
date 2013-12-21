

// onload stack
var onLoadFunctions = [
	function() {
		// handle entity names
		var trs = document.getElementsByTagName('tr');
		for(var i = 0; i < trs.length; ++i) {
			if (trs[i].classList.contains('target_entity')) {
				var j;
				var targetEntityName = '';
				for (j = 0; j < trs[i].classList.length; ++j) {
					if (trs[i].classList[j] != 'target_entity') {
						targetEntityName = trs[i].classList[j];
					}
				}
				var spans = trs[i].getElementsByTagName('span');
				for(var j = 0; j < spans.length; ++j) {
					if (spans[j].classList.contains('target_entity_id')) {
						var targetEntityId = '';
						for (var k = 0; k < spans[j].classList.length; ++k) {
							if (spans[j].classList[k] != 'target_entity_id') {
								targetEntityId = spans[j].classList[k];
							}
						}
						spans[j].innerHTML = "<a href=\"entity.php?entity_name=" +
							targetEntityName.replace(/-/g, '\\') +
							"&amp;entity_id=" +
							targetEntityId + "\">" +
							spans[j].innerHTML +
							"</a>";
					}
				}
			}
		}
	},
	function() {
		// handle is_null items; automaticly disable and empty fields

		var trs = document.getElementsByTagName('tr');
		var isNullCheckBoxes = {};
		for(var i = 0; i < trs.length; ++i) {
			var inputs = trs[i].getElementsByTagName('input');

			var j;
			var isNullCheckbox;
			var otherInputs = [];
			for (j = 0; j < inputs.length; ++j) {

				if (inputs[j].name.substr(0, 7) == 'is_null') {
					isNullCheckbox = inputs[j];
					var name = isNullCheckbox.name.substr(8, isNullCheckbox.name.length - 9);
					isNullCheckBoxes[name] = isNullCheckbox;
				} else {
					otherInputs.push(inputs[j]);
				}
			}
			if (isNullCheckbox) {
				for(j = 0; j < otherInputs.length; ++j) {
					var currentInput = otherInputs[j];
					currentInput.onchange = function(e) {
						var isNull = isNullCheckBoxes[e.currentTarget.name];
						if (e.currentTarget.value.trim().length > 0 && isNull.checked) {
							isNull.checked = false;
						}
					}
				}
				isNullCheckbox.onchange = function(e) {
					if (e.currentTarget.checked) {
						var correctInputs = document.getElementsByTagName('input');
						var name = e.currentTarget.name.substr(8, e.currentTarget.name.length - 9);
						for(j = 0; j < correctInputs.length; ++j) {
							if (correctInputs[j].name == name)
								correctInputs[j].value = '';
						}
					}
				}
			}
		}
	}
];

function doctrineAdminAddOnLoad(callback) {
	onLoadFunctions.push(callback);
}

window.onload = function() {
	for(var i = 0; i < onLoadFunctions.length; ++i) {
		onLoadFunctions[i]();
	}
}
