function moveVals(n, from, to) {
	fromObj = document.all(from);
	to = document.all(to);
	if (n == 1 || n == 2) {
		var indTo = to.length-1;
		for (i=fromObj.length-1; i>=0; i--) {
			if (n==1 || fromObj.options[i].selected) {
				indTo++;
				to.options[indTo] = new Option(fromObj.options[i].text, fromObj.options[i].value);
				fromObj.options[i] = null;				
			}
		}
	} else if (n == 3 || n == 4) {
		var indFrom = fromObj.length-1;
		for (i=to.length-1; i>=0; i--) {
			if (n==4 || to.options[i].selected) {
				indFrom++;
				fromObj.options[indFrom] = new Option(to.options[i].text, to.options[i].value);
				to.options[i] = null;
			}
		}
	}	
}