

// onload stack
var onLoadFunctions = [
	function() {
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
