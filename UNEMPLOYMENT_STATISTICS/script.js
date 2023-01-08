let selectMenu = document.querySelector("#products");
let category = document.querySelector(".right h2");
let container = document.querySelector(".product-wrapper");

selectMenu.addEventListener("change", function(){
	let identifier = this.value;
	//category.innerHTML = this[this.selectedIndex].text;  

	let http = new XMLHttpRequest();
	http.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			let response = JSON.parse(this.responseText);
			// let response = this.responseText;
			let out = "";
			for(let item of response){
				out += `
					<div class="product">
						<div class="right">
                                
                                <tr>
                                    <td class="globe">${item.Global_rank}</td>
                                    <td class="country">${item.Countries}</td>
                                    <td class="rate">${item.rate}</td>
                                    <td class="year">${item.Available_data}</td>
                                </tr>
         
						</div>
					</div>


				`;
			}
			container.innerHTML = out;
		};
	}	
	
});

