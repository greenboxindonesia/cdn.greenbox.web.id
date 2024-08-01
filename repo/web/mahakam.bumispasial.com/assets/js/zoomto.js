$(document).ready(function(){

	// stabat
    $(".zoom-center").on("click", function(){
        map.flyTo([3.32857,98.61495],15, {duration:1})
    })
	$(".zoom-center2").on("click", function(){
        map.flyTo([3.27163,98.58933],14)
    })
	$(".zoom-center3").on("click", function(){
		map.flyTo([3.27744,98.59393],16)
    })
	
	// pematangsiantar
	$(".zoom-center-pmt1").on("click", function(){
        map.flyTo([2.98705798072307,98.9687846077842],15)
    })
	
	//perwakilan
	$(".zoom-center-bbksda").on("click", function(){
		map.flyTo([3.94606,98.50030],15)
	})
	$(".zoom-center-bbtngl").on("click", function(){
		map.flyTo([3.80747,97.53606],14)
	})
	$(".zoom-center-pmt").on("click", function(){
		map.flyTo([2.94647,98.81378],11)
	})
	$(".zoom-center-tahura").on("click", function(){
		map.flyTo([3.24609,98.47637],15)
	})
	$(".zoom-center-gayo").on("click", function(){
		map.flyTo([3.90929,97.36086],15)
	})
	$(".zoom-center-subulussalam").on("click", function(){
		map.flyTo([3.02533, 97.99255],9)
	})
	$(".zoom-center-sdk").on("click", function(){
		map.flyTo([2.8777, 98.1029],15)
	})
	$(".zoom-center-kbn").on("click", function(){
		map.flyTo([3.1315, 98.2582],11)
	})
	
})